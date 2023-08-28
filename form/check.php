<!DOCTYPE html> 
<html> 
	<head> 
		<meta charset="utf-8"> 
		<title>練習用フォーム </title> 
		<link rel="stylesheet" href="style.css"> 
	</head> 
	<body> 
		<h1>練習用フォーム（2．確認画面）</h1> 
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
					<td colspan="2"><input type="submit" value=" 送信する"></td> 
				</tr> 
			</table> 
				<input type = "hidden" name = "uname" value = "<?php echo $name;?>">
				<input type = "hidden" name = "email" value = "<?php echo $email;?>">
				<input type = "hidden" name = "message" value = "<?php echo $message;?>">
		</form> 
	</body> 
</html>
