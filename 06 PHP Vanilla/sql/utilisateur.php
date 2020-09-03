<?php

/*
==============================================================================

 Ce script fait partie d'une série d'exemples de code mise à disposition
  sur https://github.com/marcyves/Developpeur-Web

 (c) 2019 Marc Augier

==============================================================================
*/

echo "<h1>Bienvenue sur la démonstration de page de connexion</h1>";

// Connexion à la base de données
$db_host = "localhost";
$db_user = "fanzine";
$db_pass = "top_secret";
$db_name = "fanzine";
try{
	$db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
}catch (PDOException $e){
	echo 'Échec lors de la connexion : ' . $e->getMessage();
}

if(!empty($_COOKIE['connexion'])){

	$id = $_COOKIE['connexion'];
	setcookie("connexion",$id,time()+60*10);

	$sql = "SELECT utilisateur_pseudo, utilisateur_prenom, utilisateur_nom "
	."FROM utilisateur WHERE utilisateur_id = :id;";
	$resultat = $db->prepare($sql);
	$resultat->execute(array(':id' => $id));
	$utilisateur = $resultat->fetch();

	echo "<h1>Bonjour !</h1>";
	echo "Content de vous revoir "
	     .$utilisateur['utilisateur_prenom']
		 ." ".$utilisateur['utilisateur_nom']
		 ." (".$utilisateur['utilisateur_pseudo'].")";
}else{
	if(empty($_POST['cmd'])){
		formulaireConnexion();
	}else{
		$cmd = $_POST['cmd'];
		$connect = False;
		$message = "";

		switch($cmd){
			case "Connecter":
				$connect = connecteUtilisateur($db, $_POST['pseudo'],$_POST['passe']);
			break;
			case "Nouvel utilisateur":
				nouvelUtilisateur();
			break;
			case "Enregistrer":
				if ($_POST['passe'] != $_POST['passe2']){
					echo "<h2>Les mots de passe sont différents</h2>";
					nouvelUtilisateur();
				} else {
					$connect = enregistreUtilisateur($db, $_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['pseudo'],$_POST['passe']);
					$message = "Vos données ont une sale gueule";
				}
			break;
			case "Retour connexion":
				formulaireConnexion();
			break;
			case "Recherche":
				header("location: http://www.google.fr");
			break;
			default:
				echo "<h2>Bouton inconnu</h2>";
		}
		if($connect){
			 echo "Vous êtes connecté";
			// header("location: http://localhost:8080/dynasite");
			exit;
		}else{
			echo $message;
		}
	}
}
function connecteUtilisateur($db, $pseudo, $passe){
	echo "<h2>connexion</h2>";

	$sql = "SELECT utilisateur_id, utilisateur_passe FROM utilisateur "
	      ."WHERE utilisateur_pseudo = :pseudo;";
	if($resultat = $db->prepare($sql)){
		if($resultat->execute(array(':pseudo' => $pseudo))){
			if ($utilisateur = $resultat->fetch()){
				if(password_verify($passe,$utilisateur['utilisateur_passe'])){
					echo "connexion acceptée pour ".$utilisateur['utilisateur_id'];
					setcookie("connexion", $utilisateur['utilisateur_id'], time()+60*5);

				    return true;
				}
			}
		} else {
			echo "info <pre>";
			var_dump($db->errorInfo());
			echo"</pre>";
			echo "code ".$db->errorCode();
		}
	} else {
		echo "info <pre>";
		var_dump($db->errorInfo());
		echo"</pre>";
		echo "code ".$db->errorCode();
	}
	echo "connexion refusée";
	return False;
}

