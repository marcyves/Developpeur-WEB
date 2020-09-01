<<<<<<< HEAD
<?php

$to = "marc.augier@laposte.net";
$sujet = "envoi de message";
$message = "Essai d'envoi de message depuis php.";

if (mail($to, $sujet, $message)){
	echo "message envoyé";
}else{
	echo "message non envoyé";
}

?>
=======
<?php
/*
==============================================================================

 Ce script fait partie d'une série d'exemples de code mise à disposition
  sur https://github.com/marcyves/Developpeur-Web

 (c) 2019 Marc Augier

==============================================================================
*/

$to = "marc.augier@laposte.net";
$sujet = "envoi de message";
$message = "Essai d'envoi de message depuis php.";

if (mail($to, $sujet, $message)){
	echo "message envoyé";
}else{
	echo "message non envoyé";
}

?>
>>>>>>> b3deffe92baae85a5962219a0541e4b5be34e46d
