<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Club Alpin</title>
  </head>
  <body>
    <?php

    echo "<h1>Club Alpin</h1>";

    echo "éàè";

    $db = mysqli_connect("localhost:3406","guide","alpin","club_alpin");

    $nom = "TOMBALE";
    $sql = "SELECT * FROM participant WHERE nom = '$nom'";

    $prenom = "Vincent";
    $sql = "SELECT * FROM participant WHERE `prénom` = '$prenom'";

    $sql = "SELECT * FROM participant ORDER BY nom";

    echo "<br>$sql<br>";
    $resultat = $db->query($sql);

    if ($resultat->num_rows > 0)
    {
      /*
      Liste par ligne
      echo "<table>";
      while($ligne = $resultat->fetch_row())
      {
        echo "<tr><td>".utf8_encode($ligne[2])."</td><td>".$ligne[1]."</td></tr>";
      }
      echo "</table>";
      */

      /*
      Liste par valeur
      echo "<table>";
      while(list($id_lu, $prenom_lu, $nom_lu) = $resultat->fetch_array())
      {
        echo "<tr><td>$prenom_lu</td><td>$nom_lu</td></tr>";
      }
      echo "</table>";
      */

      echo "<select value='participant'>";
      while(list($id_lu, $nom_lu, $prenom_lu) = $resultat->fetch_array())
      {
        echo "<option value=$id_lu>$prenom_lu $nom_lu</option>";
      }
      echo "</select>";


    } else {
      echo "<h2>Pas de résultat</h2>";
    }




    mysqli_close($db);
     ?>
  </body>
</html>
