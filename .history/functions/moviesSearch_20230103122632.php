<?php

require_once "./database.php";
if($_SERVER['REQUEST_METHOD'] == "GET"){
     print_r($_GET);
    if(empty($_GET["genre"])&& empty($_GET["annee"]) && empty($_GET["movie"]) ){
       $req = "SELECT * FROM movie";
    }
 }