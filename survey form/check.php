<!DOCTYPE html> 
<html> 
	<head> 
		<meta charset="utf-8"> 
		<title>アンケートフォーム</title> 
		<link rel="stylesheet" href="style.css"> 
	</head> 
	<body> 
		<h1>アンケートフォーム（2．回答確認画面）</h1> 
		<p>回答を確認してください。</p> 
		<form method="post" action="submit.php"> 
			<table> 
				<tr> 
					<th>お名前</th> 
					<td>
						<?php
							session_start();
							$_SESSION["name"] = $_POST["uname"];
							echo $_SESSION["name"]
						?>
					</td> 
				</tr> 
				<tr> 
					<th>メールアドレス</th> 
					<td>
						<?php
							$_SESSION["email"] = $_POST["email"];
							echo $_SESSION["email"]
						?>
					</td> 
				</tr> 
				<tr> 
					<th>性別</th> 
					<td>
						<?php
							$_SESSION["gender"] = $_POST["gender"];
							echo $_SESSION["gender"]
						?>
					</td> 
				</tr> 
				<tr> 
					<th>職業</th> 
					<td>
						<?php
							$_SESSION["job"] = $_POST["job"];
							echo $_SESSION["job"]
						?>
					</td> 
				</tr> 
				<tr> 
					<th>書籍の満足度は？</th> 
					<td>
					<?php
							$_SESSION["rate1"] = $_POST["rate1"];
							echo $_SESSION["rate1"]
					?>

					</td>
				</tr> 
				<tr> 
					<th>書籍のボリュームは？</th>
					<td>
					<?php
						$_SESSION["rate2"] = $_POST["rate2"];
						echo $_SESSION["rate2"]
					?>
					</td>
				</tr>
				<tr> 
					<th>経験のある技術（複数選択可）</th>
					<td>
						<?php 
							$_SESSION["tec"] = implode(",",$_POST["tec"]);;
							//foreach($_SESSION["tec"] as $value){
								echo $_SESSION["tec"];
							//}
						?>
					</td>
				</tr> 
				<tr> 
					<th>新刊情報のお知らせ</th> 
					<td>
						<?php 
							$_SESSION["dm"] = $_POST["dm"];
                        				if(isset($_SESSION['dm'])){
                           					 echo "送付希望";
                        				}else{
                           					 echo "送付を希望しない";
                        				}
						?>
					</td> 

				</tr> 
					<th>書籍の感想</th>
					<td>
						<?php
							$_SESSION["message"] = nl2br($_POST["message"]);
							echo $_SESSION["message"];
						?>
					</td>
				<tr>
					<td colspan="2"><input type="submit" value="回答を送信する">
					</td> 
				</tr> 
			</table> 
		</form> 
	</body> 
</html>


