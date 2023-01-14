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
                $nbrPlaceActu=$panier[$ProductIndex]['nbrPlace'];
                $panier[$ProductIndex]['prix']=$nbrPlaceActu*$prix;
                if($nbrPlaceActu<=$ticketDispo){
                    $_SESSION['panier']=$panier;
                    exit(json_encode(['updated'=>true,'connected'=>true,'response'=>"une place est supprimée du panier avec succés"]));
                }else{
                    exit(json_encode(['updated'=>false,'connected'=>true,'response'=>"vous avez ateignez le nombre de tickets disponible pour ce programme : $ticketDispo places!!"]));
                }
            }
            if($status=="minus"){
                $nbrPlace = $panier[$ProductIndex]['nbrPlace'];
                if($nbrPlace >=1){
                $panier[$ProductIndex]['nbrPlace']--;
                $nbrPlaceActu=$panier[$ProductIndex]['nbrPlace'];
                $panier[$ProductIndex]['prix']=$nbrPlaceActu*$prix;
                $_SESSION['panier'] = $panier;
                exit(json_encode(['updated'=>true,'connected'=>true,'response'=>"une place est ajoutée au panier  avec succés"]));
                }else{
                $_SESSION['panier'] = $panier;
                exit(json_encode(['updated'=>false,'connected'=>true,'response'=>'vous devez acheter au moins une ticket.<br>vous pouvez supprimer le programme en cliquant sur supprimé']));
                }
            }
            var_dump($_SESSION['panier']);
            
        }
        if(!$exist){
        exit(json_encode(['updated'=>false,'connected'=>true,'response'=>'le programme que vous voulez modifier est introuvable']));
        }

    }else{
        exit(json_encode(['updated'=>false,'connected'=>false]));
    }
}