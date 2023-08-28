<?php
	//ユーザ定義関数を作成する
	function total_price($price){
		if($price < 3000){
			$price += 500;
		}
		return $price;
	}
	echo total_price(2000);
?>
