<?php

print_r($_GET);

function ajouteGuide($nom, $prenom){
	
    $db = mysqli_connect("localhost","guide","alpin","club_alpin", "3406");
	echo "<br>Code: ".$db->connect_error;
	
	$sql = "INSERT INTO participant(nom, prenom) VALUES ('$nom','$prenom')";
	echo "<br>".$sql;
	$db->query($sql);
	echo "<br>Code: ".$db->connect_error;
//	$db->close();
	
	return true;
}

$fichier_template = "future.html";


 if (file_exists($fichier_template)) {
	
//première méthode	
//	$fi = fopen($fichier_template,"r");
//	$page_html = fread($fi, filesize($fichier_template));

//deuxième méthode
	$page_html = file_get_contents ($fichier_template);
	
	switch($_GET['valide'])
	{
		case "Ok":
			$le_titre = "Création d'un nouveau Guide";
			if (ajouteGuide($_GET['nom'],$_GET['prenom']) ){
				$le_texte = "Le guide ".$_GET['prenom']." ".$_GET['nom'].", a été ajouté.";
			} else {
				$le_texte = "Erreur lors de la création de ".$_GET['prenom']." ".$_GET['nom'].".";				
			}
		break;
		case "Cancel": 
			$le_titre = "Vous avez cliqué cancel";
			$le_texte = "Un petit effort";
		break;
		default:
			$le_titre =  "Mon titre sur template";

			$le_texte = '<form method="get">
		  <select name="civilite">
			<option value="1">Monsieur</option>
			<option value="2">Madame</option>
			<option value="3">Mademoiselle</option>
		  </select><br>
		  Nom : <input type="text" name="nom" value="?"><br>
		  Prénom : <input type="text" name="prenom"><br>
		  <input type="submit" name="valide" value="Ok">
		  <input type="submit" name="valide" value="Cancel">
		</form>';
	}
	
	$page_html = str_replace("@@title@@", $le_titre, $page_html);
	$page_html = str_replace("@@contenu@@", $le_texte, $page_html);
	echo $page_html;
 
 } else {
	 echo "fichier non existant";
 }

?>
