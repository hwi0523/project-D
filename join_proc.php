<?php

include_once "db/db_user.php";

$uid = $_POST['uid'];
$upw = $_POST['upw'];
$confirm_upw = $_POST['confirm_upw'];
$nm = $_POST['nm'];
$birth = $_POST['birth'];
$gender = $_POST['gender'];

$param = [
    'uid' => $uid,
    'upw' => $upw,
    'nm' => $nm,
    'birth' => $birth,
    'gender' => $gender
];

$result = ins_user($param);

print "uid : $uid <br>";
print "upw : $upw <br>";
print "confirm_upw : $confirm_upw <br>";
print "nm : $nm <br>";
print "birth : $birth <br>";
print "gender : $gender <br>";

header("location: login.php");