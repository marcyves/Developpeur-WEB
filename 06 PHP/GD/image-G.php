<?php
header("Content-type: image/jpeg");
$image = imagecreatefrompng("auron-dome.PNG");
$bleu = imagecolorallocate($image,200,100,255);
imagestring($image, 5,600,300,"Vive l'hiver",$bleu);
imagepng($image);
?>