<?php

include("debut.php");

echo "<h1>Gestion de l'affichage des pizzas</h1>";

if(isset($_GET['nom']) && isset($_GET['motdepasse'])){
    // vérifier utilisateur et mot de passe
    $nom = $_GET['nom'];
    $motdepasse = $_GET['motdepasse'];

    $sql = "SELECT id, motdepasse FROM utilisateurs WHERE nom = '$nom'";
    $result = mysqli_query($link,$sql);

    if (mysqli_num_rows($result) > 0){
        list($id, $motdepasse_reel) = mysqli_fetch_row($result);
        if ($motdepasse == $motdepasse_reel){
            setcookie('user_id',$id,time()+10*60);
            setcookie('user_name',$nom, time()+600);
            echo "Bravo $nom, vous êtes connecté !";    
        }else{
            echo "Utilisateur ou mot de passe invalide";
        }
    }else{
        echo "Vous n'êtes pas le bienvenu ici $nom";
    }
} else {
    if(isset($_COOKIE['user_id'])){
        $id = $_COOKIE['user_id'];
        $nom = $_COOKIE['user_name'];
        echo "Content de vous revoir $nom";
        // Remettre à zero le timeout
        setcookie('user_id',$id,time()+10*60);
        setcookie('user_name',$nom, time()+600);
    }else{
        // L'utilisateur n'est pas authentifié
        echo "<h2>Vous devez vous identifier pour continuer</h2>";
        ?>
        <form method="get">
        <input type="text" name="nom" placeholder="Nom"><br>
        <input type="password" name="motdepasse" placeholder="Mot de passe">
        <input type="submit" value="Se connecter">
        </form>
        <?php    
    }
}

include("fin.php");

?>