<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>  
<script>  
 $(document).ready(function() {   
   $('input[name=filtre]').change(function(){  
        $('form[id=filtre]').submit();  
   });  
  });  
</script> 
<?php

$db = connecteDB();
$message ="";
/*
echo "<pre>";
print_r($_POST);
echo "</pre>";
*/

if (isset($_COOKIE['filtre_type'])){
	$filtre_type = $_COOKIE['filtre_type'];
	setcookie("filtre_type",$filtre_type, time()+60);
}else{
	$filtre_type = 0;
}

if(isset($_POST['cmd'])){
	$cmd = $_POST['cmd'];
	switch($cmd){
		case "filtrer":
			$filtre_type = $_POST['filtre'];
			setcookie("filtre_type",$filtre_type, time()+60);
		break;
		case "inserer":
			if (!empty($_POST['nom']) and !empty($_POST['type'])){
				insererOeuvre($db,$_POST['nom'], $_POST['description'], $_POST['type']);
			}else{
				$message = "Le nom et le type sont obligatoires !";
			}
		break;
		case "modifier1":
			if (!empty($_POST['id'])){
				afficheFormulaireModif($db, $_POST['id']);
			}else{
				$message = "Veuillez sélectionner une entrée";
			}
		break;
		case "modifier2":
			if (!empty($_POST['nom']) and !empty($_POST['type']) and !empty($_POST['oeuvre'])){
				modifierOeuvre($db, $_POST['oeuvre'], $_POST['nom'], $_POST['description'], $_POST['type']);
			}else{
				$message = "Le nom et le type sont obligatoires !";
			}
		break;
		case "details":
			if (!empty($_POST['id'])){
				afficheDetailsOeuvre($db, $_POST['id']);
			}else{
				$message = "Veuillez sélectionner une entrée";
			}
		break;
		case "effacer1":
			if (!empty($_POST['id'])){
				afficheDetailsOeuvre($db, $_POST['id']);
				afficheFormulaireEffacer($_POST['id']);
			}else{
				$message = "Veuillez sélectionner une entrée";
			}
		break;
		case "effacer2":
			effacerOeuvre($db,$_POST['id']);
		break;
		default:
			$message = "Fonction non implémentée";
	}
}
afficheFiltre($db, $filtre_type);
afficheListeOeuvres($db, $filtre_type);
echo $message;
// Affiche le formulaire oeuvre pour création
afficheFormulaireOeuvre($db,"", "", "","");

/*
	Les fonctions d'affichage	
*/
function afficheFiltre($db, $filtre){
	$sql = "SELECT type_id, type_nom FROM type ORDER BY type_nom";
	$requete = $db->prepare($sql);
	$requete->execute();
	echo "<form method='post' style='background-color:#ffaaaa;' id='filtre'>";
	if ($filtre==0){
		$tmp = " checked";
	}else{
		$tmp = "";
	}
	echo "<input type='radio' name='filtre' value='0'$tmp> Tout ";
	while(list($id, $type)=$requete->fetch()){
		if ($id==$filtre){
			$tmp = " checked";
		}else{
			$tmp = "";
		}
		echo "<input type='radio' name='filtre' value='$id'$tmp> $type ";
	}
	echo "<input type='hidden' name='cmd' value='filtrer'>";
//	echo "<button type='submit' name='cmd' value='filtrer'>Filtrer</button>";
	echo "</form>";
	
}

function afficheListeOeuvres($db,$filtre){
	if ($filtre != 0){
		$tmp = " AND type_id = $filtre";
	}else{
		$tmp = "";
	}
	$sql = "SELECT oeuvre_id, oeuvre_nom, type_nom FROM oeuvre, type WHERE oeuvre_type_id = type_id$tmp;";
	$requete = $db->prepare($sql);
	$requete->execute();
	echo "<form method='post' style='background-color:#aaaaaa;'><ul>";
	while(list($id, $oeuvre, $type)=$requete->fetch()){
		echo "<li><input type='radio' name='id' value='$id'>$oeuvre ($type)</li>";
	}
	echo "</ul>";
	echo "<button type='submit' name='cmd' value='modifier1'>Modifier</button>";
	echo "<button type='submit' name='cmd' value='effacer1'>Effacer</button>";
	echo "<button type='submit' name='cmd' value='details'>Détails</button>";
	echo "</form>";
}

