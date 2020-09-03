<?php

//namespace greta\fanzine ;

function __autoload($classe){
	echo "<br>Je charge la classe $classe";
	
	if ($pos = strpos($classe,'\\')){
		$classe = str_replace('\\',DIRECTORY_SEPARATOR,$classe);
		include $classe.".php";
	}else{
		include "class/class.$classe.php";
	}
}

//include('class/class.produit.php');
//include('greta/fanzine/produit.php');

use \greta\fanzine\produit as journal;

$mickey = new journal("Journal de Mickey", "Walt Disney", "Pour les petits et les grands","1928");

echo "<h3>Détails de l'instance</h3>";
echo $mickey;

$mickey = new produit("Journal de Mickey", "Walt Disney", "Pour les petits et les grands","1928");

echo "<h3>Détails de l'instance</h3>";
echo $mickey;


?>
