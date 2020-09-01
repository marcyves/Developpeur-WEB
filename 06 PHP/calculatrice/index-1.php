<?php
/*
==============================================================================

 Ce script fait partie d'une série d'exemples de code mise à disposition
  sur https://github.com/marcyves/Developpeur-Web

 (c) 2019 Marc Augier

==============================================================================
*/

echo "<h1>Calculatrice</h1>";

$n1 = 123;
$n2 = 456;

//$resultat = addition($n1,$n2);
//echo "Le résultat de $n1 + $n2 est $resultat";
echo "Le résultat de $n1 + $n2 est ".addition($n1,$n2);

function addition($a,$b){

	return $a + $b;
}

?>
