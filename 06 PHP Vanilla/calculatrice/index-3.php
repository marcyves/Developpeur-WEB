<?php
/*
==============================================================================

 Ce script fait partie d'une série d'exemples de code mise à disposition
  sur https://github.com/marcyves/Developpeur-Web

 (c) 2019 Marc Augier

==============================================================================
*/

?>
<form method='get'>
Nombre 1 : <input type='text' name='n1' ><br>
Nombre 2 : <input type='text' name='n2' ><br>
<input type='submit' value='+' name='operation'>
<input type='submit' value='-' name='operation'>
<input type='submit' value='/' name='operation'>
<input type='submit' value='*' name='operation'>
</form>
<?php

if(isset($_GET['n1']) and isset($_GET['n2'])){
	if(is_numeric($_GET['n1']) and is_numeric($_GET['n2'])){
    $n1 = $_GET['n1'];
    $n2 = $_GET['n2'];

    $operation = $_GET['operation'];
    switch($operation){
	    case "+":
		    $resultat = addition($n1,$n2);
  	  break;
	    case "-":
	 	    $resultat = soustraction($n1,$n2);
	    break;
	    case "*":
		    $resultat = multiplication($n1,$n2);
	    break;
	    case "/":
	  	  $resultat = division($n1,$n2);
	    break;
	    default:
		    echo "C'est impossible d'arriver ici";
	    break;
    }

		echo "Le résultat de $n1 $operation $n2 est $resultat";

	} else {
		echo "Merci d'entrer une valeur numérique";
	}
}
// Les fonctions suivent

function addition($a,$b)
{
	return $a + $b;
}

function multiplication($a,$b)
{
	return $a * $b;
}

function soustraction($a,$b)
{
	return $a - $b;
}

function division($a,$b)
{
	$t = ($b==0)?"Erreur division par zero":$a/$b;
	return $t;
}
?>
