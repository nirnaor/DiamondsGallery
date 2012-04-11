<?php
header('Pragma: no-cache');
header('cache-Control: no-cache, must-revalidate'); // HTTP/1.1
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past

require('jewel.php');
require('../../configs/db.php');
function getJewelById($id)
{
  $jewels = array();
  $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  $query = "SELECT * from jewels WHERE jewelid ='" . $id. "'";
  $queryResult = $mysqli->query($query);
  //$jewelsFromDbArray = mysqli_fetch_all($jewelsFromDb, MYSQLI_ASSOC);

  //for ($i = 0; $i < sizeof($jewelsFromDbArray); $i++) {
  while($row = $queryResult->fetch_assoc()) {
    $jewel = new Jewel();
    $jewel->fillDataFromDb($row);
    array_push($jewels, $jewel);
  }
  return $jewels;
}


$jewelId = $_GET["id"];
$jewelDetails= getJewelById($jewelId);

require('setup.php');
$smarty = new Smarty_GuestBook();
$smarty->caching = false;
$smarty->assign('jewelDetails', null);
$smarty->assign('jewelDetails', json_encode($jewelDetails));
$smarty->display('jeweldisplay.tpl');
?>
