<?php
	$r = 3;
	function circle($r) {
		$a = $r * $r * 3.14;
	return $a;
	}
	echo "半径".$r."の円の面積は".circle($r)."<br>";

	function boll($r) {
		$b = 4/3 * 3.14 * $r**3;
	return $b;
	}
	echo "半径".$r."の球の体積は".boll($r)."<br>";

	function en($r) {
		$c = $r*2 * 3.14;
	return $c;
	}
	echo "半径".$r."の円の円周は".en($r);

?>
