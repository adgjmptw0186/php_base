<?php
session_start();

$_SESSION["m_name"] = $_POST['m_name'];
$_SESSION["m_mail"] = $_POST['m_mail'];
$_SESSION["m_message"] = $_POST['m_message'];


if (empty($_SESSION["m_name"])) {
	die("名前を入力してください");
} else if (empty($_SESSION["m_mail"])) {
	die("メールアドレスを入力してください");
} else if (empty($_SESSION["m_message"])) {
	die("投稿内容を入力してください");
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
	<p>以下の内容で投稿します。</p>
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
			<tr>
				<td colspan="2"><input type="submit" value="確認する"></td>
			</tr>
		</table>
	</form>


</body>

</html>