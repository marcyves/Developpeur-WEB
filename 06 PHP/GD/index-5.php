<html>
   <body>
      <form method="POST" enctype="multipart/form-data">
         <input type="file" name="image" />
         <input type="submit"/>
      </form>
   </body>
</html>
<?php
/*
==============================================================================

<<<<<<< HEAD
if(isset($_FILES)){
	echo "<pre>";
	var_dump($_FILES);
	echo "</pre>";

	$nom         = $_FILES['image']['name'];
	$fichier_tmp = $_FILES['image']['tmp_name'];
	$type        = $_FILES['image']['type'];

	switch($type){
	case "image/jpeg":
		move_uploaded_file($fichier_tmp, 'depart/'.$nom);

		redimmensionne($nom, "jpg");
	break;
	case "image/png":
		move_uploaded_file($fichier_tmp, 'depart/'.$nom);

		redimmensionne($nom, "png");
	break;
	default:
		echo "type de fichier invalide";
	}
}

//$photo = "cervin.jpg";

function redimmensionne($photo, $type){
	echo "<h3>photo de départ</h3><img src='depart/$photo'>";

	switch ($type){
	case "jpeg":
		$source = imagecreatefromjpeg("depart/".$photo);
	break;
	case "png":
		$source = imagecreatefrompng("depart/".$photo);
	break;
	}
	$l = imagesx($source);
	$h = imagesy($source);

	echo "<br>Les dimensions de départ sont : $l, $h";

	$ratio = 4;
	$ld = $l/$ratio;
	$hd = $h/$ratio;
	$destination = imagecreatetruecolor($ld, $hd);
	imagecopyresampled($destination, $source,0,0,0,0,$ld, $hd, $l, $h);
	imagejpeg($destination,"arrivee/mini_".$photo);

	echo "<h3>photo produite</h3><img src='arrivee/mini_$photo'>";
}
?>
=======
 Ce script fait partie d'une série d'exemples de code mise à disposition
  sur https://github.com/marcyves/Developpeur-Web

 (c) 2019 Marc Augier

==============================================================================
*/
$photo = "cervin.jpg";
echo "<h3>photo de départ</h3><img src='depart/$photo'>";
$source = imagecreatefromjpeg("depart/".$photo);
$l = imagesx($source);
$h = imagesy($source);
echo "<br>Les dimensions de départ sont : $l, $h";
$ratio = 4;
$ld = $l/$ratio;
$hd = $h/$ratio;
$destination = imagecreatetruecolor($ld, $hd);
imagecopyresampled($destination, $source,0,0,0,0,$ld, $hd, $l, $h);
imagejpeg($destination,"arrivee/mini_".$photo);
echo "<h3>photo produite</h3><img src='arrivee/mini_$photo'>";
?>
>>>>>>> b3deffe92baae85a5962219a0541e4b5be34e46d
