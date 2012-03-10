<?php
  require('getAllFilesInDirectory.php');
  require('setup.php');
  require('const.php');
  require('jewel.php');
  require('../../configs/db.php');

  $category = $_GET["category"];

  function getJewelsByCategory($category)
  {
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    $name = 'eminem';
    $query2 = "SELECT category from jewels WHERE name='" . $name . "'";
    $query = "SELECT category from jewels" ;
    echo 'this is the query : ' ;
    var_dump($query);
    $result = mysqli_query($dbc, $query) or trigger_error(mysql_error().$sql);;
    
    if (is_resource($result))
    {
      echo ' success';
       // your while loop and fetch array function here....
    }
    else
    {
      echo mysql_error();
      echo 'failure';
    }

    if (!$result) { // add this check.
        die('Invalid query: ' . mysql_error());
    }

    var_dump($result);
    $resultArray = mysql_fetch_array($result);
    var_dump($resultArray);
    mysqli_close($dbc);
    return $resultArray;
  }

  function buildJewelsArray($jewelRows)
  {
    $result = array();
    var_dump($jewelRows);

    while ($currentRow = mysql_fetch_array($jewelRows)) {
      $currentRow = $jewelRows[$i];
      $currentJewel = new Jewel($currentRow);
      $currentJewel->fillDataFromDb($currentRow);
      array_push($result,$currentJewel);
    }

    return $result;
  }
  function getJewelsForCategory($category)
  {
    $jewelsInCategoryFromDb  = getJewelsByCategory($category);
    $jewelsArray = buildJewelsArray($jewelsInCategoryFromDb);
    return $jewelsArray;
  }

  $images = json_encode(getJewelsForCategory($category));

  $smarty = new Smarty_GuestBook();
  $smarty->caching = 0;
  $smarty->assign('imagesArray', $images);
  $smarty->display('gallery.tpl');
?>
