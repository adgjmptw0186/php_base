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
	<title>投稿確認|ゲストブック</title>
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<h1>ゲストブック</h1>
	<p>以下の内容で投稿内容を変更します。</p>
	<!-- データ入力フォーム -->
	<form method="post" action="update-confirm.php">
		<table>
			<tr>
				<th>名前</th>
				<td><input type="text" name="m_name" size="30" value="<?= $row['m_name'] ?>" required></td>
			</tr>
			<tr>
				<th>メールアドレス</th>
				<td><input type="text" name="m_mail" size="30" value="<?= $row['m_mail'] ?>" required></td>
			</tr>
			<tr>
				<th>メッセージ</th>
				<td><textarea rows="5" cols="30" name="m_message" required><?= $row['m_message'] ?></textarea></td>
			</tr>
			<tr>
				<input type="hidden" name="m_id" value="<?= $row['m_id'] ?>">
				<td colspan="2"><input type="submit" value="確認する"></td>
			</tr>
		</table>
	</form>

</body>

</html>