<?php
  require_once('../../configs/db.php');
  require_once('jewel.php');
  if (isset($_POST['submit'])) {
    
    $jewelToAdd = new jewel();
    $jewelToAdd->fillDataFromPost($_POST,$_FILES);
    $jewelToAdd->validateInput();
    $jewelToAdd->addToDb();
    $jewelToAdd->createImageFiles();
      
 


      


    
  }

?>
