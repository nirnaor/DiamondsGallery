<?php
require('jewel.php');
require('../../configs/db.php');
function getJewelByName($name)
{
  $result = array();
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  $query = "SELECT * from jewels WHERE name ='" . $name. "'";
  print_r($query);
  $jewelsFromDb= mysqli_query($dbc, $query);
  print_r(mysqli_num_rows($jewelsFromDb));
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
echo 'this is the jewel name :' . $jewelName;
$jewelArray = getJewelByName($jewelName);
print_r($jewelArray);
$jewelDetails = json_encode($jewelArray);

require('setup.php');
$smarty = new Smarty_GuestBook();
$smarty->assign('jewelDetails', $jewelDetails);
$smarty->display('jeweldisplay.tpl');
?>
