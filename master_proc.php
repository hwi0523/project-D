<?php

include_once "db/db_master.php";

session_start();

$mid = $_POST['mid'];
$mpw = $_POST['mpw'];

$param = [
    'mid' => $mid
];

$result = sel_master($param);

if (empty($result)) {
    die("해당하는 아이디가 없습니다.");
}

if ($mpw === $result["mpw"]) {
    $_SESSION['master_user'] = $result;
    header("location: allfood.php");
} else {
    header("location: master.php");
}