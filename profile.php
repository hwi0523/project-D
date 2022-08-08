<?php
    include_once "header.php";
    session_start();
    $nm = "";
    if(isset($_SESSION["login_user"]))
    {
        $login_user = &$_SESSION["login_user"];
        $nm = &$login_user["nm"];
    }
    include_once 'db/db_board.php';
    $user_no = $_GET["user_no"];
    $param = [
        "user_no" => $user_no
    ];
    $list = sel_profile_food($param);
    $result = sel_profile($param);
    $ctnt = $result["ctnt"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/profile.css">
 </head>
<body>
<div class="container">
    <main>
        <div class="header">
            <form action="profile_proc.php" enctype="multipart/form-data" method="post">
               
                <div class="box1">
                        <?php
                            $session_img = $_SESSION["login_user"]["profile_img"];
                            $profile_img = $session_img == null ? "ico_user.png" : "profile/".$_SESSION["login_user"]["user_no"] . "/" .$session_img; 
                        ?>
                    <label>
                        <img id="preview" src="/project/img/<?=$profile_img?>" style="cursor:pointer">
                        <input class="hidden" onchange="readURL(this);" type="file" name="img" accept="image/*">
                    </label>
                </div>
                <div class="box2"><input type="text" value="<?=$nm?>" name="user_nm"></div>
                <div class="box3"><input name="myself" placeholder="자기소개를 입력해주세요." value="<?=$ctnt?>"></div>
                <div class="box4">
                    <input type="submit" value="수정하기">
                </div>
            </form>
            <hr>
        </div>
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
    </main>
    </div>
        <?php
        include_once "footer.php";
        ?>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                document.getElementById('preview').src = e.target.result;
                };
                reader.readAsDataURL(input.files[0]);
            } else {
                document.getElementById('preview').src = "";
            }
            }
    </script>
</body>
</html>