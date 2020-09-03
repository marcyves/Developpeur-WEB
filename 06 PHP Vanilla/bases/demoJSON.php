<?php
/*
==============================================================================

 Ce script fait partie d'une série d'exemples de code mise à disposition
  sur https://github.com/marcyves/Developpeur-Web

 (c) 2019 Marc Augier

==============================================================================
*/

$menuJSON = '{"Accueil":"index", "Le Blog":"blog", "Le catalogue":"catalogue", "Album":"album"}';

//$menuJSON = file_get_contents("menu.json");

echo "<pre>";
var_dump(json_decode($menuJSON));

echo "<br>".json_last_error();
echo "<br>".json_last_error_msg();

var_dump(json_decode($menuJSON, TRUE));

?>
