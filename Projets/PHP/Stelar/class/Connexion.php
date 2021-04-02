<?php

class Connexion extends Page{
	
	function __construct(){
		parent::__construct(__CLASS__);
		
		if ($this->utilisateur->estConnecté()){
			$variables = array(
			"c1-titre" => "Bienvenue", 
			"c1-contenu" => "Vous pouvez naviguer sur le site"
			);			
		}else{
			$variables = array(
			"c1-titre" => "Connectez-vous", 
			"c1-contenu" => Utilisateur::formulaireConnexion()
			);
		}
		
		$this->contenu_page = Page::coderTemplate($this->contenu_page,$variables);
	}
}
?>