function connecteUtilisateur2($db, $pseudo, $passe){
	echo "<h2>connexion</h2>";

	$sql = "SELECT utilisateur_id FROM utilisateur "
	      ."WHERE utilisateur_pseudo = :pseudo AND utilisateur_passe = :passe ;";
	if($resultat = $db->prepare($sql)){
		if($resultat->execute(array(':pseudo' => $pseudo, ':passe' => $passe))){
			if ($utilisateur = $resultat->fetch()){
					echo "connexion acceptée pour ".$utilisateur['utilisateur_id'];
					setcookie("connection", $utilisateur['utilisateur_id'], time()+60*5);

				    return true;
			}else{
				echo "connexion refusée";
			}
		} else {
			echo "info <pre>";
			var_dump($db->errorInfo());
			echo"</pre>";
			echo "code ".$db->errorCode();
		}
	} else {
		echo "info <pre>";
		var_dump($db->errorInfo());
		echo"</pre>";
		echo "code ".$db->errorCode();
	}
	return False;
}

function connecteUtilisateur1($db, $pseudo, $passe){
	echo "<h2>connexion</h2>";

//	$sql = "SELECT utilisateur_id FROM utilisateur WHERE utilisateur_pseudo = '$pseudo' AND utilisateur_passe = '$passe';";
	$sql = "SELECT utilisateur_id, utilisateur_passe FROM utilisateur WHERE utilisateur_pseudo = '$pseudo';";
	echo "<h3>$sql</h3>";
	if ($resultat = $db->query($sql)){
		if ($utilisateur = $resultat->fetch()){
			if ($utilisateur['utilisateur_passe'] == $passe){
				echo "connexion acceptée pour ".$utilisateur['utilisateur_id'];
			}else{
				echo "connexion refusée";
			}
		}else{
			echo "connexion refusée";
		}
	} else {
		echo "info <pre>";
		var_dump($db->errorInfo());
		echo"</pre>";
		echo "code ".$db->errorCode();
	}
}

function nouvelUtilisateur(){

	echo "<form method='post'>
	<input type='text' name='nom' placeholder='Votre nom'><br>
	<input type='text' name='prenom' placeholder='Votre prénom'><br>
	<input type='text' name='pseudo' placeholder='Votre pseudo'><br>
	<input type='email' name='email' placeholder='Votre email'><br>
	<input type='password' name='passe' placeholder='Votre mot de passe'><br>
	<input type='password' name='passe2' placeholder='Entrez de nouveau votre mot de passe'><br>
	<input type='submit' name='cmd' value='Enregistrer'>
	<input type='submit' name='cmd' value='Retour connexion'>
	<input type='submit' name='cmd' value='Recherche'>
	<input type='reset'  value='Tout effacer'><br>
	</form>";

}

function formulaireConnexion(){

	echo "<form method='post'>
	<input type='text' name='pseudo' placeholder='Votre identifiant'><br>
	<input type='password' name='passe' placeholder='Votre mot de passe'><br>
	<input type='submit' name='cmd' value='Connecter'>
	<input type='submit' name='cmd' value='Nouvel utilisateur'>
	<input type='submit' name='cmd' value='Recherche'>
	</form>";

}

function enregistreUtilisateur($db, $nom, $prenom, $email, $pseudo,$passe){

	if (empty($nom) OR empty($prenom) OR empty($email) OR empty($pseudo) OR empty($passe)){
		return False;
	}else{
		// est-ce que le pseudo existe ?
		$sql = "SELECT utilisateur_id FROM utilisateur WHERE utilisateur_pseudo = ':pseudo';";
		$resultat = $db->prepare($sql);
		$resultat->execute(array(':pseudo' => $pseudo));
		if($resultat->fetch()){
			// le pseudo existe
			echo "Le pseudo existe";
			return False;
		}
		// Ok, on crée le profil
		$sql = "INSERT INTO utilisateur "
		."(utilisateur_nom, utilisateur_prenom, utilisateur_email, utilisateur_pseudo, utilisateur_passe)"
		."VALUES(?,?,?,?,?)";
		$resultat = $db->prepare($sql);
		$hash = password_hash($passe,PASSWORD_DEFAULT);
		if ($resultat->execute(array($nom, $prenom, $email, $pseudo, $hash))){
			echo "<h2>Nouvel utilisateur enregistré</h2>";
			return True;
		}else{
			echo "info <pre>";
			var_dump($resultat->errorInfo());
				echo"</pre>";
				echo "code ".$resultat->errorCode();
			return False;
		}
	}
}

?>
