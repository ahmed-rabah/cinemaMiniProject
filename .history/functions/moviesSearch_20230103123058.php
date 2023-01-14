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
     $req = "SELECT * FROM movie";
    if(sizeof($condition) <= 0){
    }else{
        $req +=" WHERE"; 
    }
 }