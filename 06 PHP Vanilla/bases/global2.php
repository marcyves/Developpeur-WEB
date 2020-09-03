<?php
/*
==============================================================================

 Ce script fait partie d'une série d'exemples de code mise à disposition
  sur https://github.com/marcyves/Developpeur-Web

 (c) 2019 Marc Augier

==============================================================================
*/

$a = 5;
$b = 8;

function carre($c){
	echo "<br>le carré de $c est ".$c*$c;

	$a = 0;

	echo '<br>La valeur de $b est '.$GLOBALS['b'];
}

function cube($d){
	global $f;

	return $d*$d*$d;
}
// fonction sans retour
carre($a);
// fonction avec retour
echo "<br>Le cube de $a est ".cube($a);
$e = cube($b);
echo "<br>Le cube de $b est ".$d;

print_r($GLOBALS);

?>
