<!DOCTYPE html> 
<html> 
	<head> 
		<meta charset="utf-8"> 
		<title>練習用フォーム </title> 
		<link rel="stylesheet" href="style.css"> 
	</head> 
	<body> 
		<h1>練習用フォーム（3．完了画面）</h1> 
		<p>メールを送信しました。</p> 
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
					<?php
					$line = array($uname,$email,$gender,$job,$rate1,$rate2,$tec,$dm,$message);
					$file_name = "answer.csv";
					$fp = fopen($file_name,"a");
					fputcsv($fp,$line);
					fclose($fp);
					?>
			</table> 
		</form> 
	</body> 
</html>
