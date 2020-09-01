<?php

$mdp = "topsecret";

$hash = password_hash($mdp,PASSWORD_DEFAULT);

echo $hash;
echo "<br>";

if(password_verify($mdp,$hash)){
	echo "password ok";
}else{
	echo "password kaput";
}

echo "<br><pre>";
print_r( password_get_info( $hash ) );
echo "</pre>";

if(password_needs_rehash($hash, PASSWORD_DEFAULT,array('cost' => 11))){
	echo "le hash doit etre revu";
}else{
	echo "le hash est ok";
}

?>