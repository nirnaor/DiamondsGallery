<?php
  require('getAllFilesInDirectory.php');
  require('setup.php');
  require('const.php');
  require('jewel.php');
  require('../../configs/db.php');

  $category = $_GET["category"];

  function getJewelsByCategory($category)
  {
    $result = array();
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $query = "SELECT * from jewels WHERE category='" . $category. "'";
    $jewelsFromDb= mysqli_query($dbc, $query);
    $jewelsFromDbArray = mysqli_fetch_all($jewelsFromDb, MYSQLI_ASSOC);

    for ($i = 0; $i < sizeof($jewelsFromDbArray); $i++) {
      $currentJewel = $jewelsFromDbArray[$i];
      $currentJewelAsClass = new Jewel();
      $currentJewelAsClass->fillDataFromDb($currentJewel);
      array_push($result,$currentJewelAsClass);
    }
    return $result;
  }

  function getJewelsForCategory($category)
  {
    $jewelsInCategoryFromDb  = getJewelsByCategory($category);
    return $jewelsInCategoryFromDb;
  }

  $images = json_encode(getJewelsForCategory($category));

  $smarty = new Smarty_GuestBook();
  $smarty->caching = false;
  $smarty->assign('imagesArray', $images);
  $smarty->display('gallery.tpl');
?>
