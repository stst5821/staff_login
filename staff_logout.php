<?php
session_start();
$_SESSION=array();
if(isset($_COOKIE[session_name()])==true)
{
    setcookie(session_name(), '',time()-42000,'/');
}
session_destroy();

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://kit.fontawesome.com/5b114103c4.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>スタッフログイン</title>
</head>

<body>

    ログアウトしました。
    <br><br>
    <a href="../staff_login/staff_login.html">ログイン画面へ</a>

</body>

</html>