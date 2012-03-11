<?php
$jewelName= $_GET["name"];
echo 'this is the jewel name :' . $jewelName;
require('setup.php');
$smarty = new Smarty_GuestBook();
$smarty->display('jeweldisplay.tpl');
?>
