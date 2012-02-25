<?php
require('setup.php');
$smarty = new Smarty_GuestBook();
//** un-comment the following line to show the debug console
//$smarty->debugging = true;
$smarty->display('home.tpl');
?>