function afficheFormulaireOeuvre($db,$oeuvreId,$oeuvreNom, $description, $typeId){
	echo "<form method='post' style='background-color:#eeeeee;'>";
	echo "<input type='text' name='nom' placeholder='Nom de la création' value='$oeuvreNom'><br>
	<textarea name='description' placeholder='Description'>$description</textarea><br>";
	echo "<select name='type'><option value='0' disabled selected> --> Choisir un type</option>";
	$sql = "SELECT type_id, type_nom FROM type ORDER BY type_nom";
	$result = $db->query($sql);
	while(list($id, $nom)=$result->fetch()){
		if ($id==$typeId){
			$tmp = " selected";
		}else{
			$tmp = "";
		}
		echo "<option value='$id'$tmp>$nom</option>";
	}
	echo "</select><br>";
	if($oeuvreId=="" or $oeuvreId == 0){
		echo "<button type='submit' name='cmd' value='inserer'>Enregistrer</button>";
	}else{
		echo "<input type='hidden' name='oeuvre' value='$oeuvreId'>";
		echo "<button type='submit' name='cmd' value='modifier2'>Enregistrer</button>";
	}
	echo "<button type='reset'>Tout effacer</button>";
	echo "</form>";

}

function afficheFormulaireModif($db,$id){
	$sql = "SELECT oeuvre_id, oeuvre_nom, oeuvre_description, type_id, type_nom FROM oeuvre, type WHERE oeuvre_type_id = type_id AND oeuvre_id = ?;";
	$requete = $db->prepare($sql);
	$requete->execute(array($id));
	list($oeuvreId, $oeuvreNom, $oeuvreDescription, $typeId, $typeNom) = $requete->fetch();
	
	afficheFormulaireOeuvre($db,$oeuvreId, $oeuvreNom, $oeuvreDescription, $typeId);
}

function afficheDetailsOeuvre($db,$id){
	$sql = "SELECT oeuvre_id, oeuvre_nom, oeuvre_description, type_id, type_nom FROM oeuvre, type WHERE oeuvre_type_id = type_id AND oeuvre_id = ?;";
	$requete = $db->prepare($sql);
	$requete->execute(array($id));
	list($oeuvreId, $oeuvreNom, $oeuvreDescription, $typeId, $typeNom) = $requete->fetch();	
	
	echo "<h3>$oeuvreNom</h3><h4>$typeNom</h4><p>$oeuvreDescription</p>";
}

function afficheFormulaireEffacer($id){
	echo "<form method='post'>
	<input type='hidden' name='id' value='$id'>
	<button type='submit' name='cmd' value='effacer2'>Effacer cette entrée</button>
	</form>";
}
/*

    Les fonctions métier
	
*/
function insererOeuvre($db, $nom, $description, $type){
	$sql = "INSERT INTO oeuvre(oeuvre_nom, oeuvre_description, oeuvre_type_id) VALUES( ?, ?, ?);";
	$requete = $db->prepare($sql);   
	if ($requete->execute(array($nom, $description, $type))){
		return true;
	}else{
		echo "<h2>Modifie</h2>";
		echo "$id, $nom, $description, $type";
		echo "ERREUR SQL <pre>";
		print_r($requete->errorInfo());
		echo "</pre>";
		return false;
	}
}

function modifierOeuvre($db, $id, $nom, $description, $type){
	$sql = "UPDATE oeuvre SET oeuvre_nom = ?, oeuvre_description = ?, oeuvre_type_id = ? WHERE oeuvre_id = ?";
	$requete = $db->prepare($sql);
	if($requete->execute(array($nom, $description, $type, $id))){
		return true;
	}else{
		echo "<h2>Modifie</h2>";
		echo "$id, $nom, $description, $type";
		echo "ERREUR SQL <pre>";
		print_r($requete->errorInfo());
		echo "</pre>";
		return false;
	}
}
	
function effacerOeuvre($db, $id){
	$sql = "DELETE FROM oeuvre WHERE oeuvre_id = ?";
	$requete = $db->prepare($sql);
	if($requete->execute(array($id))){
		return true;
	}else{
		echo "<h2>Effacer</h2>";
		echo "$id, $nom, $description, $type";
		echo "ERREUR SQL <pre>";
		print_r($requete->errorInfo());
		echo "</pre>";
		return false;
	}
}

/*

	Les fonctions Données

*/
function connecteDB(){
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
	
	return $db;
}

?>