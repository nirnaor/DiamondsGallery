<?php
require_once('../../configs/db.php');
require_once('jewel.php');
require_once('imageAdder.php');
function getDummyImages(){
  $dir = "d:/Dev/Demos/randomimages/";
  $dh  = opendir($dir);
  while (false !== ($filename = readdir($dh))) {
      $files[] = $filename;
  }
  return $files;
}
$allFiles = getDummyImages();

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
  return $result;
}
function getFiveImages($index){
  $result = array();
  $max = sizeof($files) - 2;
  array_push($result,$allFiles[rand(1,$max)]);
  array_push($result,$allFiles[rand(1,$max)]);
  array_push($result,$allFiles[rand(1,$max)]);
  array_push($result,$allFiles[rand(1,$max)]);
  array_push($result,$allFiles[rand(1,$max)]);
  return $result;
}
function getOneImage($index){
  print_r($allFiles);
  $max = sizeof($allFiles) - 2;
  return $allFiles[rand(1,$max)];
}
function generateFakeImages($index)
{
  $result = array();
  $result['mainImage'] = "d:/Dev/Demos/randomimages/picture" . $index;
  $result['birth[]'] = getbirthFiles($index);
  return $result;
}
function fakeIt()
{
  $filesArray = array();
  for ($i = 1; $i < 120; $i++) {
    $jewelToAdd = new jewel();
    $jewelToAdd->fillDataFromPost(generateFakeMetadata($i));
    $jewelToAdd->addToDb();

    $dirCreator = 
      new JewelDirectoryManager($jewelToAdd->jewelName,$jewelToAdd->category);

    $dirCreator->buildDirectories();

    $primary = getOneImage($i);
    $birth= getFiveImages($i);
    $dirCreator->addImagesToDirectoryForTestingData($primary,$birth);
  }
}
fakeIt();


?>
