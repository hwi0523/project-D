<?php
    include_once "db.php";
function sel_master(&$param)
{
    $mid = $param['mid'];

    $conn = get_conn();
    $sql = "SELECT * FROM manager
            WHERE mid = '$mid'";

    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return mysqli_fetch_assoc($result);
}

