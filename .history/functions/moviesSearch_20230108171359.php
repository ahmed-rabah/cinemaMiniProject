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
     $req = "SELECT * FROM film as f, genre as g WHERE f.idGenre , g.idGenre AND";
    if(sizeof($conditions) > 0){
        $req .=" WHERE ";
        $and ="";
        $j=0 ; 
        foreach($conditions as $key => $value):
                if ($j==$i) {
                    $and = "";
                }
                switch($key) {
                    case "idGenre" : $req .= $and."$key=$value"; break;
                    case "date_sortie" : $req .= $and."YEAR($key)=$value"; break;
                    case "titre" : $req .= $and."$key LIKE '%$value%'"; break;
                }
                
                $and = " AND ";
                $j++;
        endforeach;
    }
    $req.=" ORDER BY RAND()";
    // echo $req;
    $requete = $pdo->query($req);
    $movies = $requete->fetchAll(PDO::FETCH_ASSOC);
    exit(json_encode($movies));
}