<?php
    include_once "db/db_board.php";

    session_start();
    $login_user = $_SESSION["login_user"];


    $qust_no = $_POST["qust_no"];
    $qust_title = $_POST["qust_title"];
    $qust_ctnt = $_POST["qust_ctnt"];
    $user_no = $login_user["user_no"];

    $param = [
        "qust_no" => $qust_no,
        "qust_title" => $qust_title,
        "qust_ctnt" => $qust_ctnt,
        "user_no" => $user_no,
    ];

    $result = qna_upd_board($param);
    print "result : " . $result;
    
    if($result) {
        Header("Location: qna_detail.php?qust_no=$qust_no");
    }