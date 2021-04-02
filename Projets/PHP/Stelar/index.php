<?php

function __autoload($classe){
	 //	echo "<br>Je charge la classe $classe";
	
	if ($pos = strpos($classe,'\\')){
		$classe = str_replace('\\',DIRECTORY_SEPARATOR,$classe);
		include $classe.".php";
	}else{
		include "class/$classe.php";
	}
}

// Connexion à la base de données
$db_host = "localhost:3406";
$db_user = "fanzine";
$db_pass = "top_secret";
$db_name = "fanzine";

try{
	$db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
}catch (PDOException $e){
	echo 'Échec lors de la connexion : ' . $e->getMessage();
	$db = False;
}

if(empty($_GET['page'])){
	$page = "index";
}else{
	$page = $_GET['page'];
}

$ma_page = new $page();

$autre_page = new $page();

echo $ma_page;

?>