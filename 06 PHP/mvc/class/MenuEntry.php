<?php

/*
==============================================================================

 Ce script fait partie d'une série d'exemples de code mise à disposition
  sur https://github.com/marcyves/Developpeur-Web

 (c) 2019 Marc Augier

==============================================================================
*/

class MenuEntry {
	private $label;
	private $lien;
	private $statut;

	function __construct($label, $lien, $statut){
		$this->label  = $label;
		$this->lien   = $lien;
		$this->statut = $statut;
	}
	function __toString(){
		return "<a class='nav-link ".$this->statut."'  href='index-7.php?page=".$this->lien."'>".$this->label."</a>";
	}
}
echo "MenuEntry chargée";

?>
