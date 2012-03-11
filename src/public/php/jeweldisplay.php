<?php
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
$jewelDetailsJson = json_encode($jewelDetails);
print_r($jewelDetailsJson);

require('setup.php');
$smarty = new Smarty_GuestBook();
$smarty->assign('jewelDetails', $jewelDetailsJson);
$smarty->display('jeweldisplay.tpl');
?>
