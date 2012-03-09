<?php
echo ' hello there im gallery.php';
require('setup.php');
$smarty = new Smarty_GuestBook();
$smarty->display('gallery.tpl');
?>
