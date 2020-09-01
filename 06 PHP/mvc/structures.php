<?php
/*
==============================================================================

 Ce script fait partie d'une série d'exemples de code mise à disposition
  sur https://github.com/marcyves/Developpeur-Web

 (c) 2019 Marc Augier

==============================================================================
*/

// Démonstrations de différentes structures de données
// pour manipuler les 3 informations d'un lien de menu
// sans utiliser une classe

// Avec un tableau 'liste' pointant sur des listes
$menu1 = array(
			array("Google", "www.google.fr","active"),
			array("Lilo","www.lilo.fr","")
			);

echo $menu1[0][0]. " pointe sur ".$menu1[0][1]."<br>";

// Avec un tableau 'dictionnaire' pointant sur des dictionnaires
$menu2 = array(
			"Google" => array(
							"lien" => "www.google.fr",
							"statut" => "active"
							),
			"Lilo" => array(
							"lien" => "www.lilo.fr",
							"statut" => ""
							)
			);
	
foreach($menu2 as $label => $tab){
	echo "$label pointe sur ".$tab['lien']."<br>";
}
	
var_dump(json_encode($menu2));
	
?>