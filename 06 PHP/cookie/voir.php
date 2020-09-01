<?php
/*
==============================================================================

 Ce script fait partie d'une série d'exemples de code mise à disposition
  sur https://github.com/marcyves/Developpeur-Web

 (c) 2019 Marc Augier

==============================================================================
*/


echo "<h2>Les cookies</h2>";

echo "<pre>";
var_dump($_COOKIE);
echo "</pre>";

if(!empty($_COOKIE['utilisateur'])){
	echo "Bonjour ".$_COOKIE['utilisateur'];
} else {
	echo "On ne se connait pas";
}

echo '<br><a href="index-1.php">index</a>';
?>
