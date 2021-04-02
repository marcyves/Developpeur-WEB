<?php

class index extends Page{
	
	function __construct(){
		parent::__construct(__CLASS__);
		
		$variables = array(
		"c2-titre" => "Bienvenue", 
		
		"c2-icon-1" => "fa-diamond",
		"c2-sous-titre-1" => "Des figues",
		"c2-contenu-1" => "pour les vitamines",
		
		"c2-icon-2" => "fa-address-book",
		"c2-sous-titre-2" => "Des bananes",
		"c2-contenu-2" => "pour l'endurance",
		
		"c2-icon-3" => "fa-apple",
		"c2-sous-titre-3" => "Des noix",
		"c2-contenu-3" => "pour les omega 3",
		
		"c2-label" => "Greta",
		"c2-lien" => "htt://www.greta.fr"
		);
		
		$this->contenu_page = Page::coderTemplate($this->contenu_page,$variables);
	}
}
?>