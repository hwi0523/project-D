<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>로그인</title>
    <link rel="stylesheet" href="css/login.css">
    <script src="https://kit.fontawesome.com/73209118d1.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    include_once "header.php";
    ?>
    <div class="container">
        <div class="login_board">
            <h1>LOGIN </h1>
            <div class="lo">아이디와 비밀번호를 입력해 주세요</div>
            <form action="login_proc.php" method="post">
                <div class="user_id">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M19 7.001c0 3.865-3.134 7-7 7s-7-3.135-7-7c0-3.867 3.134-7.001 7-7.001s7 3.134 7 7.001zm-1.598 7.18c-1.506 1.137-3.374 1.82-5.402 1.82-2.03 0-3.899-.685-5.407-1.822-4.072 1.793-6.593 7.376-6.593 9.821h24c0-2.423-2.6-8.006-6.598-9.819z"/></svg>
                    <input type="text" name="uid" placeholder="아이디">
                </div>
                <div class="pass_id">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M8 10v-4c0-2.206 1.794-4 4-4 2.205 0 4 1.794 4 4v1h2v-1c0-3.313-2.687-6-6-6s-6 2.687-6 6v4h-3v14h18v-14h-13z"/></svg>
                    <input type="password" name="upw" placeholder="비밀번호">
                </div>
                <div class="log_join"><input type="submit" value="로그인">
                <input type="submit" class="but" value="회원가입" formaction="join.php"></div>
                <div><input type="submit" class="but_log" value="관리자 로그인" formaction="master.php"></div>
            </form>
        </div>
    </div>
    <?php
        include_once "footer.php";
    ?>
</body>
</html>