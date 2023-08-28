<?php
	//24 時間単位の現在時刻を取得
	$hour = date("G");
	if($hour >= 18){
		echo "Good evening";
	}else{
		echo "Hello";
	}
?>
