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
  var $jewelId; 
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
    $this->jewelId= $postArray['jewelid'];
    $this->jewelName= $postArray['jewelname'];
    $this->category= $postArray['category'];
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
    $this->jewelId = $dbRow['jewelid'];
    $this->jewelName= $dbRow['name'];
    $this->category= $dbRow['category'];
    $this->desc= $dbRow['description'];
    $this->metalColor= $dbRow['metalcolor'];
    $this->metalWeight= $dbRow['metalweight'];
    $this->weight= $dbRow['weight'];
    $this->clarity= $dbRow['clarity'];
    $this->cut = $dbRow['cut']; 
    $this->mainImagePath= $this->getMainImage();
    $this->birthImagesPaths = $this->getBirthImages();
  }

  function nameIsNotUnique()
  {
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $query = "SELECT * FROM JEWELS WHERE NAME = '$this->jewelName'";
    $result = mysqli_query($dbc, $query);

    if ($result == false)
      return false;

    $num_rows = mysqli_num_rows($result);
    mysqli_close($dbc);
    return $num_rows > 0;
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

  function objectIsNew()
  {
    return $this->jewelId == null;
  }

  function addToDb()
  {
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    echo 'hello im in add to db';
    if($this->objectIsNew())
    {
      $query = "INSERT INTO jewels
        (jewelid,name,metalcolor,metalweight,weight,category,clarity,cut,description)
        VALUES (0,'$this->jewelName','$this->metalColor',
          '$this->metalWeight','$this->weight','$this->category',
          '$this->clarity','$this->cut','$this->desc')";
    }
    else
    {
      $query = "update jewels set 
                name ='$this->jewelName' 
                ,category ='$this->category' 
                ,description ='$this->desc' 
                ,metalcolor ='$this->metalColor' 
                ,metalweight ='$this->metalWeight' 
                ,weight ='$this->weight' 
                ,clarity ='$this->clarity' 
                ,cut ='$this->cut' 
                where jewelid = '$this->jewelId'";
    }

    echo '<h1> this is the query : '.  $query . '</h1>';
    // Write the data to the database

    $result = mysqli_query($dbc, $query);

    mysqli_close($dbc);

  }

  function createImageFiles()
  {
    $adder=
      new jewelimagesAdder($this->mainImagePath, $this->birthImagesPaths
      ,$this->jewelName,$this->category);

    $adder->add();
  }


}

?>
