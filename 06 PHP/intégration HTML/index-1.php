<?php 

include("inc/config.inc.php");
 
include("template/header.inc.php");
include("inc/lib.inc.php");
include("langue/$langue.inc.php");

$contenu = INIT;
$contenu .= "<br>".MSG01." = ".factorielle1(5);
$contenu .= "<br>".MSG01." = ".factorielle2(5);
$contenu .= "<br>".MSG01." = ".factorielle3(5);
$contenu .= "<br>".MSG01." = ".factorielle1(0);
$contenu .= "<br>".MSG01." = ".factorielle2(0);

include("template/main.inc.php");
include("template/footer.inc.php");

?>