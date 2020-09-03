<?php
/*
==============================================================================

 Ce script fait partie d'une série d'exemples de code mise à disposition
  sur https://github.com/marcyves/Developpeur-Web

 (c) 2019 Marc Augier

==============================================================================
*/
header("Content-type: image/jpeg");

$msg     = $_GET['msg'];

$fichier = $_GET['img'];
$mon_image = imagecreatefromjpeg($fichier);

$ma_police = dirname(__FILE__)."/WeatherSunday-PersonalUse.ttf";
$ma_couleur = imagecolorallocate($mon_image, 166,175,244);

imagettftext($mon_image, 50, 30,120, 200,$ma_couleur, $ma_police, $msg);

imagejpeg($mon_image);
?>
