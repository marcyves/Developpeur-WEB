<?php
/*
==============================================================================

 Ce script fait partie d'une série d'exemples de code mise à disposition
  sur https://github.com/marcyves/Developpeur-Web

 (c) 2019 Marc Augier

==============================================================================
*/

namespace xdm;

class ClassAutoloader {
    public function __construct()
    {
        spl_autoload_register(array($this, 'loader'));
    }

    private function loader($className)
    {
      $className = ltrim($className, '\\');
      $fileName  = '';
      $namespace = '';
      if ($lastNsPos = strrpos($className, '\\')) {
          $namespace = substr($className, 0, $lastNsPos);
          $className = substr($className, $lastNsPos + 1);
          $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR.$className;
      }
        echo 'Trying to load ', $className, ' via ', __METHOD__, "() as $fileName<br>";
        include $fileName . '.php';
    }
}

    $autoloader = new ClassAutoloader();

    echo "<h2>Premier</h2>";

    $obj = new MenuEntry("Accueil", "index", "active");

    echo "<h2>résultat</h2>";
    echo $obj;

    echo "<h2>Deuxième</h2>";

    $obj = new Blog("Voici un article","index","Voici le texte de l'article");
    echo "<h2>résultat</h2>".$obj;
?>
