<?php

if($SERVER['REQUEST_METHOD'] == 'POST'){
    session_start();
    if(isset($_SESSION['user_id'])){
        require_once './database.php';
                    if(!empty($_POST['username']) && !empty($_POST['password'])){
                            $iduser = $_SESSION['user_id'];
                            $password = $_POST['password'];
                            $req = "SELECT userName , password FROM user WHERE userName =";
                            $query= $pdo->query($req);
                            if($query->rowCount()>0){

                            }else{
                                exit(json_encode(['complited'=>false,'connected'=>true,"response"=>"utilisateur inconnu"]));
                            }
                    }else{
                        exit(json_encode(['complited'=>false,'connected'=>true,"response"=>"données POST vide"]));

                    }

    }else{
        exit(json_encode(['complited'=>false,'connected'=>false,"response"=>"vous n'êtes pas connecté"]));
    }

}else{
    exit(false);
}
