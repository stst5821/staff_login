<?php
session_start();
session_regenerate_id(true); // 合言葉を変える
if(isset($_SESSION['login'])==false)
{
    print 'ログインされていません<br>';
    print'<a href="../staff_login/staff_login.html">ログイン画面へ</a>';
    exit();
}
else
{
    print $_SESSION['staff_name'];
    print 'さんログイン中<br>';
    print '<br>';
}

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

    ショップ管理トップメニュー<br>
    <br>
    <a href="../staff/staff_list.php">スタッフ管理</a><br>
    <br>
    <a href="../product/pro_list.php">商品管理</a>
    <br>
    <a href="staff_logout.php">ログアウト</a><br>

</body>

</html>