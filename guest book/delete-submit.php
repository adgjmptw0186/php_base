<?php
session_start();

// $_SESSION["m_name"] = $_POST['m_name'];
// $_SESSION["m_mail"] = $_POST['m_mail'];
// $_SESSION["m_message"] = $_POST['m_message'];


//接続設定
$dbtype = "mysql";
$sv = "localhost";
$dbname = "guestbook";
$user = "root";
$pass = "";

//データベースに接続
$dsn = "$dbtype:dbname=$dbname;host=$sv;charset=utf8";
$conn = new PDO($dsn, $user, $pass);

//データの取得
$sql = "DELETE FROM `message` WHERE `m_id`=:m_id ";
$stmt = $conn->prepare($sql);
$stmt->execute(
	array(
		"m_id" => $_SESSION["m_id"]
	)
);




?>





<!doctype html>
<html>

<head>
	<meta charset="UTF-8">
	<title>削除完了|ゲストブック</title>
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<h1>ゲストブック</h1>
	<p>データを削除しました。</p>
	<!-- データ入力フォーム -->
	<a href="index.php">TOPページへ戻る</a>

</body>

</html>