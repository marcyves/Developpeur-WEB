<?php
require_once('animals.php');

use \animal\wild\animal as beast;
$c=new beast();

echo $c->get_type()."<br>";
beast::whereami();
?>
