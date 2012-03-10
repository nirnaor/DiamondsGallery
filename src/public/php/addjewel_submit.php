<?php
  require_once('../../configs/db.php');
  require_once('jewel.php');
  if (isset($_POST['submit'])) {
    
    $jewelToAdd = new jewel();
    $jewelToAdd->fillDataFromPost($_POST);

    $mainimage= $_FILES['mainimage']['tmp_name'];
    $birth = $_FILES['birth']['tmp_name'];


    $jewelToAdd->fillDataFromFiles($mainimage,$birth);
    $jewelToAdd->validateInput();
    $jewelToAdd->addToDb();
    $jewelToAdd->createImageFiles();
  }

?>
