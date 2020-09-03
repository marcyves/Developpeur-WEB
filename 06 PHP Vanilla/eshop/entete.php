<?php
/*
==============================================================================

 Ce script fait partie d'une série d'exemples de code mise à disposition
  sur https://github.com/marcyves/Developpeur-Web

 (c) 2019 Marc Augier

==============================================================================
*/
?>
<html>
<head>
	<meta charset="utf-8">
	<title>La Boutique du Greta</title>
</head>
<body>
	<header>
	<h1>Le e-Shop en ligne sur le Web</h1>
	</header>
	<nav>	
	<a href="livre.php">Les livres</a> | 
	<a href="disque.php">Les disques</a> | 
	<a href="panier.php">Le panier</a>
	</nav>
	<main>
<?php
 session_start();

?>
