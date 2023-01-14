<?php

require_once './database.php';

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    if(!empty($_GET['idUser']) && !empty($_GET['idProgramme'])){
        $iduser = $_GET['idUser'];
        $idprogramme = $_GET['idProgramme'];
        $stmt="SELECT prix_unitaire FROM programme WHERE idProgramme=$idprogramme";
        $query1=$pdo->query($stmt);
        $prix = $query1->fetch(PDO::FETCH_ASSOC);
        if($prix == false){
            exit(json_encode(false));
        }
        var_dump($prix['prix_unitaire']);
        $prix_unitraire = $prix['prix_unitaire'];
        var_dump($prix_unitraire);
        // $req = "INSERT INTO produit(id_programme,id_user,nombre_places,prix) values(?,?,?,?)";
        // $query = $pdo->prepare($req);
        // $query->execute([$idprogramme,$iduser,1,$prix_unitraire]);
        // if ($query->rowCount() > 0) {
        //     echo "Record inserted successfully.";
        // } else {
        //     echo "Error inserting record.";
        // }     
        
        
        // exit(json_encode($resultat));
    }
}