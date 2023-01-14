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
        // var_dump($panier);
        for ($i=0; $i <sizeof($panier) ; $i++) { 
            if($panier[$i]['idProgramme'] == $idprogramme){
                    $ProductIndex = $i ; 
                    $exist = true ; 
                    // echo $idprogramme;
            }
        }
        if($exist){
            if($status=="plus"){
                $panier[$i]['nbrPlace']++;
            }
            if($status=="minus"){
                $nbrPlace = $panier[$i]['nbrPlace'];
                if($nbrPlace >=1){
                $panier[$i]['nbrPlace']--;
                }
            }
            var_dump($panier);
        }

    }else{
        exit(json_encode(['updated'=>false,'connected'=>false]));
    }
}