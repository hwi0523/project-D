<?php
    include_once "header.php";
    include_once 'db/db_board.php';
    $user_no = $_GET["user_no"];
    $food_no = $_GET["food_no"];
    $param = [
        "user_no" => $user_no
    ];
    $user = sel_user_page($param);
    $user_array = mysqli_fetch_assoc($user);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/userpage.css">
 </head>
<body>
<div class="container">
    <main>
        <div class="header">               
                <div class="box1">
                        <img src="/project/img/profile/<?=$user_no?>/<?=$user_array["profile_img"]?>" >
                </div>
                <div class="box2">
                    <?=$user_array["nm"]?>
                </div>
                <?php
                    if(empty($user_array["ctnt"])) {
                ?>
                    <div class="box3"><input placeholder="자기소개가 없습니다." readonly></div>
                <?php } else { ?>
                    <div class="box3"><input placeholder="<?=$user_array["ctnt"]?>" readonly></div>
                <?php } ?>
                <div class="box4"></div>
        </div>
            <hr>
        <div class="main">   
           <?php
                foreach($user as $item){
            ?>
            <ul>
               <li class="flex"><img src="/project/img/board/<?=$item['food_img']?>"></li>
               <div class="title">
                    <li class="profile"><img src="/project/img/profile/<?=$item["user_no"]?>/<?=$item['profile_img']?>"></li>
                    <li><?=$item['food_title']?><br><?=$item['nm']?></li>
               </div>   
           </ul>
            <?php    
                }
            ?>

        </div>
    </main>
    </div>
        <?php
        include_once "footer.php";
        ?>
</body>
</html>