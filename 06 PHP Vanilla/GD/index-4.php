<?php
/*
==============================================================================

 Ce script fait partie d'une série d'exemples de code mise à disposition
  sur https://github.com/marcyves/Developpeur-Web

 (c) 2019 Marc Augier

==============================================================================
*/
echo "<h3>Image de départ</h3>";
echo "<img src='cervin.jpg'>";

$source = imagecreatefromjpeg("cervin.jpg");
$largeur_s = imagesx($source);
$hauteur_s = imagesy($source);

$ratio = 4;

$largeur_d = $largeur_s/$ratio;
$hauteur_d = $hauteur_s/$ratio;

$destination = imagecreatetruecolor($largeur_d, $hauteur_d);

imagecopyresampled($destination, $source, 0 , 0 , 0, 0, $largeur_d, $hauteur_d, $largeur_s, $hauteur_s);

imagejpeg($destination,"mini_cervin.jpg");

echo "<h3>imagette produite</h3>";
echo "<img src='mini_cervin.jpg'>";

?>
