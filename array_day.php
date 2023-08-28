<?php
	$calendar = array(
		"定休日","終日営業","終日営業","午前のみ営業","終日営業","終日営業","午前のみ営業"
	);
	$w = date("w");
	echo $calendar[$w];
?>
