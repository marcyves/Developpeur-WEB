<?php

session_start();

echo "<h2>Les sessions</h2>";
echo "Les identifiants de la sessions:<br>";
echo session_name()." = ". session_id();

echo "<br>Nom    : ".$_SESSION['nom'];
echo "<br>Profil : ".$_SESSION['profil']; 

session_destroy();
session_name("sans");
session_start();

echo "<h2>Les sessions</h2>";
echo "Les identifiants de la sessions:<br>";
echo session_name()." = ". session_id();

echo "<br>Nom    : ".$_SESSION['nom'];
echo "<br>Profil : ".$_SESSION['profil']; 

echo "<br><a href='index.php'>retour</a>";

?>