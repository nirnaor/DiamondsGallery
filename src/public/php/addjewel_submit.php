<?php
  require_once('../../configs/db.php');
  require_once('jewel.php');
  if (isset($_POST['submit'])) {
    
    $jewelToAdd = new jewel();
    print_r($_POST);
    print_r($_FILES);
    $jewelToAdd->fillDataFromPost($_POST,$_FILES);
    $jewelToAdd->fillDataFromFiles($_FILES);
    $jewelToAdd->validateInput();
    $jewelToAdd->addToDb();
    $jewelToAdd->createImageFiles();
      
 


      


    
  }

?>
