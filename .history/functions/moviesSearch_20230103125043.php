<?php

require_once "./database.php";
if($_SERVER['REQUEST_METHOD'] == "GET"){
     $conditions = [];
     $i=0;
     if(! empty($_GET['genre'])){
        $conditions["idGenre"]= $_GET['genre'];
        $i++;
     }
     if(! empty($_GET['annee'])){
        $conditions["date_sortie"]= $_GET['annee'];
        $i++;
     }
     if(! empty($_GET['movie'])){
        $conditions["titre"]= $_GET['movie'];
        $i++;
     }
     $req = "SELECT * FROM film";
    if(sizeof($conditions) > 0){
        $req .=" WHERE ";
        $and ="";
        $j=0 ; 
        foreach($conditions as $key => $value):
                $req .= "$key=$value".$and;
                
                $and = " AND ";
        endforeach;
    }
    $requete = $pdo->query($req);
    $movies = $requete->fetchAll(PDO::FETCH_ASSOC);
    exit(json_encode($movies));
}