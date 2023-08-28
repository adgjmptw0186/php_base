<?php
session_start();
date_default_timezone_set('Asia/Tokyo');


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
$sql = "INSERT INTO `message`(`m_name`, `m_mail`, `m_message`, `m_dt`) VALUES (:m_name ,:m_mail ,:m_message ,:m_dt) ";
$stmt = $conn->prepare($sql);
$stmt->execute(
	array(
		"m_name" => $_SESSION["m_name"],
		"m_mail" => $_SESSION["m_mail"],
		"m_message" => $_SESSION["m_message"],
		"m_dt" => date("Y/m/d H:i:s")
	)
);

$lstId = $conn->lastInsertId();



?>





<!doctype html>
<html>

<head>
	<meta charset="UTF-8">
	<title>投稿完了|ゲストブック</title>
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<h1>ゲストブック</h1>
	<p>データを追加しました。データ番号：<?= $lstId ?></p>
	<!-- データ入力フォーム -->
	<form method="post" action="submit.php">
		<table>
			<tr>
				<th>名前</th>
				<td><?= $_SESSION["m_name"] ?></td>
			</tr>
			<tr>
				<th>メールアドレス</th>
				<td><?= $_SESSION["m_mail"] ?></td>
			</tr>
			<tr>
				<th>メッセージ</th>
				<td><?= nl2br($_SESSION["m_message"])  ?></td>
			</tr>
		</table>
	</form>

	<a href="index.php">TOPページへ戻る</a>




</body>

</html>