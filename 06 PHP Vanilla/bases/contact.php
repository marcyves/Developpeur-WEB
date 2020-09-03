<!--
==============================================================================

 Ce script fait partie d'une série d'exemples de code mise à disposition
  sur https://github.com/marcyves/Developpeur-Web

 (c) 2019 Marc Augier

==============================================================================
-->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Formulaire de contact</title>
  </head>
  <body>
    <?php
    print_r($_GET);


    ?>
    <form method="get">
      <select name="civilite">
        <option value="1">Monsieur</option>
        <option value="2">Madame</option>
        <option value="3">Mademoiselle</option>
      </select><br>
      Nom : <input type="text" name="nom" value="?"><br>
      Prénom : <input type="text" name="prenom"><br>
      <input type="submit" name="valide" value="Ok">
      <input type="submit" name="valide" value="Cancel">
    </form>

  </body>
</html>
