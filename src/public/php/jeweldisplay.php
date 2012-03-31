<?php
header('Pragma: no-cache');
header('cache-Control: no-cache, must-revalidate'); // HTTP/1.1
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past

require('jewel.php');
require('../../configs/db.php');
function getJewelByName($name)
{
  $result = array();
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  $query = "SELECT * from jewels WHERE name ='" . $name. "'";
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


$jewelName= $_GET["name"];
$jewelDetails= getJewelByName($jewelName);

require('setup.php');
$smarty = new Smarty_GuestBook();
$smarty->caching = false;
$smarty->assign('jewelDetails', null);
$smarty->assign('jewelDetails', json_encode($jewelDetails));
$smarty->display('jeweldisplay.tpl');
?>
