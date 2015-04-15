<?php
    $connect_error = "Sorry, We're experiencing connection problems.";
    mysql_connect("localhost", "root", "") or die($connect_error);
    mysql_select_db("testing") or die(connect_error);

    // Database Connection
    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "testing";
  
    // Intialize the database connection
    $link = mysqli_connect ($db_host, $db_user, $db_pass, $db_name);
  
    // Verify that we have a valid connection
    if (!$link) {
      echo "Connection Error: " . mysqli_connect_error();
      die();
    }
?>