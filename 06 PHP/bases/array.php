<?php

/*
==============================================================================

 Ce script fait partie d'une série d'exemples de code mise à disposition
  sur https://github.com/marcyves/Developpeur-Web

 (c) 2019 Marc Augier

==============================================================================
*/

$tableau = array("Renault", "Peugeot", "BMW");

// print_r($tableau);
$longueur = count($tableau);

echo "<br>Il y a $longueur entrées dans le tableau";

echo "<ul>";
for($i=0;$i<$longueur;$i++){
	echo "<li>$i = ".$tableau[$i]."</li>";
	$tableau[$longueur+$i] = $tableau[$i];
	$tableau[10+$i] = $tableau[$i];
}
echo "</ul>";

$tableau[14]= "Hop";
echo "<br>le 14 ".$tableau[11];

$longueur = sizeof($tableau);
echo "<br>Il y a $longueur entrées dans le tableau";
echo "<ul>";
for($i=0;$i<15;$i++){
	echo "<li>$i = ".$tableau[$i]."</li>";
}
echo "</ul>";


$tableau[1] = "Volvo";

// print_r($tableau);

echo "<select>";
foreach($tableau as $id=>$entree){
	echo "<option value='$id'>$entree</option>";
}
echo "</select>";

$dic =array("jaune"=>"poussin", "rouge"=>"tomate", "vert"=>"sapin");

foreach($dic as $couleur => $objet){
	echo "<br>Un(e) $objet est $couleur";
}

echo "<br>".$dic['jaune'];


?>
