<?php
/*
==============================================================================

 Ce script fait partie d'une série d'exemples de code mise à disposition
  sur https://github.com/marcyves/Developpeur-Web

 (c) 2019 Marc Augier

==============================================================================
*/
header("Content-type: image/jpeg");
$mon_image = imagecreatefromjpeg("icone.jpg");

$ma_couleur = imagecolorallocate($mon_image, 66,75,244);
imagestring($mon_image, 5, 50, 50, "Bonjour!",$ma_couleur);

imagejpeg($mon_image);
?>
