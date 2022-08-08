<?php

include_once "db/db_board.php";

session_start();

$login_user = $_SESSION['login_user'];
$food_no = $_GET['food_no'];
$user_no = $login_user['user_no'];
$param = [
    "food_no" => $food_no,
    "user_no" => $user_no
];

$result = del_recipe($param);
if ($result) {
    header("location: allfood.php");
}
