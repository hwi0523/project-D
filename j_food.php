<?php
    include 'db/db_board.php';

    
    $list = recipe_jfood();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe</title>
    <link rel="stylesheet" href="css/allfood.css">
    <link rel="stylesheet" href="css/header.css">
</head>
<body>
<div class="container">
    <?php include('recipe.php') ?>          
        <div class="main">
      
           <?php
                foreach($list as $item){
            ?>
           <ul>
               <li><a href="detail.php?food_no=<?=$item['food_no']?>"><img src="/project/img/board/<?=$item['food_img']?>"></li>
               <div class="title">
                    <li class="profile"><img src="/project/img/profile/<?=$item["user_no"]?>/<?=$item['profile_img']?>"></li>
                    <li><?=$item['food_title']?><br><?=$item['nm']?></a></li>
               </div>   
           </ul>
            <?php    
                }
            ?>

        </div>
    </div>
        <?php
        include_once "footer.php";
        ?>
</body>
</html>