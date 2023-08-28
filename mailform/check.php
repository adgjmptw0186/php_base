<!DOCTYPE html> 
<html> 
	<head> 
		<meta charset="utf-8"> 
		<title>メールフォーム </title> 
		<link rel="stylesheet" href="style.css"> 
	</head> 
	<body> 
		<h1>メールフォーム（2．確認画面）</h1> 
		<p>内容を確認してください。</p> 
		<form method="post" action="submit.php"> 
			<table> 
				<tr> 
					<th>お名前</th> 
					<td>
						<?php
							$name = $_POST['uname'];
							echo $name
						?>
					</td>
				</tr> 
				<tr> 
					<th>メールアドレス</th> 
					<td>
						<?php
							$email = $_POST['email'];
							echo $email
						?>

					</td>
				</tr> 
				<tr> 
					<th>メッセージ</th> 
					<td>
						<?php
							$message = $_POST['message'];
							echo nl2br($message);
						?>
					</td>
				</tr> 
				<tr> 
					<td colspan="2"><input type="submit" value=" 送信する">
		<form method="post" action="index.php"> 
					<button type="button" onclick="history.go(-1)"> 戻る</button> 
				</tr> 
			</table>
			<?php
				session_start();//セッションスタート
				$_SESSION['a'] = $name;
				$_SESSION['b'] = $email;
				$_SESSION['c'] = $message;
			?>
		</form> 
	</body> 
</html>
