<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>La Pizza Antiboise</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
<header class="justify-content-md-center">
<h1>La Pizza Antiboise</h1>
Votre pizzeria au coeur de l'ancienne Antipolis
</header>

<?php
$link = mysqli_connect("localhost", "pizza", "superpizza", "pizza");

if (!$link) {
    echo "Erreur : Impossible de se connecter à MySQL." . PHP_EOL;
    echo "Errno de débogage : " . mysqli_connect_errno() . PHP_EOL;
    echo "Erreur de débogage : " . mysqli_connect_error() . PHP_EOL;
    exit;
}

// Change character set to utf8
mysqli_set_charset($link,"utf8");

/*
    Messages de mise au point
    -------------------------
echo "Succès : Une connexion correcte à MySQL a été faite! La base de donnée my_db est génial." . PHP_EOL;
echo "Information d'hôte : " . mysqli_get_host_info($link) . PHP_EOL;
*/
?>