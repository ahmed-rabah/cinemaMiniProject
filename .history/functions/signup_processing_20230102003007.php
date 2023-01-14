<?php
require_once "./database.php";    
require_once "./validationFunctions.php";    

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username= $_POST['username'] ?? "";
    $email= $_POST['email'] ?? "";
    $password= $_POST['password'] ?? "";
    $confirmer_password= $_POST['confirmer_password'] ?? "";
    $erreursArr=[];
    if (empty($username)) {
            $erreursArr['username']="le champs username est obligatoire";
        }elseif (! validateUsername($username) && ! only_nums_and_chars($username)) {
            $erreursArr['username']="les caractéres spéciaux ne sont pas validés";
        }elseif ( ! validateUsername($username) && only_nums_and_chars($username)) {
        $erreursArr["username"]="username doit commencé par un charactère (et taille > 4)";
        }else{
        $user = $pdo->quote($username);
        $query = $pdo->query("SELECT * FROM user WHERE username=$user");
        $res  = $query->fetch();
        if($res){
            $erreursArr['username']="username existe déja";   
        }
        }
    if ($email =="") {
            $erreursArr['email']="le champs email est obligatoire";
        }else if(filter_var($email, FILTER_VALIDATE_EMAIL) == false){
            $erreursArr['email']="l'email est incorrecte \n exemples : username@exemple.com";
         }else{
            $mail = $pdo->quote($email);
            $query = $pdo->query("SELECT * FROM user WHERE email=$mail");
            $resultat  = $query->fetch();
            if($resultat){
                $erreursArr['email']="email existe déja";   
            }
        }  
    if(strlen($password)==0){
            $erreursArr['password']="le champs password est obligatoire";
        }elseif(preg_match('/[A-Z]/', $password) == false){
            $erreursArr['password']= "Le mot de passe doit contenir au moins une lettre majuscule.";
        }elseif(!preg_match('/[a-z]/', $password)){
            $erreursArr['password']= "Le mot de passe doit contenir au moins une lettre miniscule.";
        }elseif(!preg_match('/[0-9]/', $password)){
            $erreursArr['password']= "Le mot de passe doit contenir au moins un chiffre.";
        }elseif(!preg_match('/[!@#$%^&*()_+=-]/',$password)){
            $erreursArr['password']= "Le mot de passe doit contenir au moins un caractère special.";
        }elseif(strlen($password) < 8 ){
        $erreursArr['password']="Le mot de passe doit comporter au moins 8 caractères.";
    }
    if(strlen($confirmer_password) === 0){
        $erreursArr['confirmer_password']="le champs de confirmation mot de passe est obligatoire";
        }
     if ($confirmer_password != $password) {
            $erreursArr['confirmer_password']="les deux mots de passes ne sont pas identiques";
    }

    if(sizeof($erreursArr) > 0) {
        echo "<table>";
        foreach($erreursArr as $key => $value):
                echo "<tr>
                        <th style=\"border:1px solid black;\">$key</th>
                        <td style=\"border:1px solid black;\">$value</td>
                      </tr>";
        endforeach;    
        echo "</table>";
    }
}