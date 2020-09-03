<?php

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

if (empty($_POST['nom'])){
	echo "<form method='post'>
	<input type='text' name='nom' placeholder='Le nom'>
	<br>
	<textarea name='description'>
	</textarea>
	<br>";

	$sql = "SELECT type_id, type_nom FROM type";
	if ($result = $db->query($sql)){
		while(list($id,$nom) = $result->fetch_row()){
			echo "<input type='radio' name='type' value='$id'> $nom<br>";
		}
	}

	echo "<input type='submit' value='Créer'>
	</form>";
}else {
	$sql = "INSERT INTO oeuvre (oeuvre_nom, oeuvre_description, oeuvre_type_id) VALUES ('".$_POST['nom']."', '".$_POST['description']."',".$_POST['type'].")";
	if ($result = $db->query($sql)){
		echo "Nouvelle oeuvre insérée dans la table";
	}else{
		echo "<h3>Erreur dans la création d'une nouvelle oeuvre</h3>";
		echo $sql;
		echo "<br>Erreur : ".$db->error." code (".$db->errno.")";

	}
}
?>
