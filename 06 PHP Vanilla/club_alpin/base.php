<?php
// Les commandes PHP de base

$nombre = 1;

echo "<br>La valeur est $nombre";
echo '<br>La valeur est $nombre';
echo '<br>La valeur est '.$nombre;

echo "<br>L'autre exemple";
echo '<br>L\'autre exemple';

$prenom = "Marc";
$nom    = "Augier";
echo "<br>Je m'appelle $prenom $nom";

$nom_complet = $prenom." ".$nom;
echo "<br>
Je m'appelle $nom_complet";

$a = 5;
$b = 10;
$c = $a + $b;
$d = $a * $b;
$e = $c/$b;
$f = $c%$b;
echo "\n<br>a = $a, b = $b, c = $c, d = $d, e = $e, f = $f";

echo "<h3>Test de nombres pairs</h2>";

est_pair(5);
est_pair(8);

if (est_impair(5)){
  echo "<br>La valeur est impaire";
} else {
  echo "<br>La valeur est paire";
}

/*

  Exemples de fonctions

*/
function est_impair($n){
  if ($n%2 == 0){
    return false;
  } else {
    return true;
  }
}

function est_pair($n){
  if ($n%2 == 0){
    echo "$n est pair<br>";
  } else {
    echo "$n est impair<br>";
  }
}

/*

 Les structures de controle

 */

echo "<h2>Boucles FOR</h2>";

echo "<ul>";
for($i = 0; $i<10 ; $i++){
  echo "<li>i = $i</li>";
}
echo "</ul>";

echo "<ul>";
for($i = 10; $i<100 ; $i = $i + 10){
  echo "<li>i = $i</li>";
}
echo "</ul>";

// Boucle infinie
/*
$j = 9;
for($i=0;$j<10;$i++){
  echo $i;
}
*/

$i = 0;
echo "<ul>";
while($i<30){
  echo "<li>i = $i</li>";
  if ($i<10){
    $i++;
  } else {
    $i = $i + 5;
  }
}
echo "</ul>";

$i = 0;
echo "<ul>";
do{
  echo "<li>i = $i</li>";
  if ($i<10){
    $i++;
  } else {
    $i = $i + 5;
  }
}while($i<0);

echo "</ul>";















?>
