<?php
/*
==============================================================================

 Ce script fait partie d'une série d'exemples de code mise à disposition
  sur https://github.com/marcyves/Developpeur-Web

 (c) 2019 Marc Augier

==============================================================================
*/

function __autoload($classe){
	echo "<br>Je charge la classe $classe";
	include "class/class.$classe.php";
}

//include('class/class.produit.php');
//include('class/class.musique.php');

/*

Instances de la classe produit (parente)

*/
$mickey = new produit("Journal de Mickey", "Walt Disney", "Pour les petits et les grands","1928");

var_dump($mickey);
 
echo "<h2>".$mickey->nom."</h2>";
echo "<h2>".$mickey->getAuteur()."</h2>";

$mickey->setAuteur("Marc Augier");


echo "<h2>".$mickey->getAuteur()."</h2>";

$genesis = new produit("The Lamb Lies Down On Broadway", "Genesis", "du son du bon", "1974");

echo "<h2>".$genesis->getAuteur()."</h2>";

echo $mickey;
echo $genesis;

unset($genesis);

/*
$moliere = new produit("Le malade imaginaire");

echo "<pre>";
var_dump($moliere);
echo "</pre>";
*/

/*
	La classe musique fille
*/
$genesis = new musique("Abacab","Genesis","Du son moins bon","1981","60");

echo "<pre>";
var_dump($genesis);
echo "</pre>";

$genesis->setDuree(80);

// $beatles = new musique("Let It Be","Beatles", "bon","1970");

$genesis->annee ="1850";
echo $genesis->description;

?>