<?php

include('debut.php');

print_r($_GET);

/*

    Affichage de la pizza

*/
$code = $_GET['pizza'];

$sql = "SELECT nom, description, photo FROM pizza WHERE code = $code";

if($result = mysqli_query($link, $sql)){
    list($nom, $desc, $fichier) = mysqli_fetch_array($result);
    echo "<h2>$nom</h2><p><img src='img/$fichier' width='500'>$desc</p>";    
} else {
    echo "<p>Nous sommes désolés, mais la pizza que vous cherchez n'existe pas.</p>";
}
/*

    Affichage des commentaires

*/
$sql = "SELECT nom, texte FROM commentaire WHERE id_pizza = $code";

if($result = mysqli_query($link, $sql)){
    while(list($nom, $texte) = mysqli_fetch_array($result)){
        echo "<p><strong>$nom</strong> a écrit : $texte";
    }
    //    echo "<p>Pas de commentaire</p>";
}

?>
<form action="detail.php" method="get">
<div class="row">
    <div class="col">
      <input type="text" name="nom" class="form-control" placeholder="Votre nom">
    </div>
    <div class="col">
    <input type="text" name="commentaire" class="form-control" placeholder="Votre commentaire">
    <input type="hidden" name="pizza" value="<?php echo $code; ?>">
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Poster</button>
</form>
<?php

echo '<a href="index.php" class="btn btn-primary">Retour</a>';

include('fin.php');
?>