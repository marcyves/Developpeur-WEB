<?php
/*
==============================================================================

 Ce script fait partie d'une série d'exemples de code mise à disposition
  sur https://github.com/marcyves/Developpeur-Web

 (c) 2019 Marc Augier

==============================================================================
*/

include("class/classes.inc.6.php");

$ma_page = new Blog("Ma page POO");

$ma_page->setChapeau("Notre blog");

// Construction d'une architecture dynamique
// Nous aurons une seule page index.php qui reçoit en paramètre la page à afficher ($_GET['page'])
// Reste à identifier sur quelle page nous sommes pour la rendre 'active' sur le menu

// Solution de construction du menu plus compacte
if(isset($_GET['page'])){
	$page = $_GET['page'];
}else{
	$page = "index";
}

$menu = array(
new MenuEntry("Accueil", "index",($page=="index"?"active":"")),
new MenuEntry("Le Blog", "blog",($page=="blog"?"active":"")),
new MenuEntry("L'Album","album",($page=="album"?"active":"")),
new MenuEntry("Le Catalogue","catalogue",($page=="catalogue"?"active":""))
 );

$ma_page->setMenu($menu);
// Il faudrait maintenant personnaliser le contenu en fonction de ce qui est dans $page
$ma_page->setArticle("un article", "du  texte pour $page","Marc","30 janvier 2019");

$ma_page->preparePage();

echo $ma_page;

?>