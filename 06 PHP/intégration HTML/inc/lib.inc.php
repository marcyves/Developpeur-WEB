<?php

echo "<h2>je suis lib.inc.php</h2>";

// Fonction factorielle avec increment
function factorielle1($n){
	$resultat = 1;
	for($i=1;$i<=$n;$i++){
		$resultat = $resultat * $i;
	}
 	return $resultat;
}

// Fonction factorielle avec décrement
function factorielle2($n){
	$resultat = 1;
	for($i=$n;$i>=1;$i--){
		$resultat = $resultat * $i;
	}
	return $resultat;
}

function factorielle3($n){
	if($n == 0) {
		return 1;
	} else {
		return $n*factorielle3($n-1);
	}
}

?>