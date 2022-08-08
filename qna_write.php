<?php
    include_once "db/db_master.php";
    include_once "db/db_board.php";
    session_start();

    if(isset($_SESSION["master_user"])){
        $login_master = $_SESSION["master_user"];
        $m_no = $login_master["m_no"];
    
    $qust_no = $_GET["qust_no"];
    $param = [
        "qust_no" => $qust_no
    ];
    $item = qna_detail($param);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>질문</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/qna_write.css">
</head>
<body>
    <main>
<?php
include_once "header.php";
?>
<?php if(isset($_SESSION["master_user"])){?>
    <h1> 답변하기</h1>
    <div>질문 제목: <?=$item["qust_title"]?></div>
    <div>질문 내용: <?=$item["qust_ctnt"]?></div>
<?php } ?>

<?php if(isset($_SESSION["login_user"])){ ?>
    <div class="container">
        <h1>질문이 있으면 작성해 주세요!</h1>
        <form action="qna_write_proc.php" method="post">
        <div class="text"><input type="text" name="qust_title" placeholder="제목"></div>
        <div><textarea name="qust_ctnt" placeholder="1000자 이내로 작성해 주세요 ^^"></textarea></div>
        <div class="submit">
            <input type="submit" class="bot1" value="등록">
            <input type="reset" class="bot2" value="초기화">
            <br>
        </div>
        </form>
    </div>
    <?php }?>
        </main>
        <?php
        include_once "footer.php";
        ?>
</body>
</html>