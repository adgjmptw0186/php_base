<!DOCTYPE html> 
<html> 
	<head> 
		<meta charset="utf-8"> 
		<title>メールフォーム </title> 
		<link rel="stylesheet" href="style.css"> 
	</head> 
	<body> 
		<h1>メールフォーム（3．完了画面）</h1> 
		<p>メールを送信しました。</p> 
		<form method="post" action="submit.php"> 
			<table> 
				<?php
					session_start();
				?>
				<tr> 
					<th>お名前</th> 
					<td>
						<?php
							echo $_SESSION["a"];
						?>
					</td>
				</tr> 
				<tr> 
					<th>メールアドレス</th> 
					<td>
						<?php
							echo $_SESSION["b"];
						?>
					</td>
				</tr> 
				<tr> 
					<th>メッセージ</th> 
					<td>
						<?php
							echo $_SESSION["c"];
						?>
					</td>
					<button type="button" onclick="history.go(-2)">最初に戻る</button> 

				</tr> 
			</table> 
		</form> 
	</body> 
</html>
