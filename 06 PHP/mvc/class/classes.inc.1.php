<?php
/*
==============================================================================

 Ce script fait partie d'une série d'exemples de code mise à disposition
  sur https://github.com/marcyves/Developpeur-Web

 (c) 2019 Marc Augier

==============================================================================
*/

class Page{
	private $entete;
	private $body;
	private $pied;

/*
	Méthodes magiques de PHP
*/	
	function __construct($titre){
		$this->entete = "<html>
		<head>
		<title>$titre</title>
		<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css' integrity='sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS' crossorigin='anonymous'>
		</head>";
		$this->pied ="<footer>&copy; Marc</footer>
		</body></html>";
	}
	
	function __toString(){
		if(empty($this->body)){
			return $this->entete."Site en construction".$this->pied;
		}else{
			return $this->entete.$this->body.$this->pied;
		}
	}
/*
	Nos méthodes
*/

	function setBody($contenu){
		$this->body = $contenu;
	}
	
}

?>