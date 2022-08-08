<?php
    include_once "db/db_board.php";   
    $qust_no = $_GET["qust_no"];
    $param = [
        "qust_no" => $qust_no
    ];
    $item = qna_detail($param);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>글 수정</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/qna_mod.css">
</head>
<body>
<?php
include_once "header.php";
?>
<div class="container">
    <h1>글수정</h1>
    <form action="qna_mod_proc.php" method="post">
        <input type="hidden" name="qust_no" value="<?=$qust_no?>" readonly>
        <div><input class="text" type="text" name="qust_title" placeholder="제목" value="<?=$item["qust_title"]?>"></div>
        <div><textarea name="qust_ctnt" placeholder="내용"><?=$item["qust_ctnt"]?></textarea></div>
        <div class="submit">
            <input type="submit" value="글수정">
            <input type="reset" value="초기화">
        </div>
    </form>
</div>
</body>
</html>