<?php
/*
==============================================================================

 Ce script fait partie d'une série d'exemples de code mise à disposition
  sur https://github.com/marcyves/Developpeur-Web

 (c) 2019 Marc Augier

==============================================================================
*/

class produit {

	public $nom = "";
	protected $_auteur = "";
	protected $_description = "";
	protected $_annee = "";
	
	function __construct($nom, $auteur, $description, $annee){
		$this->nom    = $nom;
		$this->_auteur = $auteur;
		$this->_description = $description;
		$this->_annee = $annee;
		echo "<h3>Je suis ".__CLASS__."</h3>";
	}
	
	
	function __destruct(){
		echo "<h1>Au revoir ".$this->nom."</h1>"; 
	}
	
	function __toString(){
		return "<br>Je suis le ".$this->nom." de ".$this->_auteur;
	}  
	
	function __set($propriete, $valeur){
			echo "<h2>Accès interdit à $propriete pour $valeur</h2>";
	}

	function __get($propriete){
			echo "<h2>Accès interdit à $propriete</h2>";
	}
	
	function getAuteur(){
		return $this->_auteur;
	}
	
	function setAuteur($auteur){
		$this->_auteur = $auteur;
	}
}

?>