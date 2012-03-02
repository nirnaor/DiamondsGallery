<?php
  require_once('../../configs/db.php');
  require_once('jewel.php');
  if (isset($_POST['submit'])) {
    
    $jewelToAdd = new jewel($_POST,$_FILES);
    $jewelToAdd->printDetails();
    $jewelToAdd->validateInput();
    $jewelToAdd->addToDb();
      

 


      


    
  }

?>
