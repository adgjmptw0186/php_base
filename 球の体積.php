<?php
	$r = 3;
	function boll($r) {
		$a = 4/3 * 3.14 * $r**3;
	return $a;
	}
	echo "半径".$r."の球の体積は".boll($r)."<br>";
?>
