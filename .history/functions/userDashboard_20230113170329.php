<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if(isset($_SESSION['user_id'])) {
        $iduser=$_SESSION['user_id'];
            $req = "SELECT * FROM produit WHERE id_user=$iduser" 
    }else{
        exit(json_encode(['success'=>false,'connected'=>false,"response"=>"vous n'êtes pas connecté"]));
    }
    
}else{
    exit(json_encode(['success'=>false,'connected'=>true,"response"=>"seulement les requêtes Get sont validés"]));
}