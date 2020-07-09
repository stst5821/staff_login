<?php

try
{

// 入力されたスタッフコードをパスワードを変数$staff_code,$staff_passに代入
$staff_code = $_POST['code'];
$staff_pass = $_POST['pass'];

$staff_code = htmlspecialchars($staff_code,ENT_QUOTES,'UTF-8');
$staff_pass = htmlspecialchars($staff_pass,ENT_QUOTES,'UTF-8');

$staff_pass = md5($staff_pass);

$dsn = 'mysql:dbname=shop; host=localhost; charset=utf8';
$user = 'root';
$password = '1234';
$dbh = new PDO ($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

// 入力されたスタッフコード、パスワードを元にデータベースから該当するデータを探す。
// 正しいコードとパスが入力されていれば抽出できるし、誤ったコードとパスだと抽出できないので、以下の$recにデータを格納できない。
$sql = 'SELECT name FROM mst_staff WHERE code=? AND password=?';
$stmt = $dbh->prepare($sql); //準備する命令文
//↓ values(?,?)にセットしたいデータが入っている変数を順番に書く
$data[] = $staff_code;
$data[] = $staff_pass;
$stmt->execute($data); // 指令を出すための命令文

$dbh = null;

$rec = $stmt->fetch(PDO::FETCH_ASSOC);

// 誤ったコードかパスを入力していると、$recにデータが入らないので、falseになる。
// データベースからデータを探して、無ければ以下を実行して入力フォームに戻す。
if($rec == false) 
{
    print 'スタッフコードかパスワードが間違っています。<br>';
    print '<a href="staff_login.html">戻る</a>';
}
else
{
    session_start();
    $_SESSION['login'] = 1;
    $_SESSION['staff_code'] = $staff_code;
    $_SESSION['staff_name'] = $rec['name'];
    header('Location:staff_top.php');
    exit();
}

}
catch (Exception $e)
{
    print 'ただいま障害により大変ご迷惑をおかけしております。';
    exit();
}

?>