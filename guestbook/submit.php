<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>ゲストブック</title>
<link rel="stylesheet" href="style.css">
</head>

<body>
<h1>ゲストブック</h1>
<!-- データ入力フォーム -->
<p>データを追加しました。データ番号:<?php $lstId ?></p> 

<form method="post" action="submit.php">
	<table>
		<tr>
			<th>名前</th>
				<td>
					<?php
						session_start();
						echo $_SESSION["m_name"]
					?>
				</td>
		</tr>
		<tr>
			<th>メールアドレス</th>
				<td>
					<?php
						echo $_SESSION["m_mail"]
					?>
				</td>
		</tr>
		<tr>
			<th>メッセージ</th>
				<td>
					<?php
						echo $_SESSION["m_message"]
					?>
				</td>
		</tr>
			<td>
				<button type="button" onclick="history.go(-2)">トップページへ</button>
			</td>
	</table>
</form>

<?php

//接続設定
	$dbtype="mysql";
	$sv="localhost";
	$dbname="guestbook";
	$user="root";
	$pass="";

//データベースに接続
	$dsn="$dbtype:dbname=$dbname;host=$sv;charset=utf8";
	$conn=new PDO($dsn,$user,$pass);

//データの取得
	$sql = "INSERT INTO `message`(`m_name`, `m_mail`, `m_message`, `m_dt`) VALUES (:m_name ,:m_mail ,:m_message ,:m_dt) ";
	$stmt= $conn->prepare($sql);
	$stmt->execute(
		array(
			"m_name" => $_SESSION["m_name"],
			"m_mail" => $_SESSION["m_mail"],
			"m_message" => $_SESSION["m_message"],
			"m_dt" => date("Y/m/d H:i:s")
		)
	);

	$lstId = $conn -> lastInsertId();

//取得したデータを一覧表示
	while($row=$stmt->fetch()){
		echo "<hr>".$row["m_id"]."：";
		if(!empty($row["m_mail"])){
			echo "<a href='mailto:".$row["m_mail"]."'>".$row["m_name"]."</a>";
		}else{
			echo $row["m_name"];
		}
		echo "（".date("Y/m/d H:i",strtotime($row["m_dt"]))."）";
		echo "<p>".nl2br($row["m_message"])."</p>";

//変更・削除・詳細表示画面へのリンク
		echo "<a href='update.php?m_id=".$row["m_id"]."'>変更</a>&nbsp;";
		echo "<a href='delete-confirm.php?m_id=".$row["m_id"]."'>削除</a>&nbsp;";
		echo "<a href='detail.php?m_id=".$row["m_id"]."'>詳細</a>";
	}
?>
</body>
</html>


