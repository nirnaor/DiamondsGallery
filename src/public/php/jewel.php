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
  var $mainImagePath; 
  var $birthImagesPaths;
  var $category; 
  var $desc; 
  var $metalColor; 
  var $metalWeight; 
  var $weight; 
  var $clarity; 
  var $cut; 


  public function fillDataFromPost($postArray)
  {
    $this->jewelName= $postArray['jewelname'];
    $this->category= strtolower($postArray['category']);
    $this->desc= $postArray['description'];
    $this->metalColor= $postArray['metalcolor'];
    $this->metalWeight= $postArray['metalweight'];
    $this->weight= $postArray['weight'];
    $this->clarity= $postArray['clarity'];
    $this->cut = $postArray['cut']; 
  }

  public function fillDataFromFiles($mainImageName,$birthImagesNames)
  {
    $this->mainImagePath = $mainImageName;
    $this->birthImagesPaths  = $birthImagesNames;
  }

  function getBirthImages()
  {
    $manager = new JewelDirectoryManager ($this->jewelName,$this->category);
    $imagesArray= getAllFiles($manager->birthOriginalDir);

    /*if(!sizeof($imagesArray) == 0)
      throw new Exception('there are no images in the birth folder. please checkout whats wrong: ' . $manager->birthOriginalDir); */

     return $imagesArray;
  }
  function getMainImage()
  {
    $manager = new JewelDirectoryManager ($this->jewelName,$this->category);
    $imagesArray= getAllFiles($manager->primaryOriginalDir);

    if(!sizeof($imagesArray) == 1)
     throw new Exception('there are no images or more than one images in the primary image folder. please checkout whats wrong'); 

     return $imagesArray[0];
  }

  public function fillDataFromDb($dbRow)
  {
    $this->jewelName= $dbRow['name'];
    $this->category= $dbRow['category'];
    echo'dbrow desc:'. $dbRow['description'];
    $this->desc= $dbRow['description'];
    $this->metalColor= $dbRow['metalcolor'];
    $this->metalWeight= $dbRow['metalweight'];
    $this->weight= $dbRow['weight'];
    $this->clarity= $dbRow['clarity'];
    $this->cut = $dbRow['cut']; 
    $this->mainImage= $this->getMainImage();
    $this->birthImagesPathes = $this->getBirthImages();
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

    // Write the data to the database
    $query = "INSERT INTO JEWELS
      (jewelid,name,metalcolor,metalweight,weight,category,clarity,cut,description)
      VALUES (0,'$this->jewelName','$this->metalColor',
        '$this->metalWeight','$this->weight','$this->category',
        '$this->clarity','$this->cut','$this->desc')";

    mysqli_query($dbc, $query);
    mysqli_close($dbc);

  }

  function createImageFiles()
  {
    var_dump($this);
    $adder=
      new jewelimagesAdder($this->mainImagePath, $this->birthImagesPaths
      ,$this->jewelName,$this->category);

    $adder->add();
  }


}

?>
