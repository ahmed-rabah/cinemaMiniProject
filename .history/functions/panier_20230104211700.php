<?php

require_once './database.php';

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $idUser = $_GET['idUser'];
    $req = "SELECT pro.nombre_places , pro.prix , p.date_projection ,p.heure_debut , p.prix_unitaire , g.libelle , f.titre,f.photo FROM produit as pro, programme as p , film as f ,genre as g WHERE pro.id_user=$idUser AND p.idFilm=f.idFilm AND pro.id_programme=p.idProgramme AND g.idGenre =f.idGenre";
}