<?php
try {
    $database="moviedb";
    $user="root";
    $password="";
    $pdo = new PDO("mysql:host=localhost;dbname=$database",$user,$password);
    // echo "Success: Connected to the database.";
  } catch(PDOException $e) {
    die("Error: Could not connect to the database.");
  }
  