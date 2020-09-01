<?php
/*
==============================================================================

 Ce script fait partie d'une série d'exemples de code mise à disposition
  sur https://github.com/marcyves/Developpeur-Web

 (c) 2019 Marc Augier

==============================================================================
*/

echo "<h1>Passwords</h1>";

$mdp = "topsecret";

$hash = password_hash($mdp,PASSWORD_DEFAULT);

echo $hash;
echo "<br>";

if(password_verify($mdp,$hash)){
	echo "Le mot de passe est valide";
}else{
	echo "Mot de passe invalide";
}

echo "<br><pre>";
print_r( password_get_info( $hash ) );
echo "</pre>";

echo "<br>";
if(password_needs_rehash($hash, PASSWORD_DEFAULT,array('cost' => 10))){
	echo "le hash doit etre revu";
}else{
	echo "le hash est ok";
}

echo "<br>";
if(password_needs_rehash($hash, PASSWORD_DEFAULT,array('cost' => 11))){
	echo "le hash doit etre revu";
}else{
	echo "le hash est ok";
}

?>
