<?php
    include_once "db/db_board.php";
    include_once "db/db_master.php";
    session_start();
    if(isset($_SESSION["login_user"])) {
        $login_user = $_SESSION["login_user"];
    }
    if(isset($_SESSION["master_user"])){
        $login_user = $_SESSION["master_user"];
    }
    $qust_no = $_GET["qust_no"];
    $param = [
        "qust_no" => $qust_no
    ];

    $item = qna_detail($param);
    $next_board = sel_next_board($param);
    $prev_board = sel_prev_board($param);
    $answer = answer($param);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$item["qust_title"]?></title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/qna_detail.css">
</head>
<body>
<?php include_once "header.php"; ?>
<main>
    <div class="container">
        <div><a href="qna.php"><h1>QnA</h1></a></div>
        <div class="box1">
            <h2>질문</h2>
            <hr>
            <div class="q_ctnt"><?=$item["qust_ctnt"]?></div>
            <hr>
            <?php if(isset($_SESSION["login_user"]) && $login_user["user_no"] === $item["user_no"]) { ?>
                <div class="button">
                    <a href="qna_mod.php?qust_no=<?=$qust_no?>"><button>수정</button></a>
                    <button onclick="isDel();">삭제</button>
                </div>
            <?php } ?>
            <?php if(isset($_SESSION["master_user"])) {?>
                <div class="button">
                    <a href="mqna_delete.php?qust_no=<?=$qust_no?>"><button>삭제</button></a>
                </div>
            <?php } ?>
        </div>
        <div class="box2">
            <h2>답변</h2>
            <hr>
            <div class="a_ctnt"><?=@$answer["ansr_ctnt"]?></div>
            <hr>
            <div class="button">
                <?php if($prev_board !== 0) { ?>
                    <a href="qna_detail.php?qust_no=<?=$prev_board?>"><button>이전글</button></a>
                <?php } ?>

                <?php if($next_board !== 0) { ?>
                    <a href="qna_detail.php?qust_no=<?=$next_board?>"><button>다음글</button></a>
                <?php } ?>
            </div>
            <?php 
            if(isset($_SESSION["master_user"]) && @$answer["ansr_ctnt"] === null){ ?>
                <form action="answer_proc.php" method="post">
                    <div><input type="hidden" name="q_no" value="<?=$qust_no?>"></div>
                    <div><textarea name="a_ctnt"></textarea></div>
                    <div class="button">
                        <input type="submit" value="답변등록">
                    </div>
                </form>
            <?php }?>
        </div>
    </div>
</main>
    <script>
        function isDel() {            
            console.log('isDel 실행 됨!!');            
            if(confirm('삭제하시겠습니까?')) {
                location.href = "qna_del.php?qust_no=<?=$qust_no?>";
            } 
        }
    </script>
</body>
</html>