<?php

require_once('domestic.php');
require_once('wild.php');

$a=new animal();
echo $a->get_type()."<br>";

$b=new wild\animal();
echo $b->get_type()."<br>";

use wild\animal as beast;
$c=new beast();
echo $c->get_type()."<br>";

?>
