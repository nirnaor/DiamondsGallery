<?php
  /**
   * add main image and birth images to the server, and
   * creates a thumbnail for each one of them
   **/
require_once('const.php');
  /**
   * responsible for the creation of all the relevant directories
   **/
  class JewelDirectoryManager
  {
    

    var $categoryDir;
    var $rootDir;
    var $primaryOriginalDir;
    var $primaryThumbDir;
    var $birthOriginalDir;
    var $birthThumblDir;

    function __construct($jewelname,$category)
    {
        $this->jewelname= $jewelname;

        $this->categoryDir = GALLERY_PATH . $category . '/' ;
        $this->rootDir= $this->categoryDir . $jewelname;
        $primaryImageDir= $this->rootDir . PRIMARY_IMAGE_PATH;
        $birthImagesDir= $this->rootDir . BIRTH_IMAGES_PATH;

        $this->primaryOriginalDir = $primaryImageDir . ORIGINAL_PATH;
        $this->primaryThumbDir = $primaryImageDir . THUMBNAIL_PATH;
        $this->birthOriginalDir = $birthImagesDir . ORIGINAL_PATH;
        $this->birthThumbDir = $birthImagesDir . THUMBNAIL_PATH;

    }

    function createDirectoryIfNotExist($dirToCreate)
    {
      if(file_exists($dirToCreate) == false)
      {
        mkdir($dirToCreate,0777,true);

      }
    }

    function buildDirectories()
    {
      $this->createDirectoryIfNotExist($this->primaryOriginalDir);
      $this->createDirectoryIfNotExist($this->primaryThumbDir);
      $this->createDirectoryIfNotExist($this->birthOriginalDir);
      $this->createDirectoryIfNotExist($this->birthThumbDir);
    }
  }

  class jewelimagesAdder
  {
    
    var $filesArray;
    var $jewelname;
    var $category;
    var $dirCreator;
    function __construct($filesArray,$category,$jewelname)
    {
      $this->filesArray = $filesArray;
      $this->category= $category;
      $this->jewelname= $jewelname;
    }

    function getNewFileName($newFile,$prefix)
    {
      return $prefix . $this->jewelname .  '.' . end(explode(".",$newFile));  
      
    }


    function movePrimaryImage($newFile,$directoryToPlaceFile)
    {
      $newFileName =
        $this->getNewFileName($newFile["name"],'primary');
      move_uploaded_file($newFile["tmp_name"],
        $directoryToPlaceFile . $newFileName);
    }

    function moveBirthImages($birthImagesArray,$directoryToPlaceFile)
    {

      for($i = 0; $i < sizeof($birthImagesArray["name"]); ++$i)
      {
        echo '</br> this is the newfile';
        $newFile = $birthImagesArray["name"][$i];
        print_r($newFile);
        $newFileTempName = $birthImagesArray["tmp_name"][$i];
        print_r($newFileTempName);
        echo '</br>';

        $theNameOfTheNewFile = $this->getNewFileName($newFile,'birth' . $i);
        echo 'name of the newfile: ' . $theNameOfTheNewFile;
        echo '</br>second parameter on move uploaded:'
          . $directoryToPlaceFile . $theNameOfTheNewFile;
        move_uploaded_file($newFileTempName,
          $directoryToPlaceFile . $theNameOfTheNewFile);

      }

    }
    function moveOriginalFiles()
    {
      $this->movePrimaryImage($this->filesArray["mainimage"],
        $this->dirCreator->primaryOriginalDir);

      
      $this->moveBirthImages($this->filesArray["birth"] ,
          $this->dirCreator->birthOriginalDir);
    }
    function add()
    {
      $this->dirCreator = 
        new JewelDirectoryManager($this->jewelname,$this->category);

      $this->dirCreator->buildDirectories();
      $this->moveOriginalFiles();
        
    }

  }

?>
