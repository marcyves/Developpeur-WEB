<?php
/*
==============================================================================

 Ce script fait partie d'une série d'exemples de code mise à disposition
  sur https://github.com/marcyves/Developpeur-Web

 (c) 2019 Marc Augier

==============================================================================
*/

class maPage {
	
	private $titre ="";

/*	
	function __construct($t){
		$this->titre = $t;	
	}
	*/
	function setTitre($t){
			$this->titre = $t;
	}
	
	function entete(){

	echo '<html>
<head>
	<meta charset="utf-8">
	<title>La Boutique du Greta</title>
</head>
<body>
	<header>
	<h1>'.$this->titre.'</h1>
	</header>
	<nav>	
	<a href="livre.php">Les livres</a> | 
	<a href="disque.php">Les disques</a> | 
	<a href="panier.php">Le panier</a>
	</nav>
	<main>';
		session_start(); 
	}

	function pied(){
		echo '</main><footer>';
		echo session_name()." = ".session_id();
		echo '</footer></body></html>';
	}
}

?>