<!DOCTYPE html> 
<html> 
	<head> 
		<meta charset="utf-8"> 
		<title>アンケートフォーム</title> 
		<link rel="stylesheet" href="style.css"> 
	</head> 
	<body> 
		<h1>アンケートフォーム（3．回答完了画面）</h1> 
		<p>ご回答ありがとうございました。</p> 
		<form method="post"> 
			<?php
				session_start();
				$line = array(
                   			$_SESSION["name"],
                   			$_SESSION["email"],
                  			$_SESSION["gender"],
                   			$_SESSION["job"],
                  			$_SESSION["rate1"],
					$_SESSION["rate2"],
                    			$_SESSION["tec"],
                   			$_SESSION["dm"],
                    			nl2br($_SESSION["message"])
                		);
			 	$file_name = "answer.csv";
				$fp = fopen($file_name,"a");
				fputcsv($fp,$line);
				fclose($fp);
			?>
		</form>
	</body> 
</html>
