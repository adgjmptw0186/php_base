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
$sql = "UPDATE `message` SET `m_name`=:m_name,`m_mail`=:m_mail,`m_message`=:m_message WHERE `m_id`=:m_id ";
$stmt = $conn->prepare($sql);
$stmt->execute(
	array(
		"m_name" => $_SESSION["m_name"],
		"m_mail" => $_SESSION["m_mail"],
		"m_message" => $_SESSION["m_message"],
		"m_id" => $_SESSION["m_id"]
	)
);

$lstId = $conn->lastInsertId();



?>





<!doctype html>
<html>

<head>
	<meta charset="UTF-8">
	<title>変更完了|ゲストブック</title>
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<h1>ゲストブック</h1>
	<p>データを変更しました。</p>
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