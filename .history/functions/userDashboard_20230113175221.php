<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if(isset($_SESSION['user_id'])) {
        require_once './database.php';
        $iduser=$_SESSION['user_id'];
            $req = "select p.*,c.prix_total from produit as p,commande as c where p.id_user=$iduser AND p.id_commande= c.id_commande" ;
            $stmt = $pdo->query($req);
            if($stmt->rowCount() >0){
                $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
            exit(json_encode(['success'=>true,'connected'=>true,"response"=>$response]));
            }else{
                exit(json_encode(['success'=>false,'connected'=>true,"response"=>"vous n'avez fait aucune commande"]));
            }
        }else{
        exit(json_encode(['success'=>false,'connected'=>false,"response"=>"vous n'êtes pas connecté"]));
    }
    
}else{
    exit(json_encode(['success'=>false,'connected'=>true,"response"=>"seulement les requêtes Get sont validés"]));
}