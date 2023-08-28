<?php
session_start();




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
$sql = "SELECT * FROM `message` WHERE m_id = :m_id";
$stmt = $conn->prepare($sql);
$stmt->execute(
	array(
		"m_id" => $_GET["m_id"],
	)
);

if (($row = $stmt->fetch(PDO::FETCH_ASSOC)) === false) {
	echo "データが存在しません。";
	exit;
}






?>





<!doctype html>
<html>

<head>
	<meta charset="UTF-8">
	<title>投稿内容|ゲストブック</title>
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<h1>ゲストブック</h1>
	<p>投稿内容は次の通りです。</p>
	<!-- データ入力フォーム -->
	<table>
		<tr>
			<th>名前</th>
			<td><?= $row["m_name"] ?></td>
		</tr>
		<tr>
			<th>メールアドレス</th>
			<td><?= $row["m_mail"] ?></td>
		</tr>
		<tr>
			<th>メッセージ</th>
			<td><?= nl2br($row["m_message"])  ?></td>
		</tr>
	</table>


	<a href="index.php">TOPページへ</a>
</body>

</html>