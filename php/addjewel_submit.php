<?php

echo 'hello this is the addjewel_submit from the server';

  if (isset($_POST['submit'])) {
    echo 'this is the sumbit if';
    // Grab the score data from the POST
    $jewelname = $_POST['jewelname'];
    echo $jewelname;



  }

?>
