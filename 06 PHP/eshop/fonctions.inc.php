<?php
/*
==============================================================================

 Ce script fait partie d'une série d'exemples de code mise à disposition
  sur https://github.com/marcyves/Developpeur-Web

 (c) 2019 Marc Augier

==============================================================================
*/

function afficheFormulaire($l){
	
	echo "<form method='post'>";
	foreach($l as $titre => $code){
		echo "<input type='radio' name='item' value=$code> $titre<br>";
	}
	echo "<input type='submit' value='acheter'></form>";
}

function enregistreProduitPanier($type){
	
	$compteur = $_SESSION['compteur'] + 1;
	$panier   = $_SESSION['panier'];
	
	$panier[$compteur] = array($_POST['item'] => $type);
	
	$_SESSION['compteur'] = $compteur;
	$_SESSION['panier']   = $panier;

	echo "<p>Vous avez ajouté le $type ".$_POST['item']." dans votre panier";
}

function entete($t){

	echo '<html>
<head>
	<meta charset="utf-8">
	<title>La Boutique du Greta</title>
</head>
<body>
	<header>
	<h1>'.$t.'</h1>
	</header>
	<nav>	
	<a href="livre.php">Les livres</a> | 
	<a href="disque.php">Les disques</a> | 
	<a href="panier.php">Le panier</a>
	</nav>
	<main>';
	session_start();
	
	if(empty($_SESSION)){
		$_SESSION['compteur'] = 0;
		$_SESSION['panier']   = array();
	}
}

function pied(){
		echo '</main><footer>';
		echo session_name()." = ".session_id();
		echo '</footer></body></html>';
}


?>