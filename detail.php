<?php
include_once "db/db_board.php";

session_start();

$food_no = $_GET['food_no'];

$param = [
    "food_no" => $food_no
];

$item = sel_recipe($param);

$youtube_url = $item["food_url"];
$last_index = mb_strrpos($youtube_url, "/");
$url = mb_substr($youtube_url, $last_index);

if (isset($_SESSION["login_user"])) {
    $login_user = $_SESSION["login_user"];
}
$com = comment($param);

$detail_user_no = sel_detail_profile($param);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $item['food_title'] ?></title>
    <link rel="stylesheet" href="css/detail.css">
</head>

<body>
    <?php include_once "header.php"; ?>
    <main>
        <div class="container">
            <div class="content-box">
                <div class="box1">
                    <img class="profile_img" src="/project/img/profile/<?= $detail_user_no['user_no'] ?>/<?= $item['profile_img'] ?>">
                    <?= $item['nm'] ?>
                </div>
                <div class="bor_box">
                    <div class="box3">
                        <?= $item["food_title"] ?>
                    </div>
                    <div class="box4">
                        <img class='food_img' src="/project/img/board/<?= $item['food_img'] ?>">
                    </div>
                    <div class="box5">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/<?= $url ?>" allowfullscreen></iframe>
                    </div>
                    <div class="box6">
                        <pre><?= $item["food_ctnt"] ?></pre>
                    </div>
                    <div class="box7">
                        <?= $item['created_at'] ?>
                    </div>
                    <div class="user_button">
                        <?php
                        if (isset($_SESSION['login_user']) && $login_user['user_no'] === $item['user_no']) { ?>
                            <a href="mod.php?food_no=<?= $food_no ?>"><button>수정</button></a>
                            <button onclick="isDel();">삭제</button>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <hr>
            <div class="main3">
                <div class="com1">
                    <h1>댓글</h1>
                    <?php
                    foreach ($com as $row) { ?>
                        <div class="comm">
                            <div class="co1">
                                <div><a href="profile.php"><img src="/project/img/profile/<?= $row["user_no"] ?>/<?= $row['profile_img'] ?>"></a></div>
                                <div class="nm"><?= $row["nm"] ?></div>
                                <div><?= $row["created_at"] ?></div>
                                <?php if (isset($_SESSION["login_user"]) && $login_user["user_no"] === $item["user_no"]) { ?>
                                    <div class="btn2 mod"><a href="#">수정</a></div>
                                    <div class="btn2 del" onclick="isDel();"><a href="del_com.php?reply_no=<?= $row["reply_no"] ?>">삭제</a></div>
                                <?php } ?>
                            </div>
                            <input type="hidden" name="reply_no" value="<?= $row["reply_no"] ?>">
                            <div class="co2"><?= $row["reply_ctnt"] ?></div>
                        </div>
                    <?php } ?>
                </div>
                <form action="com_proc.php" method="post" id="com_f">
                    <div class="c cn">
                        <div class="profile_nm"><img src="/project/img/profile/<?= $login_user["user_no"] ?>/<?= $login_user['profile_img'] ?>"><br><?= $nm ?></div>
                        <div><input type="hidden" name="food_no" value=<?= $food_no ?>></div>
                        <div><textarea id="ctnt" name="reply_ctnt" placeholder=""></textarea></div>
                        <div><input id="sub" type="submit" value="댓글등록"></div>
                    </div>
                </form>
            </div>
        </div>
    </main>
        <?php
            include_once "footer.php";
        ?>
        <script>
                function isDel() {
                    console.log('isDel 실행 됨!!');
                    if (confirm('삭제하시겠습니까?')) {
                        location.href = "del.php?food_no=<?= $food_no ?>";
                    }
                }
        </script>
</body>
</html>