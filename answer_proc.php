<?php
    include_once "db/db_board.php"; 
    session_start();

    $q_no = $_POST['q_no'];
    $a_ctnt = $_POST['a_ctnt'];

    $master_user = $_SESSION['master_user'];
    $m_no = $master_user['m_no'];
  
    $param = [
            "q_no" => $q_no,
            "m_no" => $m_no,
            "a_ctnt" => $a_ctnt
        ];

    $result = ins_answer($param);


    if($result){
        header("Location:qna_detail.php?qust_no=${q_no}");
    } 
?>