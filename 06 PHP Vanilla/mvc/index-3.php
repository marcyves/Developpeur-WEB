<?php
/*
==============================================================================

 Ce script fait partie d'une série d'exemples de code mise à disposition
  sur https://github.com/marcyves/Developpeur-Web

 (c) 2019 Marc Augier

==============================================================================
*/

// On utilise une nouvelle classe 'MenuEntry' pour enregistrer les entrées de menu

include("class/classes.inc.3.php");

$ma_page = new Blog("Ma page POO");

$ma_page->setChapeau("Notre blog");

// Les entrées de menu sont des instances de 'MenuEntry' stockées dans un tableau
// Ce qui permet de passer un 3e paramètre pour savoir comment afficher cette entrée (active ou pas)
$menu = array(
new MenuEntry("Google", "http://www.google.fr",""),
new MenuEntry("Lilo","http://www.lilo.org","active")
 );

$ma_page->setMenu($menu);

$ma_page->setArticle("un article", "du  texte","Marc","30 janvier 2019");

$ma_page->preparePage();

echo $ma_page;

?>