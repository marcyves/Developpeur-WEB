<?php
/*
    Jeu de Morpion
    ==============

    (c) 2019 - Antibes

*/
include("mes_fonctions.php");
include("entete.html");

//print_r($_GET);

if(isset($_GET['nom'])){
    echo "<p class='alert alert-info'>Bonjour ".$_GET['nom'].
        ", tu as choisi de jouer avec les pions ".$_GET['pion']."</p>";
    
    if (isset($_COOKIE['jeu_morpion'])){
        // Le jeu a commencé, on lit le tableau dans le cookie
        $tableau = unserialize($_COOKIE['jeu_morpion']);
    } else {
        // Initialisation du tableau de jeu
        for($i=0; $i<3; $i++){
            for($j=0; $j<3; $j++){
                $tableau[$i][$j] = "_";
            }
        }
        setcookie('jeu_morpion', serialize($tableau), time()+3600*24*365);
    }

    $game_over = False;

    if(isset($_GET['ici'])){
        // Le joueur a cliqué le bouton 'ici'
        $bouton = $_GET['ici'];

        $i = intdiv($bouton, 3);
        $j = $bouton % 3;

        $pion_joueur = $_GET['pion'];
        $tableau[$i][$j] = $pion_joueur;

        // Teste si le joueur a gagné
        if (testeJeuGagnant($tableau, $pion_joueur)){
            echo '<div class="alert alert-success" role="alert">
                  Bravo, vous avez gagné !
                  <img src="AnguishedDisfiguredGannet.mp4" width="300">
                  </div>';
            $game_over = True;
        } else {
            // C'est le tour de l'ordinateur
            $pion_ordi = changePion($pion_joueur);
            $tableau = jeuOrdi($tableau, $pion_ordi);

            // Teste si l'ordi a gagné
            if (testeJeuGagnant($tableau, $pion_ordi)){
                echo '<div class="alert alert-danger" role="alert">'.
                "Hourra ^_^ ! J'ai gagné pauvre humain".
                '</div>';
                $game_over = True;
            }
        }
        // Sauve l'état du jeu
        setcookie('jeu_morpion', serialize($tableau), time()+3600*24*365);
    }
?>
<div class="container">
<?php

// Affichage du tableau
echo "\n".'<form method=\'get\'>';
echo '<input type="hidden" name="nom" value="'.$_GET['nom'].'">';
echo '<input type="hidden" name="pion" value="'.$_GET['pion'].'">';

for($i=0; $i<3; $i++){
  echo '<div class="row">';
  for($j=0; $j<3; $j++){

    if($tableau[$i][$j] == "_" and !$game_over){
        $val = 3*$i+$j;
        $tmp = "<input type='submit' name='ici' value='$val'>";
    } else {
        $tmp = $tableau[$i][$j];
    }
    echo '<div class="col-sm">'.$tmp.'</div>';
  }
  echo '</div>';
}
echo '</form><a href="index.php">Se déconnecter</a>';

} else {
    setcookie('jeu_morpion', "", time()-3600*24*365);
    include("formulaire.html");
}

?>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>