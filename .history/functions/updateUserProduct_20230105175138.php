<?php


if($_SERVER['REQUEST_METHOD'] == 'GET'){
    require_once "./database.php";
    session_start();
    if(!empty($_GET['status']) && !empty($_GET['idProgramme']) && isset($_SESSION['user_id'])){
        $iduser = $_SESSION['user_id'];
        $idprogramme = $_GET['idProgramme'];
        $status = $_GET['status'];
        $panier = $_SESSION['panier'];
        $ProductIndex = 0 ; 
        $exist = false ; 
        $stmt="SELECT prix_unitaire , ticketsDisponible FROM programme WHERE idProgramme=$idprogramme";
        $query1=$pdo->query($stmt);
        $response = $query1->fetch(PDO::FETCH_ASSOC);
        $prix = $response['prix_unitaire'];
        $ticketDispo = $response['ticketsDisponible'];

        // echo "<br>$prix";
        // echo "<br>$ticketDispo";
        if($response == false){
            $prix=100;
        }
        for ($i=0; $i <sizeof($panier) ; $i++) { 
            if($panier[$i]['idProgramme'] == $idprogramme){
                    $ProductIndex = $i ; 
                    $exist = true ; 
                    // echo $idprogramme;
            }
        }
        if($exist){
            if($status=="plus"){
                $panier[$ProductIndex]['nbrPlace']++;
                $nrPlaceActu=$panier[$ProductIndex]['nbrPlace'];
                $panier[$ProductIndex]['prix']=$nbrPlaceActu*$prix;
                $_SESSION['panier']=$panier;
                // exit(json_encode(['updated'=>true,'connected'=>true]));
            }
            if($status=="minus"){
                $nbrPlace = $panier[$ProductIndex]['nbrPlace'];
                if($nbrPlace >=1){
                $panier[$ProductIndex]['nbrPlace']--;
                $nrPlaceActu=$panier[$ProductIndex]['nbrPlace'];
                $panier[$ProductIndex]['prix']=$nbrPlaceActu*$prix;
                $_SESSION['panier'] = $panier;
                // exit(json_encode(['updated'=>true,'connected'=>true]));
            }else{
                $_SESSION['panier'] = $panier;
                // exit(json_encode(['updated'=>false,'connected'=>true]));
                }
            }
            var_dump($_SESSION['panier']);
            
        }
        if(!$exist){
        // exit(json_encode(['updated'=>false,'connected'=>true]));
        }

    }else{
        exit(json_encode(['updated'=>false,'connected'=>false]));
    }
}