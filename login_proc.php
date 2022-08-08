<?php

include_once "db/db_user.php";

session_start();

$uid = $_POST['uid'];
$upw = $_POST['upw'];

$param = [
    'uid' => $uid
];

$result = sel_user($param);

if (empty($result)) {
    die("해당하는 아이디가 없습니다.");
}

if ($upw === $result['upw']) {
    $_SESSION['login_user'] = $result;
    header("location: main.php");
} else {
    header("location: login.php");
}