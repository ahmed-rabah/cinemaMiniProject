<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if(isset($_SESSION['user_id'])) {
        require_once './database.php';
        $iduser=$_SESSION['user_id'];
            $req = "SELECT p.*, prog.date_projection , prog.heure_debut , prog.num_salle , f.titre , f.photo FROM produit as p,commande as c, programme as prog , film as f WHERE p.id_user=11 AND p.id_commande= c.id_commande AND p.id_programme = prog.idProgramme AND prog.idFilm = f.idFilm";
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