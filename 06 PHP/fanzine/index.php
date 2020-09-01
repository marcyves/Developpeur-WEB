<?php
include('template/entete.php');

if(isset($_GET['nom'])){
	echo "<h2>Bienvenue ".$_GET['prenom']." ".$_GET['nom']."</h2>";
} else {
?>
<form>
Civilité : <input type="radio" name="civilite" value="Madame"> Madame 
           <input type="radio" name="civilite" value="Monsieur"> Monsieur<br>
Nom : <input type="text"  name="nom">
Prénom : <input type="text" name="prenom">
Pseudo : <input type="text" required name="pseudo">
Email : <input type="text" required name="email">
Password : <input type="password" required name="password">
<input type="submit" value="Ok">
<input type="reset"  value="Abandonner">
</form>
<?php
}

include('template/pied.php');
?>