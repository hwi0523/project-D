<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원가입</title>
    <link rel="stylesheet" href="css/join.css">
</head>

<body>
    <?php
    include_once "header.php";
    ?>
    <main>
        <div class="container">
            <div class="join_board">
                <h2>회원가입</h2>
                <form action="join_proc.php" method="post">
                    <div><input type="text" name="uid" placeholder="아이디"></div>
                    <div><input type="password" name="upw" placeholder="비밀번호"></div>
                    <div><input type="password" name="confirm_upw" placeholder="비밀번호 확인"></div>
                    <div><input type="text" name="nm" placeholder="이름"></div>
                    <div><input type="date" name="birth" max="2009-12-31" placeholder="생년월일"></div>
                    <div>성별 : <label>여자<input type="radio" name="gender" value="0" checked></label>
                        <label>남자<input type="radio" name="gender" value="1"></label>
                    </div>
                    <input type="checkbox" value="0">
                    본인은 만 14세 이상이며, 이용약관에 동의합니다.<br>
                    <div>
                        <input type="submit" value="가입완료">
                    </div>
                </form>
            </div>
        </div>
        <?php
            include_once "footer.php";
        ?>
    </main>
</body>

</html>