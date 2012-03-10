<?php
/**
 * k
 * represent a single jewel.
 **/
require_once('imageAdder.php');
require_once('getAllFilesInDirectory.php');
class Jewel 
{
  var $jewelName; 
  var $mainImage; 
  var $category; 
  var $metalColor; 
  var $metalWeight; 
  var $weight; 
  var $clarity; 
  var $cut; 
  var $filesArray; 


  public function fillDataFromPost($postArray,$filesArray)
  {
    $this->jewelName= $postArray['jewelname'];
    $this->mainImage= $filesArray['mainimage']['name'];
    $this->category= strtolower($postArray['category']);
    $this->filesArray = $filesArray;
    $this->metalColor= $postArray['metalcolor'];
    $this->metalWeight= $postArray['metalweight'];
    $this->weight= $postArray['weight'];
    $this->clarity= $postArray['clarity'];
    $this->cut = $postArray['cut']; 
  }

  function getMainImage()
  {
    $manager = new JewelDirectoryManager ($this->jewelName,$this->category);

    print_r($manager);

    $imagesArray= getAllFiles($manager->primaryOriginalDir);
    echo '<h2> images array: </h2>';
    print_r($imagesArray);

    if(!sizeof($imagesArray) == 1)
     throw new Exception('there are no images or more than one images in the primary image folder. please checkout whats wrong'); 

     return $imagesArray[0];
  }

  public function fillDataFromDb($dbRow)
  {
    $this->jewelName= $dbRow['name'];
    $this->category= $dbRow['category'];
    $this->metalColor= $dbRow['metalcolor'];
    $this->metalWeight= $dbRow['metalweight'];
    $this->weight= $dbRow['weight'];
    $this->clarity= $dbRow['clarity'];
    $this->cut = $dbRow['cut']; 
    $this->mainImage= $this->getMainImage();
  }

  function nameIsNotUnique()
  {
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $query = "SELECT * FROM JEWELS WHERE NAME = '$this->jewelName'";
    $result = mysqli_query($dbc, $query);
    mysqli_close($dbc);
    return mysqli_num_rows($result) > 0;
  }
  function fileIsNotAnImage()
  {
    return false;
  }
  function validateInput()
  {
    $errors = array();

    // validate name is unique
    if($this->nameIsNotUnique())
    {
      echo 'name is not unique';
      array_push($errors, "name of the jewel must be unique");
    }

    // validate files is an image  
    if($this->fileIsNotAnImage())
    {
      echo 'file is not an image';
      array_push($errors, "all files must be image files");
    }
    
    

  }

  function addToDb()
  {
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    var_dump($dbc);
    // Write the data to the database
    $query = "INSERT INTO JEWELS VALUES (0,'$this->jewelName',
      '$this->metalColor','$this->metalWeight','$this->weight',
      '$this->category','$this->clarity','$this->cut')";

    mysqli_query($dbc, $query);
    mysqli_close($dbc);

  }

  function createImageFiles()
  {
    $adder=
      new jewelimagesAdder($this->filesArray,$this->category,$this->jewelName);

    $adder->add();
  }


}

?>
