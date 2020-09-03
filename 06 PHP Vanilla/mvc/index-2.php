<?php
/*
==============================================================================

 Ce script fait partie d'une série d'exemples de code mise à disposition
  sur https://github.com/marcyves/Developpeur-Web

 (c) 2019 Marc Augier

==============================================================================
*/

// Cette fois nous utilisons une classe enfant 'Blog' qui hérite de la classe 'Page'

include("class/classes.inc.2.php");

$ma_page = new Blog("Ma page POO");

$ma_page->setChapeau("Notre blog");

// Les entrées de menu sont déclarées dans un tableau
$ma_page->setMenu(array("Google" => "http://www.google.fr","Lilo"=>"http://www.lilo.org"));

$ma_page->setArticle("un article", "du  texte","Marc","30 janvier 2019");

$ma_page->preparePage();

echo $ma_page;

?>