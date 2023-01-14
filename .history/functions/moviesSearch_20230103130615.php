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
        $conditions["YEAR(date_sortie)"]= $_GET['annee'];
        $i++;
     }
     if(! empty($_GET['movie'])){
        $conditions["titre"]= $pdo->quote($_GET['movie']);
        $i++;
     }
     $req = "SELECT * FROM film";
    if(sizeof($conditions) > 0){
        $req .=" WHERE ";
        $and ="";
        $j=0 ; 
        foreach($conditions as $key => $value):
                if ($j==$i) {
                    $and = "";
                }
                $req .= $and."$key=$value";
                
                $and = " AND ";
        endforeach;
    }
    // echo $req;
    $requete = $pdo->query($req);
    $films = $requete->fetchAll(PDO::FETCH_ASSOC);
    print_r($films);
}