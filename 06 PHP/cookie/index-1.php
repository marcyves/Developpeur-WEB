<?php
/*
==============================================================================

 Ce script fait partie d'une série d'exemples de code mise à disposition
  sur https://github.com/marcyves/Developpeur-Web

 (c) 2019 Marc Augier

==============================================================================
*/

// Gestion du nombre d'affichages de la page
if(isset($_COOKIE['compteur'])){
	$visite = $_COOKIE['compteur'] + 1;
} else {
	$visite = 1;
}

setcookie('compteur',$visite, time()+3600*24*365);

// Gestion de l'utilisateur
$form1 = "<form method='post'>
		<input type='text' name='nom' placeholder='Votre nom?'>
		<input type='submit' value='Se connecter'>
		</form>";
$form2 = "<form method='post'>
		<input type='submit' name='cmd' value='Se déconnecter'>
		</form>";

if(isset($_COOKIE["utilisateur"])){
	$registered_user = $_COOKIE['utilisateur'];
	if(isset($_POST['cmd'])){
		setcookie("utilisateur", "", time()-3600);   // Efface le cookie
		echo "<p>Au revoir $registered_user</p>";
		echo $form1;
	}else{
		setcookie("utilisateur", $registered_user, time()+ 3600); // Relance le cookie pour 1h
		echo "Bonjour $registered_user, merci d'être revenu";
		echo $form2;
	}
} else {
	if(isset($_POST['nom'])){
		$registered_user = $_POST['nom'];
		// il faudrait ici tester le mot de passe s'il y en avait un
		setcookie("utilisateur", $registered_user, time()+ 3600); // Crée le cookie
		echo "Bonjour $registered_user, bienvenue chez vous";
		echo $form2;
	} else {
		echo $form1;
	}
}


echo "<h2>J'ai créé 2 cookies</h2>";
echo "<p>Vous êtes déjà venue $visite fois</p>";


echo '<a href="voir.php">voir</a>';


?>
