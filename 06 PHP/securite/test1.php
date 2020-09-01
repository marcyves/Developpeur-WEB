<form method="post">
<input type="text" name="prenom">
<input type="submit" value="Ok">
</form>
<?php

echo "<h1>Voici</h1>";

$l = "prenom";
$t = joliNom($l);
echo '<br>$l = '.$l;

if ($t != ""){
    echo "<br>Résultat $t";
}

// quelques exemples de code à éviter

function joliNom1(&$label)
// le paramètre est passé par référence : attention aux effets de bord
{
    if (isset($_POST[$label])){
        $label = htmlspecialchars($_POST[$label]);
        // maintenant label n'est plus label
        echo '<br>$label = '.$label;
        return ucfirst(strtolower($label));
    }
}

function joliNom2()
// la fonction dépends d'une variable globale, pas clair dans le programme appelant
{
    if (isset($_POST['prenom'])){
        $t = htmlspecialchars($_POST['prenom']);
        return ucfirst(strtolower($t));
    }
}

function joliNom3($label)
// le paramètre est passé par référence : attention aux effets de bord
{
    if (isset($_POST[$label])){
        $t = htmlspecialchars($_POST[$label]);
        return ucfirst(strtolower($t));
    }
}

?>