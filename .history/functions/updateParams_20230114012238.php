<?php

if($SERVER['REQUEST_METHOD'] == 'POST'){
    session_start();
    if(isset($_SESSION['user_id'])){
        require_once './database.php';
                    if(!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['newpassword'])&& !empty($_POST['confirmerpassword'])){
                            $iduser = $_SESSION['user_id'];
                            $password = $_POST['password'];
                            $req = "SELECT userName , password FROM user WHERE userName =";
                            $query= $pdo->query($req);
                            if($query->rowCount()>0){
                                $result= $query->fetch(PDO::FETCH_ASSOC);
                                    if(password_verify($_POST['password'],$result['password'])){
                                        $newPassword=$_POST['newpassword'];
                                        $confirmPassword=$_POST['confirmerpassword'];
                                        if(strlen($newPassword)==0){
                                            exit(json_encode(['complited'=>false,'connected'=>true,"response"=>"le champs password est obligatoire";
                                        }elseif(preg_match('/[A-Z]/', $newPassword) == false){
                                            exit(json_encode(['complited'=>false,'connected'=>true,"response"=>"Le mot de passe doit contenir au moins une lettre majuscule.";
                                        }elseif(!preg_match('/[a-z]/', $newPassword)){
                                           exit(json_encode(['complited'=>false,'connected'=>true,"response"=>"Le mot de passe doit contenir au moins une lettre miniscule.";
                                        }elseif(!preg_match('/[0-9]/', $newPassword)){
                                           exit(json_encode(['complited'=>false,'connected'=>true,"response"=> "Le mot de passe doit contenir au moins un chiffre.";
                                        }elseif(!preg_match('/[!@#$%^&*()_+=-]/',$newPassword)){
                                            exit(json_encode(['complited'=>false,'connected'=>true,"response"=> "Le mot de passe doit contenir au moins un caractère special.";
                                        }elseif(strlen($newPassword) < 8 ){
                                        exit(json_encode(['complited'=>false,'connected'=>true,"response"=>"Le mot de passe doit comporter au moins 8 caractères."]));
                                    }
                                    }else{
                                        exit(json_encode(['complited'=>false,'connected'=>true,"response"=>"mot de passe actuel est incorrecte"]));
                                    }
                            }else{
                                exit(json_encode(['complited'=>false,'connected'=>true,"response"=>"utilisateur inconnu"]));
                            }
                    }else{
                        exit(json_encode(['complited'=>false,'connected'=>true,"response"=>"tous les champs sont obligatoire"]));

                    }

    }else{
        exit(json_encode(['complited'=>false,'connected'=>false,"response"=>"vous n'êtes pas connecté"]));
    }

}else{
    exit(false);
}
