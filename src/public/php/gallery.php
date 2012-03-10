<?php
  require('getAllFilesInDirectory.php');
  $category = $_GET["category"];
  function getJewelsForCategory($category)
  {
    $dir = GALLERY_PATH . $category . "/";
    return getAllFiles($dir);
  }

  require('setup.php');
  require('const.php');
  $smarty = new Smarty_GuestBook();
  
  $images = json_encode(getJewelsForCategory($category));

  // if you want to use the traditional object parameter format, pass a boolean of false
  $smarty->assign('imagesArray', $images);
  $smarty->display('gallery.tpl');


?>
