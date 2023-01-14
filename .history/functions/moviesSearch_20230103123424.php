<?php

require_once "./database.php";
if($_SERVER['REQUEST_METHOD'] == "GET"){
     $conditions = [];
     if(! empty($_GET['genre'])){
        $conditions["genre"]= $_GET['genre'];
     }
     if(! empty($_GET['annee'])){
        $conditions["annee"]= $_GET['annee'];
     }
     if(! empty($_GET['movie'])){
        $conditions["movie"]= $_GET['movie'];
     }
     $req = "SELECT * FROM movie";
    if(sizeof($conditions) <= 0){
    }else{
        $req .=" WHERE ";
        foreach($condition as $key => $value):
                $req .= "$key=$value";
        endforeach;
    }
    echo $req;
 }