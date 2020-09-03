<?php 
/*
==============================================================================

 Ce script fait partie d'une série d'exemples de code mise à disposition
  sur https://github.com/marcyves/Developpeur-Web

 (c) 2019 Marc Augier

==============================================================================
*/
namespace greta;

class musique extends produit  {
	
	private $_duree = 0;
	
	function __construct($nom, $auteur, $description, $annee, $duree){
		$this->nom    = $nom;
		$this->_auteur = $auteur;
		$this->_description = $description;
		$this->_annee = $annee;		
		$this->_duree = $duree;	
		echo "<h3>Je suis ".__CLASS__."</h3>";
	}	
	
	function setDuree($duree){
		$this->_duree = $duree;
	}
	
	function getDuree($duree){
		return $this->_duree;
	}

}

?>