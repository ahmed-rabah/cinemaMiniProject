<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    require_once "./database.php";    
    require_once "./validationFunctions.php";    
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
    if(strlen($confirmer_password) == 0){
        $erreursArr['confirmer_password']="le champs de confirmation mot de passe est obligatoire";
        }elseif ($confirmer_password != $password) {
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
    }else{
        echo "no errors found";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/signup.css">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <title>s'enregistrer</title>
</head>
<body class="bg-dark bg-opacity-25">
    <div class="centered py-3 px-5 rounded bg-light shadow-lg p-3 mb-5">
        <h2 class="text-center m-1">inscription des utilisateurs</h2>
        <form action="./functions/signup_processing.php" method="post" id="user_signup" autocomplete="off" novalidate>
            <fieldset>
                <div class="form-group">
                    <label for="username" class="form-label mt-1">Username</label>
                    <input type="text" class="form-control" name="username" aria-describedby="usernamedesc" id="username"  placeholder="Enter username">
                    <small id="usernamedesc" class="form-text"></small>
                </div>
                <div class="form-group">
                    <label for="email" class="form-label mt-1">Email address</label>
                    <input type="email" class="form-control" name="email" id="email" aria-describedby="emaildesc" placeholder="Enter email">
                    <small id="emaildesc" class="form-text">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="password" class="form-label mt-1">Password</label>
                    <input type="password" class="form-control" name="password" aria-describedby="pwddesc" id="password" placeholder="Password" value="w">
                    <small id="pwddesc" class="form-text"></small>
                </div>
                <div class="form-group">
                    <label for="confirmer_password" class="form-label mt-1">confirmer password</label>
                    <input type="password" class="form-control" name="confirmer_password" aria-describedby="cpwddesc" id="confirmer_password" placeholder="confirmer password">
                    <small id="cpwddesc" class="form-text"></small>
                </div>
                
                <button type="submit" class="btn btn-primary mt-2" id="submit-button">Submit</button>
            </fieldset>
        </form>
        </div>

<script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>