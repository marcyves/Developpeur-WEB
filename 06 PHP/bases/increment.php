<?php
/*
==============================================================================

 Ce script fait partie d'une série d'exemples de code mise à disposition
  sur https://github.com/marcyves/Developpeur-Web

 (c) 2019 Marc Augier

==============================================================================
*/

$a = 5;
$b = 8;

$b = $a++ + $b++;
$a = $a++ + $b++;

echo "a $a b $b";

?>
