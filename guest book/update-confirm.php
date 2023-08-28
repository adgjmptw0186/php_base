<?php
session_start();



$_SESSION["m_name"] = $_POST['m_name'];
$_SESSION["m_mail"] = $_POST['m_mail'];
$_SESSION["m_message"] = $_POST['m_message'];
$_SESSION["m_id"] = $_POST['m_id'];


if (empty($_SESSION["m_name"])) {
	die("名前を入力してください");
} else if (empty($_SESSION["m_mail"])) {
	die("メールアドレスを入力してください");
} else if (empty($_SESSION["m_message"])) {
	die("投稿内容を入力してください");
} else if (empty($_SESSION["m_id"])) {
	die("投稿IDを入力してください");
}





?>





<!doctype html>
<html>

<head>
	<meta charset="UTF-8">
	<title>投稿変更確認|ゲストブック</title>
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<h1>ゲストブック</h1>
	<p>以下の内容で投稿内容を変更します。</p>
	<!-- データ入力フォーム -->
	<form method="post" action="update-submit.php">
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
			<tr>
				<td colspan="2"><input type="submit" value="変更する"></td>
			</tr>
		</table>
	</form>


</body>

</html>