<?php
/*
==============================================================================

 Ce script fait partie d'une série d'exemples de code mise à disposition
  sur https://github.com/marcyves/Developpeur-Web

 (c) 2019 Marc Augier

==============================================================================
*/

// On utilise une nouvelle classe 'MenuEntry' pour enregistrer les entrées de menu

include("class/classes.inc.4.php");

$ma_page = new Blog("Ma page POO");

$ma_page->setChapeau("Notre blog");

// Les entrées de menu pointent vers des pages locales du site
// La page 'active' est assignée directement
// Il faudrait donc maintenant créer sur ce modèle les 3 autres pages:
// - blog.php
// - album.php
// - catalogue.php

$menu = array(
new MenuEntry("Accueil", "index-4.php","active"),
new MenuEntry("Blog", "blog.php",""),
new MenuEntry("Album","album.php",""),
new MenuEntry("Catalogue","catalogue.php","")
 );
$ma_page->setMenu($menu);

$ma_page->setArticle("un article", "du  texte","Marc","30 janvier 2019");

$ma_page->preparePage();

echo $ma_page;

?>