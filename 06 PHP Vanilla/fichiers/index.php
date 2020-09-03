<?php

echo "<h1>Les fichiers avec PHP</h1>";
$fichier = "test.txt";

/* 
 On ouvre le fichier avec le mode w+
 pour permettre les lectures et les écritures
 la variable $fi va contenir un pointeur pour 
 faire référence à ce fichier dans les instructions suivantes
 */
$fi = fopen($fichier,"w+");  

echo "Je viens d'ouvrir le fichier $fichier<br>";

// boucle d'écriture dans le fichier 
for($i=0;$i<10;$i++){
	$texte = "Ceci est la ligne $i d'un autre texte\n";

	if (fputs($fi,$texte)){
		echo "J'ai écrit dans le fichier<br>";
	}else{
		echo "erreur écriture<br>";
	}
}

echo "<h2>Première méthode</h2>";
fseek($fi,0);
while(!feof($fi)){
	if($lecture = fgets($fi)){
		echo "<br>j'ai trouvé $lecture dans le fichier";
	}
}

echo "<h2>Deuxième méthode</h2>";
fseek($fi,0);
while($lecture = fgets($fi)){
	echo "<br>j'ai trouvé $lecture dans le fichier";
}

echo "<h2>Troisième méthode</h2>";
rewind($fi);
$lecture = fread($fi,filesize($fichier));
echo "<pre>$lecture</pre>";

// On a terminé, on ferme le fichier
fclose($fi);

echo "<h2>Quatrième méthode après fermeture</h2>";
$lignes = file($fichier);

// Affiche toutes les lignes du tableau comme code HTML, avec les numéros de ligne
foreach ($lignes as $ligne_num => $ligne) {
    echo "Ligne #<b>$ligne_num</b> : $ligne<br>";
}
?>