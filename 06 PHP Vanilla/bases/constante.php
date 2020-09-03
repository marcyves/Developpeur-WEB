<?php
/*
==============================================================================

 Ce script fait partie d'une série d'exemples de code mise à disposition
  sur https://github.com/marcyves/Developpeur-Web

 (c) 2019 Marc Augier

==============================================================================
*/

define("TEST", "Je ne bouge pas");
echo "<h1>".TEST."</h1>";



function test(){
	echo "<br>".constant("TEST")."<br>";
}

test();

print_r($GLOBALS);

?>
