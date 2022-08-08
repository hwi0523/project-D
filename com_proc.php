<?php
    include_once "db/db_board.php"; 
    session_start();

    $food_no = $_POST['food_no'];
    $reply_ctnt = $_POST['reply_ctnt'];

    $login_user = $_SESSION['login_user'];
    $user_no = $login_user['user_no'];
  
    $param = [
            "food_no" => $food_no,
            "user_no" => $user_no,
            "reply_ctnt" => $reply_ctnt
        ];
    $result = ins_comment($param);


    if($result){
        header("Location:detail.php?food_no=${food_no}");
    } 
?>