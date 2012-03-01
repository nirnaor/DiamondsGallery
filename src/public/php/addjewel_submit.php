<?php
  require_once('../../configs/db.php');
  if (isset($_POST['submit'])) {
    echo 'this is the sumbit if';
    // Grab the score data from the POST
    $jewelname = $_POST['jewelname'];
    $shape= $_POST['shape'];
    $clarity = $_POST['clarity'];
    $mainimage = $_FILES['mainimage']['name'];
    
    echo '</br>';
    echo 'this is the jewel name : ' .$jewelname;
    echo '</br>';
    echo 'this is the clarity: ' .$clarity;
    echo '</br>';
    echo 'this is the main image: ' .$mainimage;

    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    // Write the data to the database
    $query = "INSERT INTO JEWELS VALUES (0,'$jewelname','$clarity')";
    mysqli_query($dbc, $query);
    mysqli_close($dbc);

    echo 'added one row successfully'; 

  }

?>
