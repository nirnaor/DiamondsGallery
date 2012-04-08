<?php
require_once('../../configs/db.php');
require_once('jewel.php');
require_once('imageAdder.php');
/**
 * Deletes a directory and all files and folders under it
 * @return Null
 * @param $dir String Directory Path
 */
function rmdir_files($dir) {
  foreach(glob($dir.'*.*') as $v){
      unlink($v);
  }
}

function deleteFromDb()
{
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  $query = "DELETE FROM JEWELS"; 
  $result = mysqli_query($dbc, $query);
  mysqli_close($dbc);
}
function getDummyImages(){
  $dir = "../images/randomimages/";
  $dh  = opendir($dir);
  while (false !== ($filename = readdir($dh))) {
      $files[] = $filename;
  }
  return $files;
}

function getcut($index){
  $mod = $index % 8;
  if($mod ==0)
    return 'round';
  else if($mod == 1)
    return 'oval';
  else if($mod == 2)
    return 'peer';
  else if($mod == 3)
    return 'heart';
  else if($mod == 4)
    return 'asher';
  else if($mod == 5)
    return 'emrald';
  return 'radiant';
}
function getclarity($index){
  $mod = $index % 8;
  if($mod ==0)
    return 'ws1';
  else if($mod == 1)
    return 'ws2';
  else if($mod == 2)
    return 'vs1';
  else if($mod == 3)
    return 'vs2';
  else if($mod == 4)
    return 'si1';
  else if($mod == 5)
    return 'si2';
  return 'si3';
}
function getCategory($index){
  $mod = $index % 4;
  if($mod ==0)
    return 'Rings';
  else if($mod == 1)
    return 'Bracelets';
  else if($mod == 2)
    return 'Earings';

  return 'Necklaces';
}
function getcolor($index){
  $mod = $index % 3;
  if($mod ==0)
    return 'Gold';
  else if($mod == 1)
    return 'Silver';

  return 'Platinum';
}
function getweight($index){
  $mod = $index % 3;
  if($mod ==0)
    return 14;
  else if($mod == 1)
    return 18;

  return 22; 
}
function generateFakeMetadata($index)
{
  $result = array();
  $result['jewelname'] = 'picture' . $index;
  $result['category'] = getCategory($index);
  $result['metalcolor'] = getcolor($index);
  $result['metalweight'] = getweight($index);
  $result['weight'] = uniqid(); 
  $result['clarity'] = getclarity($index); 
  $result['cut'] = getcut($index); 
  $result['description'] = 'take one look at yourself, realize - life is treating you nice, better be wise and enjoy your moments'; 
  return $result;
}




function getPrimaryImage($filesToGetFrom,$index)
{
  $dir = "../images/randomimages/";
  return $dir . $filesToGetFrom[$index];
}

function getBirthImages($filesToGetFrom,$index)
{
  $dir = "../images/randomimages/";
  $result = array();
  $max = sizeof($filesToGetFrom);

  array_push($result,$dir . $filesToGetFrom[rand(2,$max)]);
  array_push($result,$dir . $filesToGetFrom[rand(2,$max)]);
  array_push($result,$dir . $filesToGetFrom[rand(2,$max)]);
  array_push($result,$dir . $filesToGetFrom[rand(2,$max)]);
  array_push($result,$dir . $filesToGetFrom[rand(2,$max)]);

  $moreBirth = $index % 5;
  for ($i = 0; $i < $moreBirth; $i++) {
      array_push($result,$dir . $filesToGetFrom[rand(2,$max)]);
  }
  
  return $result;
}


function deleteOldStuff()
{
  deleteFromDb();
  echo GALLERY_PATH;
  rmdir_files(GALLERY_PATH);
}


function fakeIt()
{
  $filesArray = getDummyImages();
  echo ' <h1> this is allFiles : </h1>';
  echo "<pre>";
  var_dump($filesArray);
  echo "</pre>";

  for ($i = 1; $i < 30; $i++) {
    $jewelToAdd = new Jewel();
    $jewelToAdd->fillDataFromPost(generateFakeMetadata($i));

    $primary = getPrimaryImage($filesArray,$i);
    $birth= getBirthImages($filesArray, $i);

    $jewelToAdd->fillDataFromFiles($primary,$birth);
    $jewelToAdd->validateInput();
    $jewelToAdd->addToDb();
    $jewelToAdd->createImageFiles();

    echo "<h3>Added Jewel:</h3>";
    echo "<pre>";
    var_dump($jewelToAdd);
    echo "</pre>";
  }
}
deleteOldStuff();
fakeIt();


?>
