<?php

include("debut.php");


$sql = "SELECT code, nom, description, photo FROM pizza ORDER BY nom";

$result = mysqli_query($link, $sql);

echo '<div class="container">
<div class="row">';

while(list($code, $nom, $desc , $fichier_photo) = mysqli_fetch_array($result)){
//    echo "<br>$code, $nom, $desc , $fichier_photo";
?>
<div class="col-sm">
<div class="card" style="width: 18rem;">
  <img src="img/<?php echo $fichier_photo; ?>" class="card-img-top" alt="<?php echo $nom; ?>">
  <div class="card-body">
    <h5 class="card-title"><?php echo $nom; ?></h5>
    <p class="card-text"><?php echo $desc; ?></p>
    <a href="detail.php?pizza=<?php echo $code; ?>" class="btn btn-primary">Plus d'infos</a>
  </div>
  </div>
</div>

<?php
}

echo '</div></div>';

include("fin.php");

?>