<?php
  $category = $_GET["category"];
  echo ' hello there im gallery.php. this is the category : '.  $category;

  require('setup.php');
  $smarty = new Smarty_GuestBook();
  
  $arr = array ('this is the category from getimagesforcategory'=>$category);
  $images = json_encode($arr);

  // if you want to use the traditional object parameter format, pass a boolean of false
  $smarty->assign('imagesArray', $images);
  $smarty->display('gallery.tpl');


?>
