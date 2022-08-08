<?php
    session_start();
    $nm = "";
    if(isset($_SESSION["login_user"]))
    {
        $login_user = &$_SESSION["login_user"];
        $nm = $login_user["nm"];
    }
    if(isset($_SESSION["master_user"]))
    {
        $master_user = &$_SESSION["master_user"];
        $m_nm = $master_user["m_nm"];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>header</title>
    <link rel="stylesheet" href="css/header.css">
</head>
<body>
    <header>
        <div class="header-box">
            <div class="nav">
                <ul>
                    <li><a href="allfood.php">Recipe</a></li>
                    <li><a href="qna.php">QnA</a></li>
                </ul>
            </div>
            <div class="logo">
                <h1><a href="main.php">꾸꾸네 레시피</a></h1>
            </div>
            <div class="join">
            <?php if(isset($_SESSION["login_user"])) { ?>
                <div class="login_user">
                    <a href="profile.php?user_no=<?=$login_user["user_no"]?>">
                        <?php
                                $session_img = $_SESSION["login_user"]["profile_img"];
                                $profile_img = $session_img == null ? "ico_user.png" : "profile/".$_SESSION["login_user"]["user_no"] . "/" .$session_img; 
                                ?>
                            <div class="circular__img wh40">
                                <img src="/project/img/<?=$profile_img?>">
                                </div>
                            </a>
                            <div class="circular__nm"><?=$nm?></div>
                            <a id="logout" href='logout.php'>로그아웃</a>
                </div>
                <?php } else if(isset($_SESSION["master_user"])) { ?>
                        <spana class="master"><?=$m_nm?></spana>
                        <a href='logout.php' id="log">로그아웃</a>
                <?php } else { ?>
                    <a href="login.php"><span>로그인</span></a>
                    <a href="join.php"><span>회원가입</span></a>
                <?php } ?>
            </div>
        </div>
    </header>
</body>
</html>