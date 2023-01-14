<?php

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    session_start();
    if(!empty($_GET['idProgramme']) && isset($_SESSION['user_id'])){
        $iduser = $_SESSION['user_id'];
        $idprogramme = $_GET['idProgramme'];
        $panier = $_SESSION['panier'];
        $ProductIndex = 0 ; 
        $exist = false ; 
        for ($i=0; $i <sizeof($panier) ; $i++) { 
            if($panier[$i]['idProgramme'] == $idprogramme){
                    $ProductIndex = $i ; 
                    $exist = true ; 
                    echo $idprogramme;
            }
        }
        
        // require_once './database.php';
        // $req = "DELETE FROM produit WHERE id_produit=:product";
        // $stmt=$pdo->prepare($req);
        // $stmt->bindParam(':product', $product, PDO::PARAM_INT);
        // $stmt->execute();
        
        // if ($stmt->rowCount() > 0) {
        //     exit(json_encode(true));
        // } else {
        //     exit(json_encode(false));
        // }
    }else{
        exit(json_encode(['deleted'=>false,'connected'=>false]));
    }
    }else{
        echo "not a get method";
    }