<?php
include 'db/db_board.php';
session_start();

$list = main_recipe($param);
$qna = main_qna();

$nm = "";
if (isset($_SESSION["login_user"])) {
    $login_user = &$_SESSION["login_user"];
    $nm = $login_user["nm"];
}
if (isset($_SESSION["master_user"])) {
    $master_user = &$_SESSION["master_user"];
    $m_nm = $master_user["m_nm"];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Recipe</title>
    <link rel="stylesheet" href="css/main.css">
    <script src='https://code.jquery.com/jquery-3.2.1.min.js'></script>
</head>

<body>
    <div class="scroll-top">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7l4-4m0 0l4 4m-4-4v18" />
        </svg>
    </div>
    <div class="container">
        <div class="img">
            <img src="img/img_1.jpg">
        </div>
        <header>
            <div class="header-box">
                <div class="nav">
                    <ul>
                        <li><a href="allfood.php">Recipe</a></li>
                        <li><a href="qna.php">QnA</a></li>
                    </ul>
                </div>
                <div class="logo">
                    <h1><a href="#">꾸꾸네 레시피</a></h1>
                </div>

                <div class="join">
                    <?php if (isset($_SESSION["login_user"])) { ?>
                        <div class="login_user">
                            <a href="profile.php?user_no=<?= $login_user["user_no"] ?>">
                                <?php
                                $session_img = $_SESSION["login_user"]["profile_img"];
                                $profile_img = $session_img == null ? "ico_user.png" : "profile/" . $_SESSION["login_user"]["user_no"] . "/" . $session_img;
                                ?>
                                <div class="circular__img wh40">
                                    <img src="/project/img/<?= $profile_img ?>">
                                </div>
                            </a>
                            <div class="circular__nm"><?= $nm ?></div>
                            <a id="logout" href='logout.php'>로그아웃</a>
                        </div>
                    <?php } else if (isset($_SESSION["master_user"])) { ?>
                        <spana class="master"><?= $m_nm ?></spana>
                        <a href='logout.php' id="log">로그아웃</a>
                    <?php } else { ?>
                        <a href="login.php"><span>로그인</span></a>
                        <a href="join.php"><span>회원가입</span></a>
                    <?php } ?>
                </div>
            </div>
        </header>

        <div class="content">
            <p class="det">Food Recipe</p>
            <p class="de"><a href="allfood.php">MORE <img src="img/plus.svg"></a></p>
        </div>
    </div>

    <div class="page">
        <h1 class="text1">레시피</h1>
        <a href="allfood.php" id="mor">
            <h3>더보기</h3>
        </a>
        <div class="pg">
            <?php
            foreach ($list as $item) {
            ?>
                <a href="detail.php?food_no=<?= $item['food_no'] ?>">
                    <ul>
                        <li><img src="/project/img/board/<?= $item['food_img'] ?>"></li>
                        <div class="title">
                            <li class="profile"><img src="/project/img/profile/<?= $item["user_no"] ?>/<?= $item['profile_img'] ?>"></li>
                            <li><?= $item['food_title'] ?><br><?= $item['nm'] ?></li>
                        </div>
                    </ul>
                </a>
            <?php
            }
            ?>
        </div>
    </div>

    <div class="board">
        <h1>QnA</h1>
        <div class="qna_board">
            <?php if (isset($_SESSION["login_user"])) { ?>
                <a id="qqq" href="qna_write.php">질문하기</a>
            <?php } { ?>
            <?php } ?>
            <tbody>
                <table>
                    <tr>
                        <th width="10%">NO</th>
                        <th width="40%">질문</th>
                        <th>작성자</th>
                        <th>작성일</th>
                    </tr>
                    <?php foreach ($qna as $item) { ?>
                        <tr class="title_td">
                            <td><?= $item["qust_no"] ?></td>
                            <td class="td_title"><a href="qna_detail.php?qust_no=<?= $item["qust_no"] ?>"><?= $item["qust_title"] ?></a></td>
                            <td><?= $item["nm"] ?></td>
                            <td><?= $item["created_at"] ?> </td>
                            <td>
                                <?php if (isset($_SESSION["master_user"])) { ?>
                                    <a href="qna_write.php?qust_no=<?= $item["qust_no"] ?>">답변하기</a>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </tbody>
            </table>
        </div>
    </div>
    <div class="footer">
        <h4>Copyright &copy; 2022 꾸꾸네 레시피 Inc. All rights reserved.<br> 김예찬 이경식 신혜미 김동휘</h4>
    </div>
    <script src="./app.js"></script>
</body>

</html>