<?php
/**
 * k
 * represent a single jewel.
 **/
class Jewel 
{
  var $jewelName; 
  var $mainImage; 
  var $metalColor; 
  var $metalWeight; 
  var $weight; 
  var $clarity; 
  var $cut; 

  function __construct($postArray,$filesArray)
  {
    print_r($postArray);
    $this->jewelName= $postArray['jewelname'];
    $this->mainImage= $filesArray['mainimage']['name'];
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
  function validateInput()
  {
    $errors = array();

    // validate name is unique
    if($this->nameIsNotUnique())
    {
      echo 'name is not unique';
      array_push($errors, "name of the jewel must be unique");
    }


    
    // validate file is an image  
  }

  function handleImage()
  {
    // create the images tree folder :
    // images folder
    //    category
            // root folder
            //    mainimage
            //      original
            //      thumb
            //    birth
            //      original
            //      thhumb
    
    // move the uploaded main image to the main image original folder 
    // move the uploaded birth images to the birth images original folder 
    // create thumb for all of the images in the original folders
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
}

?>
