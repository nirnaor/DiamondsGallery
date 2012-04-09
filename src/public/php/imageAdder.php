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

        $this->categoryDir = GALLERY_PATH . $category . '/';
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

    function addImagesToDirectoryForTestingData($primaryImage,$birthImages)
    {
      $targetName = $primaryOriginalDir . 'primarybitch.jpg';
      copy($primaryImage,$targetName);

    }
  }

  class jewelimagesAdder
  {
    var $primaryImagePath;
    var $birthImagesPathes;
    var $jewelname;
    var $category;
    var $dirCreator;

    function __construct($primaryPath,$birthPathes,$jewelname,$category)
    {
      $this->category= $category;
      $this->jewelname= $jewelname;
      $this->primaryImagePath = $primaryPath;
      $this->birthImagesPathes = $birthPathes;
    }

    function getNewFileName($prefix)
    {
      return $prefix . $this->jewelname .  '.jpg';  
    }

    function createThumb($fname,$directoryToPlaceFile)
    {
      $info = pathinfo($fname);
      echo "<pre>";
      var_dump($info);
      echo "</pre>";
      // continue only if this is a JPEG image
      if ( strtolower($info['extension']) == 'jpg' ) 
      {
        echo "Creating thumbnail for {$fname} <br />";

        // load image and get image size
        $img = imagecreatefromjpeg($fname);
        $width = imagesx( $img );
        $height = imagesy( $img );

        // calculate thumbnail size
        $thumbWidth = 500;
        $new_width = $thumbWidth;
        $new_height = floor( $height * ( $thumbWidth / $width ) );

        // create a new temporary image
        $tmp_img = imagecreatetruecolor( $new_width, $new_height );

        // copy and resize old image into new image 
        imagecopyresized( $tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height );

        // save thumbnail into a file
        imagejpeg( $tmp_img, "{$directoryToPlaceFile}{$info['basename']}" );
      }
    }

    function movePrimaryImage($newFile,$directoryToPlaceFile)
    {
      $newFileName = $this->getNewFileName('primary');
      $this->createThumb($newFile, $directoryToPlaceFile);
    }

    function moveBirthImages($birthImagesArray,$directoryToPlaceFile)
    {
      for($i = 0; $i < sizeof($birthImagesArray); ++$i)
      {
        $newFile = $birthImagesArray[$i];
        $newFileName = $this->getNewFileName('birth' . $i);
        if($newFile){
           $this->createThumb($newFile, $directoryToPlaceFile);
        }
      }

    }
    function moveOriginalFiles()
    {
      echo 'primaryImagePath : ' .$this->primaryImagePath;
      $this->movePrimaryImage($this->primaryImagePath, $this->dirCreator->primaryOriginalDir);
      
      echo '<h1> birth images pathes : </h1>' ;

      $this->moveBirthImages($this->birthImagesPathes ,
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
