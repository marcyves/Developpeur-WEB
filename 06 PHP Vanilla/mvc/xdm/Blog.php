<?php
/*
==============================================================================

 Ce script fait partie d'une série d'exemples de code mise à disposition
  sur https://github.com/marcyves/Developpeur-Web

 (c) 2019 Marc Augier

==============================================================================
*/

namespace xdm;

Class Blog extends Page{

	private $chapeau;
	private $menu;
	private $article;

	function __construct($titre, $page, $texte){
		Page::__construct($titre);

		$menuJSON = file_get_contents("config/menu.json");
		$entrees_menu = json_decode($menuJSON, TRUE);

		foreach($entrees_menu as $label => $lien){
			$ce_menu[] = new MenuEntry($label, $lien ,($page==$lien)?"active":"");
		}

		$this->setMenu($ce_menu);
		$this->setChapeau($texte);
	}

	function setChapeau($texte){
		$this->chapeau = "<h1>$texte</h1>";
	}

	function setMenu($menuTable){
		$this->menu = '<div class="alert alert-primary" role="alert">
		<nav class="nav nav-pills nav-fill">';
		foreach($menuTable as $entreeMenu){
			$this->menu .= $entreeMenu;
		}
		$this->menu .= "</nav></div>";
	}

	function setArticle($titre, $contenu, $auteur, $date){
		$this->article = '<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h2 class="display-4">'.$titre.'</h2>
    <p class="lead">'.$contenu.'<br><small>'.$auteur.' a écrit cet article le '.$date.'</small></p>
  </div>
</div>';
	}

	function preparePage(){
		$this->setBody($this->chapeau.$this->menu.$this->article);
	}

}
echo "chargé";
?>
