<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>ゲストブック</title>
<link rel="stylesheet" href="style.css">
</head>

<body>
<h1>追加確認画面</h1>
<!-- データ入力フォーム -->
<form method="post" action="submit.php">
	<table>
		<tr>
			<th>名前</th>
				<td>
					<?php
						session_start();
						$m_name = $_POST["m_name"];
      						if(!empty($_POST["m_name"])){
      							echo $m_name;
     						}
						$_SESSION["m_name"]
					?>
				</td>
		</tr>
		<tr>
			<th>メールアドレス</th>
				<td>
					<?php
						$m_mail = $_POST["m_mail"];
      						if(!empty($_POST["m_mail"])){
      							echo $m_mail;
     						}

						$_SESSION["m_mail"]
					?>
				</td>
		</tr>
		<tr>
			<th>メッセージ</th>
				<td>
					<?php
						$m_message = $_POST["m_message"];
      						if(!empty($_POST["m_message"])){
      							echo $m_message;
     						}

						nl2br($_SESSION["m_message"])
					?>
				</td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" value="書き込む"></td>
		</tr>
	</table>
</form>

<?php

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
	$sql="SELECT * FROM message ORDER BY m_id DESC";
	$stmt=$conn->prepare($sql);
	$stmt->execute();

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
