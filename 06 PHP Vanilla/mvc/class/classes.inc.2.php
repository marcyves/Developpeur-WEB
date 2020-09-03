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

Class Blog extends Page{
	
	private $chapeau;
	private $menu;
	private $article;
	
	function setChapeau($texte){
		$this->chapeau = "<h1>$texte</h1>";
	}
	
	
	function setMenu($liens){
		$this->menu = '<div class="alert alert-primary" role="alert"><nav class="nav">';
		
		foreach($liens as $label => $lien){
			$this->menu .= "<a  class='nav-link'  href='$lien'>$label</a>";
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

?>