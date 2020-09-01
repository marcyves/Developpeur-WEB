<?php
/*
==============================================================================

 Ce script fait partie d'une série d'exemples de code mise à disposition
  sur https://github.com/marcyves/Developpeur-Web

 (c) 2019 Marc Augier

==============================================================================
*/

echo "<h1>Calculatrice</h1>";

// print_r($_GET);

if(isset($_GET['n1']) and isset($_GET['n2'])){
	if(is_numeric($_GET['n1']) and is_numeric($_GET['n2'])){
		$n1 = $_GET['n1'];
		$n2 = $_GET['n2'];

		//$resultat = addition($n1,$n2);
		//echo "Le résultat de $n1 + $n2 est $resultat";
		echo "Le résultat de $n1 + $n2 est ".addition($n1,$n2);

		affiche_calculatrice($n1,$n2);

	} else {
		echo "Merci d'entrer une valeur numérique";
		affiche_calculatrice(0,0);
	}
} else {
	affiche_calculatrice(0,0);
}
function affiche_calculatrice($a,$b){
	echo "<form method='get'>
Nombre 1 : <input type='text' name='n1' value='$a'><br>
Nombre 2 : <input type='text' name='n2' value='$b'><br>
<input type='submit' value='ok'>
</form>";
}

function addition($a,$b)
{
	return $a + $b;
}

?>
