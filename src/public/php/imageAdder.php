<?php
  /**
   * add main image and birth images to the server, and
   * creates a thumbnail for each one of them
   **/
require_once('const.php');
  /**
   * responsible for the creation of all the relevant directories
   **/
  class JewelDirectoryCreator 
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

    function __construct($filesArray,$category,$jewelname)
    {
      $this->filesArray = $filesArray;
      $this->category= $category;
      $this->jewelname= $jewelname;
    }

    function add()
    {
      $dirCreator = 
        new JewelDirectoryCreator($this->jewelname,$this->category);

      print_r($dirCreator);
      $dirCreator->buildDirectories();
    }

  }

?>
