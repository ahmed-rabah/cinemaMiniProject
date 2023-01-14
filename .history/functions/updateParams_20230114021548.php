<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    function validateUsername(string $str) {
        return preg_match('/^[a-zA-Z]/', $str) && strlen($str) >= 4 && preg_match('/^[a-zA-Z][0-9a-zA-Z_-]*$/', $str);
      }
      function only_nums_and_chars(string $str) {
        return preg_match('/^[0-9a-zA-Z_-]*$/', $str);
      }
      
    session_start();
    if(isset($_SESSION['user_id'])){
        require_once './database.php';
                    if(!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['newpassword'])&& !empty($_POST['confirmerpassword'])){
                            if($_POST['username'] != $_SESSION['username']){
                                exit(json_encode(['updated'=>false,'connected'=>true,"response"=>"différent utilisateurs"]));
                            }
                            $iduser = $_SESSION['user_id'];
                            if (empty($username)) {
                                exit(json_encode(['updated'=>false,'connected'=>true,"response"=>"le champs username est obligatoire"]));
                            }elseif (! validateUsername($username) && ! only_nums_and_chars($username)) {
                                exit(json_encode(['updated'=>false,'connected'=>true,"response"=>"les caractéres spéciaux ne sont pas validés"]));
                            }elseif ( ! validateUsername($username) && only_nums_and_chars($username)) {
                                exit(json_encode(['updated'=>false,'connected'=>true,"response"=>"username doit commencé par un charactère (et taille > 4"]));
                            }else{
                            $user = $pdo->quote($username);
                            $query = $pdo->query("SELECT * FROM user WHERE username=$user");
                            $res  = $query->fetch();
                            if($res && $res["idUser"] != $iduser){
                                exit(json_encode(['updated'=>false,'connected'=>true,"response"=>"username existe déja"]));  
                            }
                            }
                            $password = $_POST['password'];
                            $req = "SELECT userName , password FROM user WHERE idUser = $iduser";
                            $query = $pdo->query($req);
                            if($query->rowCount() > 0){
                                $result= $query->fetch(PDO::FETCH_ASSOC);
                                // exit(json_encode(['updated'=>false,'connected'=>false,"response"=>"lma frkabi"]));
                                    if(password_verify($password,$result['password'])){
                                        $newPassword=$_POST['newpassword'];
                                        $confirmPassword=$_POST['confirmerpassword'];
                                        if(strlen($newPassword)==0){
                                            exit(json_encode(['updated'=>false,'connected'=>true,"response"=>"le champs password est obligatoire"]));
                                        }elseif(preg_match('/[A-Z]/', $newPassword) == false){
                                            exit(json_encode(['updated'=>false,'connected'=>true,"response"=>"Le mot de passe doit contenir au moins une lettre majuscule."]));
                                        }elseif(!preg_match('/[a-z]/', $newPassword)){
                                           exit(json_encode(['updated'=>false,'connected'=>true,"response"=>"Le mot de passe doit contenir au moins une lettre miniscule."]));
                                        }elseif(!preg_match('/[0-9]/', $newPassword)){
                                           exit(json_encode(['updated'=>false,'connected'=>true,"response"=> "Le mot de passe doit contenir au moins un chiffre."]));
                                        }elseif(!preg_match('/[!@#$%^&*()_+=-]/',$newPassword)){
                                            exit(json_encode(['updated'=>false,'connected'=>true,"response"=> "Le mot de passe doit contenir au moins un caractère special."]));
                                        }elseif(strlen($newPassword) < 8 ){
                                        exit(json_encode(['updated'=>false,'connected'=>true,"response"=>"Le mot de passe doit comporter au moins 8 caractères."]));
                                        }else{
                                            if(strlen($confirmPassword) == 0){
                                                exit(json_encode(['updated'=>false,'connected'=>true,"response"=>"le champs de confirmation mot de passe est obligatoire"]));
                                                }elseif ($confirmPassword != $newPassword) {
                                                    exit(json_encode(['updated'=>false,'connected'=>true,"response"=>"les deux nouveaux mots de passes ne sont pas identiques"]));
                                                }elseif($confirmPassword == $newPassword) {
                                                    $hash = password_hash($newPassword, PASSWORD_DEFAULT);

                                                    $updateUser = $pdo->prepare("UPDATE user set password = ? WHERE idUser=?");
                                                    $updateUser->execute([$hash,$iduser]);
                                                    if($updateUser->rowCount() > 0){
                                                        exit(json_encode(['updated'=>true,'connected'=>true,"response"=>"les cordonnées sont mis-à-jour"]));
                                                    }else{
                                                        exit(json_encode(['updated'=>false,'connected'=>true,"response"=>"on a pas pu effectuer les changements"]));
                                                    }
                                                } else{
                                                      exit(json_encode(['updated'=>false,'connected'=>true,"response"=>"something went wrong"]));
                                                } 

                                        }
                                    }else{
                                        exit(json_encode(['updated'=>false,'connected'=>true,"response"=>"mot de passe actuel est incorrecte"]));
                                    }
                            }else{
                                exit(json_encode(['updated'=>false,'connected'=>true,"response"=>"utilisateur inconnu"]));
                            }
                    }else{
                        exit(json_encode(['updated'=>false,'connected'=>true,"response"=>"tous les champs sont obligatoire"]));

                    }

    }else{
        exit(json_encode(['updated'=>false,'connected'=>false,"response"=>"vous n'êtes pas connecté"]));
    }

}else{
    exit(json_encode(['updated'=>false,'connected'=>false,"response"=>"mauvaise requête"]));
}
