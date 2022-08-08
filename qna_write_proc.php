<?php
    include_once "db/db_board.php";

    session_start();
    $qust_title = $_POST["qust_title"];
    $qust_ctnt = $_POST["qust_ctnt"];

    $login_user = $_SESSION["login_user"];
    $user_no = $login_user["user_no"];
    
    $param = [
        "user_no" => $user_no,
        "qust_title" => $qust_title,
        "qust_ctnt" => $qust_ctnt,
    ];

    $result = qna_board($param);
    if($result) {
        Header("Location: qna.php");
    }