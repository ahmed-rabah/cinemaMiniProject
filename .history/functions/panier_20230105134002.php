<?php

require_once './database.php';

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    session_start();
    if(!empty($_GET['idUser']) && isset($_SESSION['user_id'])){
            $panier = $_SESSION['panier'];

        // $idUser = $_GET['idUser'];
        // $req = "SELECT pro.id_produit ,pro.nombre_places , pro.prix , p.date_projection ,p.heure_debut , p.prix_unitaire , g.libelle , f.titre,f.photo FROM produit as pro, programme as p , film as f ,genre as g WHERE pro.id_user=$idUser AND p.idFilm=f.idFilm AND pro.id_programme=p.idProgramme AND g.idGenre =f.idGenre";
        // $query = $pdo->query($req);
        // $resultat = $query->fetchAll(PDO::FETCH_ASSOC);
        
        exit(json_encode($resultat));
    }else{exit(json_encode(false));}
}