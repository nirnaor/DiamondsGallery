<?php
require('setup.php');
require('authorize.php');
$smarty = new Smarty_GuestBook();
$smarty->display('addjewel.tpl');
?>
