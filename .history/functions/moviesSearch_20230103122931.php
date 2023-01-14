<?php

require_once "./database.php";
if($_SERVER['REQUEST_METHOD'] == "GET"){
     print_r($_GET);
     $condition = [];
     if(! empty($_GET['genre'])){
        $condition[]="genre";
     }
     if(! empty($_GET['annee'])){
        $condition[]="annee";
     }
     if(! empty($_GET['annee'])){
        $condition[]="movie";
     }
    if(empty($_GET["genre"])&& empty($_GET["annee"]) && empty($_GET["movie"]) ){
       $req = "SELECT * FROM movie";
    }elseif
 }