<?php
/*
==============================================================================

 Ce script fait partie d'une série d'exemples de code mise à disposition
  sur https://github.com/marcyves/Developpeur-Web

 (c) 2019 Marc Augier

==============================================================================
*/

// Exemple simple avec utilisation d'une seule classe 'Page'

include("class/classes.inc.1.php");

$ma_page = new Page("Ma page POO");

$ma_page->setBody("ça prend forme");

echo $ma_page;

?>