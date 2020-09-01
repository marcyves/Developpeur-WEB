<?php
/*
==============================================================================

 Ce script fait partie d'une série d'exemples de code mise à disposition
  sur https://github.com/marcyves/Developpeur-Web

 (c) 2019 Marc Augier

==============================================================================
*/

// Variables globales, locales et fonctions

$titre = "Mon exemple de site";
$message = "Bonjour tout le monde";

function affiche($texte){
	global $message;

	echo "<h1>$texte</h1>";
	$texte = "toto";
	echo "<h1>$texte</h1>";
	echo "mon message $message";
	$message = "je change";
}

affiche($titre);

echo "<br>Le texte $texte";
echo "<br>Le titre $titre";
echo "<br>Le message $message";

?>
