<?php
    include_once "db/db_board.php";

    $qust_no = $_GET["qust_no"];
    $sql=
    "DELETE FROM q_board 
    WHERE qust_no='$qust_no'";

    $conn=get_conn();
    $result=mysqli_query($conn,$sql);
    mysqli_close($conn);
     header("location: qna.php");
     echo "$result";
?>