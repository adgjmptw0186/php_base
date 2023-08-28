<!DOCTYPE html> 
<html> 
	<head> 
		<meta charset="utf-8"> 
		<title>メールフォーム </title> 
		<link rel="stylesheet" href="style.css"> 
	</head> 
	<body> 
		<h1>メールフォーム（1．入力画面）</h1> 
		<p>必要事項を入力して「確認する」ボタンをクリックしてください。</p> 
		<form method="post" action="check.php"> 
			<table> 
				<tr> 
					<th>お名前</th> 
					<td><input type="text" name="uname" size="30" required></td> 
				</tr> 
				<tr> 
					<th>メールアドレス</th> 
					<td><input type="email" name="email" size="30" required></td> 
				</tr> 
				<tr> 
					<th>メッセージ</th> 
					<td><textarea rows="5" cols="30" name="message" required></textarea></td> 
				</tr> 
				<tr> 
					<td colspan="2"><input type="submit" value=" 確認する"></td> 
				</tr> 
			</table>
		</form> 
	</body> 
</html>

