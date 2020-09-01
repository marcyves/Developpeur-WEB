<?php

echo "<h2>Les sessions</h2>";
/* 
Pour passer de cookie à GET

ini_set('session.use_cookies',0);
ini_set('session.use_trans_sid',1);
*/

//session_name("sans");
session_start();

echo "<pre>";
var_dump($_COOKIE);
echo "</pre>";

$_SESSION['nom'] = "Toto";
$_SESSION['profil'] = "user";

echo "Les identifiants de la sessions:<br>";
echo session_name()." = ". session_id();

echo "<br>La page <a href='session-cookie.php'>suivante avec cookie</a>";
echo "<br>La page <a href='session-id.php?id=".session_id()."'>suivante par GET</a>";
?>