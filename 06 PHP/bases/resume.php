<?php
/*
==============================================================================

 Ce script fait partie d'une série d'exemples de code mise à disposition
  sur https://github.com/marcyves/Developpeur-Web

 (c) 2019 Marc Augier

==============================================================================
*/

// le commentaire en 1 ligne

/*

Le commentaire en plusieurs lignes

*/

// une variable numérique
$valeur = 100;

// Les chaines de caractères
$texte = "<br>Comme ceci $valeur";
echo $texte;
echo "<br>";
// Retour à la ligne dans le code HTML généré
echo "\nje pars d'une nouvelle ligne<br>";
// Tabulation
echo "\n\tavec tabulation<br>";
echo "\n\t\t\t\t\tavec plusieurs tabulations<br>";

// Une autre façon qui ne lit pas la variable
echo '<br>comme cela $valeur';

echo '<br>comme cela '.$valeur.' les chaines sont collées les unes aux autres';

// Une fonction
function exemple($param) {
	echo "<h2>j'ai reçu $param</h2>";
}

function mon_titre($texte){
echo "<h3 style='color:blue;'>$texte</h3>";
}
// Appel en passant une variable
exemple($texte);
echo "<br>";
// Appel avec le texte directement
exemple("Un texte en direct en paramètre");

// Les paramètres reçus du navigateur

// Affiche le dictionnaire $_GET
mon_titre('Affiche le dictionnaire $_GET');
print_r($_GET);

// Affiche la valeur de tata dans $_GET
mon_titre(' Affiche la valeur de tata dans $_GET');
echo $_GET['tata'];

// Affiche la valeur de boum qui n'existe pas
mon_titre(' Affiche la valeur de boum qui n\'existe pas dans $_GET');
echo $_GET['boum'];

echo "<br><a href='summary.php?toto=1&tata=hector'>cliquez ici</a>";

// Inclure une librairie
include("math.php");
$la = 20;
$lo = 50;
mon_titre('La fonction retourne une valeur');
echo "<br><b>L'aire du rectangle de largeur $la et longeur $lo vaut ".aireRectangle($la, $lo)."</b>";

$aire_calcul = aireRectangle($la, $lo);

mon_titre('La fonction écrit le message');
aireTriangle(10,30);

mon_titre('');

// Include un fragment HTML
include('demo.html');

// Essai d'appel récursif
mon_titre('Calcul de factorielle');

function factorielle($n) {
	if ($n < 1) {
		echo "erreur";
		$result = 0;
	} else {
		if ($n == 1) {
			$result = 1;
		} else {
			$result = $n * factorielle($n - 1);
		}
	}
	return $result;
}

echo factorielle(5);

// Avec un formulaire
echo "<p><form method='post'>
Valeur: <input type='text' name='n'>
<input type='submit' value='Ok'>
</form>";
if (isset($_POST['n'])) {
	mon_titre("Factorielle de ".$_POST['n']);
	echo factorielle($_POST['n']);
}

?>
