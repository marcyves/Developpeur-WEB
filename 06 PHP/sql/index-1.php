<?php
/*
==============================================================================

 Ce script fait partie d'une série d'exemples de code mise à disposition
  sur https://github.com/marcyves/Developpeur-Web

 (c) 2019 Marc Augier

==============================================================================
*/

// config.inc.php
// Connexion à la base de données
$db_host = "localhost:3406";
$db_user = "fanzine";
$db_pass = "top_secret";
$db_name = "fanzine";

// modele.inc.php
$db = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($db->connect_errno){
	echo "<h2>Erreur de connexion à la base de données</h2>";
	echo "Erreur : ".$db->connect_error." code (".$db->connect_errno.")";

	exit;
}
// var_dump($db);

// Le code à intégrer dans une page
$sql = "SELECT type_id, type_nom FROM type";

if ($result = $db->query($sql)){
	echo "<h3>avec fetch_row</h3>";

	echo "<ul>";
	while(list($id,$nom) = $result->fetch_row()){
		echo "<li>($id) $nom</li>";
	}
	echo "</ul>";

	echo "<h3>avec fetch_array 1</h3>";

	$result->data_seek(0);

	echo "<ul>";
	while($type = $result->fetch_array()){
		echo "<li>(".$type[0].") ".$type[1]."</li>";
	}
	echo "</ul>";

	echo "<h3>avec fetch_array 2</h3>";

	$result->data_seek(0);

	echo "<ul>";
	while($type = $result->fetch_array()){
		echo "<li>(".$type['type_id'].") ".$type['type_nom']."</li>";
	}
	echo "</ul>";
}else{
	echo "<h2>Erreur sur la requête</h2>";
	echo $sql;
	echo "<br>Erreur : ".$db->error." code (".$db->errno.")";
}
?>
