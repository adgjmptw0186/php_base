<!DOCTYPE html> 
<html> 
	<head> 
		<meta charset="utf-8"> 
		<title>アンケートフォーム</title> 
		<link rel="stylesheet" href="style.css"> 
	</head> 
	<body> 
		<h1>アンケートフォーム（1．回答画面）</h1> 
		<p>アンケートに回答して「確認する」ボタンをクリックしてください。</p> 
		<form method="post" action="check.php"> 
			<table> 
				<tr> 
					<th>お名前</th> 
					<td><input type="text" name="uname" size="30"></td> 
				</tr> 
				<tr> 
					<th>メールアドレス</th> 
					<td><input type="email" name="email" size="30"></td> 
				</tr> 
				<tr> 
					<th>性別</th> 
					<td><input type="radio" name="gender" value="男">男性
					　　<input type="radio" name="gender" value="女">女性
					</td> 
				</tr> 
				<tr> 
					<th>職業</th> 
					<td><select name = "job">
						<option value = "">▼選択</opution>
						<option>学生</option>
						<option>会社員</option>
						<option>公務員</option>
						<option>自営業</option>
						<option>その他</option>
					    </select>
					</td> 
				</tr> 
				<tr> 
					<th>書籍の満足度は？</th> 
					<td>
					<?php
						$ar_rate = array(
						"満足"=>"満足",
						"やや満足"=>"やや満足",
						"普通"=>"普通",
						"やや不満"=>"やや不満",
						"不満"=>"不満"
						);
					foreach($ar_rate as $key=>$value){
					echo "<input type = \"radio\" name = \"rate1\" value = \"{$key}\" > {$value}";
					}
					?>
					</td>
				</tr> 
				<tr> 
					<th>書籍のボリュームは？</th>
					<td>
					<?php
						$ar_rate = array(
						"満足"=>"満足",
						"やや満足"=>"やや満足",
						"普通"=>"普通",
						"やや不満"=>"やや不満",
						"不満"=>"不満"
						);
					foreach($ar_rate as $key=>$value){
					echo "<input type = \"radio\" name = \"rate2\" value = \"{$key}\" > {$value}";
					}
					?>
					</td>
				</tr>
				<tr> 
					<th>経験のある技術（複数選択可）</th> 
					<td><input type="checkbox" name="tec[]" value="PHP">PHP
					    <input type="checkbox" name="tec[]" value="Java">Java
					    <input type="checkbox" name="tec[]" value="Ruby">Ruby
					    <input type="checkbox" name="tec[]" value="C#">C＃
					    <input type="checkbox" name="tec[]" value="Perl">Perl
					</td> 
					<?php
						if(empty(@$_POST["tec"])){
							$tec="なし";
						}else{
						echo $tec = implode("",$_POST["tec"]);
						}
					?>
				</tr> 
				<tr> 
					<th>新刊情報のお知らせ</th> 
					<td>
					　　<input type="checkbox" name="dm" value="送付希望">送付を希望する
					    <p id="message" style="display:none">送付希望</p>
					<?php
						if(empty(@$_POST["dm"])){
							$dm="なし";
						}else{
						echo $dm = implode("",$_POST["dm"]);
						}
					?>
					</td>
				</tr> 
				<tr> 
					<th>書籍の感想</th>
					<td><textarea rows="5" cols="30" name="message" required></textarea></td> 
				<tr>
					<td colspan="2"><input type="submit" value=" 確認する"></td> 
				</tr> 
			</table> 
		</form> 
	</body> 
</html>

