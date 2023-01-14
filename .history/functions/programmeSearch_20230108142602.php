<?php
require_once "./database.php";
// var_dump($_GET);
if($_SERVER['REQUEST_METHOD'] == "GET"){

    if(!empty($_GET['idProgramme'])){

        $idprogramme = $_GET['idProgramme'];
        //  select * from programme,film as f where date_projection="2022-01-22" and f.idFilm = "1" and f.idGenre="3" and YEAR(f.date_sortie)=2018
        $req = "SELECT  p.idProgramme,f.idFilm,f.idGenre ,g.libelle,f.titre,f.cast,f.date_sortie,p.date_projection , f.duree , f.resume,f.en_cours_de_projection , f.photo , f.trailer , p.heure_debut , p.num_salle , p.ticketsDisponible, p.prix_unitaire FROM programme as p, film as f , genre as g WHERE p.idFilm= f.idFilm AND p.idProgramme =$idprogramme AND g.idGenre = f.idGenre";
        
        $requete = $pdo->query($req);
        if($requete->rowCount() > 0){
            $programme = $requete->fetch(PDO::FETCH_ASSOC);
            exit(json_encode($programme));
        }else{
            exit(json_encode($programme));
        }
    }else{
        exit("false");
    }
}