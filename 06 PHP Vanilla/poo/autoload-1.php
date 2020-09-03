<?php
/*
==============================================================================

 Ce script fait partie d'une série d'exemples de code mise à disposition
  sur https://github.com/marcyves/Developpeur-Web

 (c) 2019 Marc Augier

==============================================================================
*/

//error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

function __autoload ($class) {
    require_once("class/$class.php");
}

echo "<h2>Premier</h2>";

$obj = new MenuEntry("Accueil", "index", "active");

echo "<h2>résultat</h2>";
echo $obj;

?>
