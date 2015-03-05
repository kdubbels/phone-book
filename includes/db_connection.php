<?php
  define("DB_SERVER", "127.0.0.1");
  define("DB_USER", "kristofer");
  define("DB_PASS", "revolver");
  define("DB_NAME", "phone_book");

  // 1. Create a database connection
  $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
  // Test if connection succeeded
  if(mysqli_connect_errno()) {
    die("Database connection failed: " . 
         mysqli_connect_error() . 
         " (" . mysqli_connect_errno() . ")"
    );
  }
?>
