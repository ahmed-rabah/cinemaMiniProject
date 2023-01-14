<?php
require_once "./database.php";
// var_dump($_GET);
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
     if(! empty($_GET['projection'])){
        $conditions["date_projection"]= $_GET['projection'];
        $i++;
     }
    //  select * from programme,film as f where date_projection="2022-01-22" and f.idFilm = "1" and f.idGenre="3" and YEAR(f.date_sortie)=2018
     $req = "SELECT  p.idProgramme,f.idFilm,f.idGenre ,f.titre,f.cast,f.date_sortie,p.date_projection , f.duree , f.resume,f.en_cours_de_projection , f.photo , f.trailer , p.heure_debut , p.num_salle , p.ticketsDisponible, p.prix_unitaire,p.createdDate as 'ProgrammeCreatedDate' ,f.createdDate as 'filmCreatedDate'   FROM programme as p, film as f WHERE p.idFilm= f.idFilm ";
    if(sizeof($conditions) > 0){
        $and ="";
        $j=0 ; 
      //   if(isset($conditions["date_projection"])){
      //    $req
      //   }
        foreach($conditions as $key => $value):
                if ($j==$i) {
                    $and = "";
                }
                switch($key) {
                    case "idGenre" : $req .= $and."f.$key=$value"; break;
                    case "date_sortie" : $req .= $and."YEAR(f.$key)=$value"; break;
                    case "titre" : $req .= $and."f.$key LIKE '%$value%'"; break;
                    case "date_projection" : $req .= $and."p.$key =$value"; break;
                }
                
                $and = " AND ";
        endforeach;
    }
    echo $req."<br>";
    $requete = $pdo->query($req);
    $programmes = $requete->fetchAll(PDO::FETCH_ASSOC);
   //  $programmes = json_encode($programmes);

    foreach ($programmes as $programme) {
         echo '<br>';
         print_r($programme);
         echo '<br>';

    }
}