<?php

require_once './database.php';

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    if(!empty($_GET['idUser']) && !empty($_GET['idProgramme'])){
        $idUser = $_GET['idUser'];
        $idprogramme = $_GET['idProgramme'];
        $stmt="SELECT prix_unitaire FROM programme WHERE idProgramme=$idprogramme";
        $query1=$pdo->query($stmt);
        $prix = $query1->fetchAll();
        var_dump($prix['prix_unitaire']);
        $req = "SELECT pro.id_produit ,pro.nombre_places , pro.prix , p.date_projection ,p.heure_debut , p.prix_unitaire , g.libelle , f.titre,f.photo FROM produit as pro, programme as p , film as f ,genre as g WHERE pro.id_user=$idUser AND p.idFilm=f.idFilm AND pro.id_programme=p.idProgramme AND g.idGenre =f.idGenre";
        $query = $pdo->query($req);
        $resultat = $query->fetchAll(PDO::FETCH_ASSOC);
        
        // exit(json_encode($resultat));
    }
}