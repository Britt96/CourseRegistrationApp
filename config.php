<?php

  /**
  Provides data to connect to database
  */

  $host = "localhost";
  $user = "root";
  $password = "root";
  $db_name = "Registration";
  $dsn = "mysql:host=$host;dbname=$db_name";
  $options = array(
               PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
              );
?>