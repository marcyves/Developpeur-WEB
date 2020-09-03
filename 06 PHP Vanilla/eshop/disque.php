<?php
/*
==============================================================================

 Ce script fait partie d'une série d'exemples de code mise à disposition
  sur https://github.com/marcyves/Developpeur-Web

 (c) 2019 Marc Augier

==============================================================================
*/

include 'fonctions.inc.php';

entete("Le eshop de la boutique en ligne sur le Web");

$liste = array(
	"The Lamb Lies on Broadway" => 33,
	"Tome IV" => 52,
	"Closing Time" => 47,
	"Back In Black" => 58
);

afficheFormulaire($liste);

if(!empty($_POST)){
	enregistreProduitPanier("disque");
}

pied();

?>