<?php

class Menu
{
	private $menuEntry = "";
	
	function __construct($nom){
		// lecture des entrées de menu d'après dossier page

		$dossier = opendir("pages");
		while($fichier = readdir($dossier)){
			if($fichier[0] != "."){
				$parm_page = json_decode(file_get_contents("pages/".$fichier));
				$page = substr($fichier, 0, -5);
				$label = $parm_page->label;
				$position = $parm_page->position;
				$tab_lien[$position] = "<li><a href='index.php?page=$page'>$label</a>";
			}
		}
		ksort($tab_lien);
		foreach($tab_lien as $lien){
			$this->menuEntry .= $lien;
		}
	}
	
	function __toString(){
		$menu    = file_get_contents("template/menu.html"); // lecture du template
		// appliquer ceci à la template
		return Page::coderTemplate($menu, array("contenu-menu"=>$this->menuEntry));
		
	}
	
}		
?>