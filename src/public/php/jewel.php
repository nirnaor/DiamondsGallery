<?php
/**
 * k
 * represent a single jewel.
 **/
require_once('imageAdder.php');
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


  function __construct($postArray,$filesArray)
  {
    print_r($postArray);
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

  function printDetails()
  {
    echo '</br>';
    echo 'jewel name : ' .$this->jewelName;
    echo '</br>';
    echo 'main Image: ' .$this->mainImage;
    echo '</br>';
    echo 'metal color : ' .$this->metalColor;
    echo '</br>';
    echo 'metal weight: ' .$this->metalWeight;
    echo '</br>';
    echo 'weight: ' .$this->weight;
    echo '</br>';
    echo 'clarity: ' .$this->clarity;
    echo '</br>';
    echo 'cut: ' .$this->cut;
    echo '</br>';


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
    $query = "INSERT INTO JEWELS VALUES (0,'$this->jewelName',
      '$this->metalColor','$this->metalWeight','$this->weight',
      '$this->clarity','$this->cut')";

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
