<?php
/*
==============================================================================

 Ce script fait partie d'une série d'exemples de code mise à disposition
  sur https://github.com/marcyves/Developpeur-Web

 (c) 2019 Marc Augier

==============================================================================
*/

include("class/classes.inc.7.php");

// Construction d'une architecture dynamique
// Nous aurons une seule page index.php qui reçoit en paramètre la page à afficher ($_GET['page'])
// Reste à identifier sur quelle page nous sommes pour la rendre 'active' sur le menu

// Solution de construction du menu plus compacte
if(isset($_GET['page'])){
	$page = $_GET['page'];
}else{
	$page = "index";
}

$ma_page = new Blog("Ma page POO", $page, "Notre blog");

// Il faudrait maintenant personnaliser le contenu en fonction de ce qui est dans $page
$ma_page->setArticle("un article", "du  texte pour $page","Marc","30 janvier 2019");

$ma_page->preparePage();

echo $ma_page;

?>