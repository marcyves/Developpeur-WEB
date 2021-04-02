<?php

class Utilisateur
{
	private $identifiant  = 0;
	private $utilisateur  = "";
	private $nom          = "";
	private $prenom       = "";
	private $est_connecté = False;
	
	function __construct(){
		// vérifie avec cookie si util déjà connecté 
		
		if(!empty($_COOKIE['connexion'])){
			$id = $_COOKIE['connexion'];
			setcookie("connexion",$id,time()+60*10);

			$sql = "SELECT utilisateur_pseudo, utilisateur_prenom, utilisateur_nom "
			."FROM utilisateur WHERE utilisateur_id = :id;";
			$resultat = $db->prepare($sql);
			$resultat->execute(array(':id' => $id));
			$utilisateur = $resultat->fetch();
			
			$this->identifiant  = $id;
			$this->utilisateur  = $utilisateur['utilisateur_pseudo'];
			$this->nom          = $utilisateur['utilisateur_nom'];
			$this->prenom       = $utilisateur['utilisateur_prenom'];
			$this->est_connecté = True;
		}
	}
	
	function estConnecté(){
		return  $this->est_connecté;
	}
	
	function getNomComplet(){
		return $this->$prenom." ".$this->nom;
	}
	
	function verifMotDePasse($utilisateur, $mot_de_passe){
		return False;
	}
	
	function setNom($nom){
		//requête SQL
		$sql = "UPDATE utilisateur SET utilisateur_nom = ? WHERE utilisateur_id = ?"; 

		$this->nom = $nom;
	}
	
	static function formulaireConnexion(){

		return "<form method='post'>
		<input type='text' name='pseudo' placeholder='Votre identifiant'><br>
		<input type='password' name='passe' placeholder='Votre mot de passe'><br>
		<input type='submit' name='cmd' value='Connecter'>
		<input type='submit' name='cmd' value='Nouvel utilisateur'>
		<input type='submit' name='cmd' value='Recherche'>
		</form>";
	}
}