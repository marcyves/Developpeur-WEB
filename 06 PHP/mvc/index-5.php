<?php
/*
==============================================================================

 Ce script fait partie d'une série d'exemples de code mise à disposition
  sur https://github.com/marcyves/Developpeur-Web

 (c) 2019 Marc Augier

==============================================================================
*/

// On utilise une nouvelle classe 'MenuEntry' pour enregistrer les entrées de menu

include("class/classes.inc.5.php");

$ma_page = new Blog("Ma page POO");

$ma_page->setChapeau("Notre blog");

// Construction d'une architecture dynamique
// Nous aurons une seule page index.php qui reçoit en paramètre la page à afficher ($_GET['page'])
// Reste à identifier sur quelle page nous sommes pour la rendre 'active' sur le menu
$tmp0 ="";
$tmp1 ="";
$tmp2 ="";
$tmp3 ="";
if(isset($_GET['page'])){
	$page = $_GET['page'];
	switch($page){
		case "index":
			$tmp0 = "active";
		break;
		case "blog":
			$tmp1 = "active";
		break;
		case "album":
			$tmp2 = "active";
		break;
		case "catalogue":
			$tmp3 = "active";
		break;
		default:
			$tmp0 = "active";
	}
}else{
	$page = "index";
	$tmp0 = "active";
}

$menu = array(
new MenuEntry("Accueil", "index",$tmp0),
new MenuEntry("Le Blog", "blog",$tmp1),
new MenuEntry("L'Album","album",$tmp2),
new MenuEntry("Le Catalogue","catalogue",$tmp3)
 );

$ma_page->setMenu($menu);
// Il faudrait maintenant personnaliser le contenu en fonction de ce qui est dans $page
$ma_page->setArticle("un article", "du  texte pour $page","Marc","30 janvier 2019");

$ma_page->preparePage();

echo $ma_page;

?>