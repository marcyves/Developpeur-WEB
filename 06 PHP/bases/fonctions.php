<?php
/*
==============================================================================

 Ce script fait partie d'une série d'exemples de code mise à disposition
  sur https://github.com/marcyves/Developpeur-Web

 (c) 2019 Marc Augier

==============================================================================
*/

/*

Calcul de factorielle

*/
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

echo "<br>Factorielle 5 = ".factorielle1(5);
echo "<br>Factorielle 5 = ".factorielle2(5);
echo "<br>Factorielle 5 = ".factorielle3(5);

echo "<br>Factorielle 0 = ".factorielle1(0);
echo "<br>Factorielle 0 = ".factorielle2(0);

?>
