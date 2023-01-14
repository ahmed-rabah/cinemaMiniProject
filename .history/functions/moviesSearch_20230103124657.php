<?php

require_once "./database.php";
if($_SERVER['REQUEST_METHOD'] == "GET"){
     $conditions = [];
     if(! empty($_GET['genre'])){
        $conditions["idGenre"]= $_GET['genre'];
     }
     if(! empty($_GET['annee'])){
        $conditions["annee"]= $_GET['annee'];
     }
     if(! empty($_GET['movie'])){
        $conditions["movie"]= $_GET['movie'];
     }
     $req = "SELECT * FROM film";
    if(sizeof($conditions) > 0){
        $req .=" WHERE ";
        $and ="";
        foreach($conditions as $key => $value):
                $req .= "$key=$value".$and;
                $and = " AND ";
        endforeach;
    }
    $requete = $pdo->query($req);
    $movies = $requete->fetchAll(PDO::FETCH_ASSOC);
    exit(json_encode($movies));
}