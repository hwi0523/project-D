<?php
include_once "db/db_board.php";

session_start();

$food_no = $_POST["food_no"];

if ($_FILES["img"]["name"] === "") {
    echo "이미지 없음";
    print "<a href=mod.php?food_no=$food_no><button>돌아가기</button></a>";
    exit;
}

$login_user = $_SESSION["login_user"];
$user_no = $login_user["user_no"];


$title = $_POST["title"];
$video = $_POST["video"];
$category = $_POST["category"];
$ctnt = $_POST["ctnt"];

$img_name = $_FILES["img"]["name"];
$last_index = mb_strrpos($img_name, ".");
$ext = mb_substr($img_name, $last_index);
$target_filenm = img_id() . $ext;
$img_path = "img/board";
if (!is_dir($img_path)) {
    mkdir($img_path, 0777, true);
}
$tmp_img = $_FILES['img']['tmp_name'];
$imageUpload = move_uploaded_file($tmp_img, $img_path . "/" . $target_filenm);

if ($imageUpload) {
    $param = [
        "food_no" => $food_no,
        "user_no" => $user_no,
        "title" => $title,
        "video" => $video,
        "category" => $category,
        "ctnt" => $ctnt,
        "food_img" => $target_filenm
    ];
}

$result = upd_recipe($param);

if ($result) {
    header("location: detail.php?food_no=$food_no");
}
