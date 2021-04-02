<?php

class Page
{
	private $titre_page = "";
	private $sous_titre_page = "";
	protected $contenu_page = "";
	private $type_page = 0;
	protected $utilisateur;
	
	function __construct($nom){

		$this->utilisateur = new Utilisateur();

		$parm_page = json_decode(file_get_contents("pages/$nom.json"),TRUE);
		
		$this->titre_page      = $parm_page['titre_page'];
		$this->sous_titre_page = $parm_page['sous_titre_page'];
		$this->type_page       = $parm_page['type_page'];
		
		// Préparation du menu
		//		$menu    = file_get_contents("template/menu.html");
		$menu = new Menu($nom);
		// Préparation du contenu
		$contenu = file_get_contents("template/contenu".$this->type_page.".html");
		$pied    = file_get_contents("template/pied.html");
		
		$this->contenu_page = $menu . $contenu . $pied;
	}

	static function coderTemplate($template, $variables){
	
		foreach($variables as $clef => $valeur){
			$template = str_replace("{{ $clef }}", $valeur, $template);
		}

	return $template;
}

	function __toString(){
		$template = file_get_contents("template/general.html");
		
		$variables = array("titre-page" => $this->titre_page,
						   "sous-titre-page" => $this->sous_titre_page,
						   "contenu-page" => $this->contenu_page);

		return Self::coderTemplate($template, $variables);
	}
}

?>