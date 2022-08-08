<?php
    include_once "db/db_board.php";

    session_start();
    $login_user = $_SESSION["login_user"];
    $qust_no = $_GET["qust_no"];
    $user_no = $login_user["user_no"];
    $param = [
        "qust_no" => $qust_no,
        "user_no" => $user_no,
    ];

    $result = qna_del_board($param);
    if($result) {
        Header("Location: qna.php");
    }