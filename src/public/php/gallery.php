<?php
  require('getAllFilesInDirectory.php');
  require('setup.php');
  require('const.php');

  $category = $_GET["category"];

  function getJewelsForCategory($category)
  {
    $dir = GALLERY_PATH . $category . "/";
    return getAllFiles($dir);
  }

  $images = json_encode(getJewelsForCategory($category));

  $smarty = new Smarty_GuestBook();
  $smarty->caching = 0;
  $smarty->assign('imagesArray', $images);
  $smarty->display('gallery.tpl');
?>
