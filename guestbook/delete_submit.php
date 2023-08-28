<!doctype html>
<html>

<head>
	<meta charset="UTF-8">
	<title>削除確認|ゲストブック</title>
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<h1>ゲストブック</h1>
	<p>投稿を削除します。</p>
	<!-- データ入力フォーム -->
	<form method="post" action="delete-submit.php">
		<table>
			<tr>
				<th>名前</th>
				<td>
					<?php
						$row["m_name"] 
					?>
			</td>
			</tr>
			<tr>
				<th>メールアドレス</th>
				<td>
					<?php
						$row["m_mail"] 
					?>
			</td>
			</tr>
			<tr>
				<th>メッセージ</th>
				<td>
					<?php
						nl2br($row["m_message"])
					?>
			</td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" value="削除する"></td>
			</tr>
		</table>
	</form>


</body>

</html>

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


	$_SESSION["m_id"] = $row["m_id"];




?>

