<?php
$category = $_GET["category"];
echo ' hello there im gallery.php. this is the category : '.  $category;
require('setup.php');
$smarty = new Smarty_GuestBook();
$smarty->display('gallery.tpl');
?>
