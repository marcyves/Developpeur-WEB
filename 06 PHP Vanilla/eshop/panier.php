<?php
/*
==============================================================================

 Ce script fait partie d'une série d'exemples de code mise à disposition
  sur https://github.com/marcyves/Developpeur-Web

 (c) 2019 Marc Augier

==============================================================================
*/

include 'fonctions.inc.php';

entete("Le eshop de la boutique connectée en ligne sur le Web");
if(!empty($_POST)){
	echo "<h2>Merci pour votre commande</h2>";
	$_SESSION['compteur'] = 0;
	$_SESSION['panier']   = array();
	session_destroy();
}


if($_SESSION['compteur'] == 0){
	echo "<h2>Votre panier est vide</h2>";
} else {
	echo "<h2>Contenu de votre panier</h2>";
	
	echo "<ol>";
	foreach($_SESSION['panier'] as $item){
		foreach($item as $code => $type){
			echo "<li>$code ($type)</li>";
		}
	}
	echo "</ol>";
	
	echo "<form method='post'>
	<input type='submit' name='cmd' value='Passer commande'>
	</form>";
}
pied();

?>