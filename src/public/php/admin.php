<?php
  require('getAllFilesInDirectory.php');
  require('setup.php');
  require('const.php');
  require('jewel.php');
  require('../../configs/db.php');
  require('authorize.php');


  function getAllJewels()
  {
    $result = array();
    $dbc = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $query = "SELECT * from jewels";
    $queryResult = $dbc->query($query);
    
    while ($row = $queryResult->fetch_assoc()) {
      $jewel = new Jewel();
      $jewel->fillDataFromDb($row);
      array_push($result, $jewel);
    }

    return $result;
  }


  $images = json_encode(getAllJewels());

  $smarty = new smarty_guestbook();
  $smarty->caching = false;
  $smarty->assign('imagesArray', $images);
  $smarty->display('admin.tpl');
?>
