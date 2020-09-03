<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>  
<script>  
 $(document).ready(function() {   
   $('input[name=filter]').change(function(){  
        $('form[id=filtre]').submit();  
   });  
  });  
</script> 
<?php

// config.inc.php
// Connexion à la base de données
$db_host = "localhost:3406";
$db_user = "fanzine";
$db_pass = "top_secret";
$db_name = "fanzine";

try{
$db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
} catch (PDOException $e){
	echo "<h2>Erreur de connexion à la base de données</h2>";
	echo "Erreur : ".$e->getMessage();
	exit;
}

function voir($v){
	echo "<pre>";
	var_dump($v);
	echo "</pre>";
}

voir($_POST);

if (!empty($_POST['cmd'])){
	$cmd = $_POST['cmd'];
	switch($cmd){
		case "Filtrer":
		break;
		case "Nouvelle":
			$sql = "INSERT INTO oeuvre (oeuvre_nom, oeuvre_description, oeuvre_type_id) VALUES (?,?,?)";
			$result = $db->prepare($sql);
			if ($result->execute(array($_POST['nom'], $_POST['description'], $_POST['type']))){		
				echo "Nouvelle oeuvre insérée dans la table";
			}else{
				echo "<h3>Erreur dans la création d'une nouvelle oeuvre</h3>";
				echo $sql."<br>";
				var_dump($db->errorInfo());
				echo "<br>Erreur : ".$db->errorCode();
			}
		break;
		case "Effacer":
			$sql = "DELETE FROM oeuvre WHERE oeuvre_id=".$_POST['id'].";";
			if ($result = $db->query($sql)){
				echo "Oeuvre effacée de la table";
			}else{
				echo "<h3>Erreur dans l'effacement d'une oeuvre</h3>";
				echo $sql."<br>";
				var_dump($db->errorInfo());
				echo "<br>Erreur : ".$db->errorCode();
			}
		break;
		case "Modifier2":
			$sql = "UPDATE oeuvre SET "
			."oeuvre_nom = '".$_POST['nom']."', "
			."oeuvre_description = '".$_POST['description']."', "
			."oeuvre_type_id = '".$_POST['type_id']."' "
			."WHERE oeuvre_id = ".$_POST['id'].";";
			if ($result = $db->query($sql)){
				echo "Oeuvre modifiée dans la table";
			}else{
				echo "<h3>Erreur dans la modification d'une oeuvre</h3>";
				echo $sql."<br>";
				var_dump($db->errorInfo());
				echo "<br>Erreur : ".$db->errorCode();
			}
		break;
		case "Modifier":
			$sql = "SELECT oeuvre_id, oeuvre_nom, oeuvre_description, oeuvre_type_id FROM oeuvre WHERE oeuvre_id=".$_POST['id'].";";
			$result = $db->prepare($sql);
			if ($result->execute()){
				echo "<form method='post'>";
				list($id, $nom, $description, $type_id) = $result->fetch();
				echo "<input type='hidden' name='id' value='$id'>";		
				echo "<input type='text' name='nom' value='$nom'>
				<br>
				<textarea name='description'>$description</textarea>
				<br>";

				$sql = "SELECT type_id, type_nom FROM type";
				if ($result = $db->query($sql)){
					while(list($id,$nom) = $result->fetch()){
						if ($id=$type_id)
							$tmp = "checked";
						else
							$tmp = "";
						echo "<input type='radio' name='type_id' value='$id'$tmp> $nom<br>";
					}
				}
				echo "<input type='hidden' name='cmd' value='Modifier2'>";
				echo "<input type='submit' value='Modifier'></form>";
			}
		break;
		default:
		echo "Fonction non implémentée";
	}
}

echo "<h1>Liste des oeuvres</h1>";
echo "Filtre";
$sql = "SELECT type_id, type_nom FROM type";
$result = $db->prepare($sql);
if ($result->execute()){
	echo "<form method='post' id='filtre'>";
	echo "<input type='hidden' name='cmd' value='Filtrer'> 
	<ul>";
	while(list($id, $nom) = $result->fetch()){
		echo "<li><input type='radio' name='filter' value=$id> $nom</li>";
	}
	echo "</ul>
	</form>
	";
}
echo "Les oeuvres";
$sql = "SELECT oeuvre_id,oeuvre_nom, type_nom FROM oeuvre, type WHERE type_id = oeuvre_type_id";
$result = $db->prepare($sql);
if ($result->execute()){
	echo "<form method='post'><ul>";
	while(list($id, $nom) = $result->fetch()){
		echo "<li><input type='radio' name='id' value=$id> $nom</li>";
	}
	echo "</ul>
	<input type='submit' name='cmd' value='Effacer'> 
	<input type='submit' name='cmd' value='Modifier'> 
	</form>
	";
}

echo "<form method='post'>
<input type='text' name='nom' placeholder='Le nom'>
<br>
<textarea name='description'>
</textarea>
<br>";

$sql = "SELECT type_id, type_nom FROM type";
if ($result = $db->query($sql)){
	while(list($id,$nom) = $result->fetch()){
		echo "<input type='radio' name='type' value='$id'> $nom<br>";
	}
}

echo "<input type='submit' name='cmd' value='Nouvelle'>
</form>";


?>
