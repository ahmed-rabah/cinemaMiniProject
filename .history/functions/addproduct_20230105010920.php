<?php

require_once './database.php';

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    if(!empty($_GET['idUser']) && !empty($_GET['idProgramme'])){
        $idUser = $_GET['idUser'];
        $idprogramme = $_GET['idProgramme'];
        $stmt="SELECT prix_unitaire FROM programme WHERE idProgramme=$idprogramme";
        $query1=$pdo->query($stmt);
        $prix = $query1->fetch(PDO::FETCH_ASSOC);
        if($prix == false){
            exit(json_encode(false));
        }
        // var_dump($prix);
        $prix_unitraire = $prix['prix_unitraire'];
        $req = "";
        $query = $pdo->query($req);
        $resultat = $query->fetchAll(PDO::FETCH_ASSOC);
        
        // exit(json_encode($resultat));
    }
}