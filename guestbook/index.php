<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>ゲストブック</title>
<link rel="stylesheet" href="style.css">
</head>

<body>
<h1>トップページ</h1>
<!-- データ入力フォーム -->
<form method="post" action="confirm.php">
  <table>
    <tr>
      <th>名前</th>
      <td><input type="text" name="m_name" size="30"></td>
    </tr>
    <tr>
      <th>メールアドレス</th>
      <td><input type="text" name="m_mail" size="30"></td>
    </tr>
    <tr>
      <th>メッセージ</th>
      <td><textarea rows="5" cols="30" name="m_message"></textarea></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" value="確認する"></td>
    </tr>
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
