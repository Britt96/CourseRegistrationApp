<?php

/**
Creates database and tables and connects it to app
*/

require "config.php";

// Creates PHP Data Objects to connect to database
try {
  $connection = new PDO("mysql:host=$host", $user, $password, $options);
  $sql = file_get_contents("init.sql");
  $connection->exec($sql);   
    
  echo "Database created successfully.";
} catch (PDOException $error) {
  echo $sql . "<br>" . $error->getMessage();
}

?>