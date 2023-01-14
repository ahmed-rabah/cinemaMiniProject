<?php


if($_SERVER['REQUEST_METHOD'] == 'GET'){
    session_start();
    if(!empty($_GET['status']) && !empty($_GET['idProgramme']) && isset($_SESSION['user_id'])){
        $iduser = $_SESSION['user_id'];
        $idprogramme = $_GET['idProgramme'];
        $status = $_GET['status'];
        $panier = $_SESSION['panier'];
        $ProductIndex = 0 ; 
        $exist = false ; 
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
                $_SESSION['panier']=$panier;
                exit(json_encode(['updated'=>true,'connected'=>true]));
            }
            if($status=="minus"){
                $nbrPlace = $panier[$ProductIndex]['nbrPlace'];
                if($nbrPlace >=1){
                $panier[$ProductIndex]['nbrPlace']--;
                $_SESSION['panier'] = $panier;
                    //  exit(json_encode(['updated'=>true,'connected'=>true]));
                }
            }
            var_dump($panier);
            
        }
        if(!$exist){
        exit(json_encode(['updated'=>false,'connected'=>true]));
        }

    }else{
        exit(json_encode(['updated'=>false,'connected'=>false]));
    }
}