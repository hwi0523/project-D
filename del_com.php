<?php

    include_once "db/db_board.php";
    session_start();
    $login_user = $_SESSION["login_user"];
    $reply_no = $_GET['reply_no'];

    
    $i_user = $login_user['i_user'];
    $param =[
        "reply_no" => $reply_no
    ];

    $result = del_comment($param);
    header("location:detail.php?food_no={$result["food_no"]}");
?>