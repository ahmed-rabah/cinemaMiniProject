<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    require_once "./functions/database.php"; 
    function validateUsername(string $str) {
        return preg_match('/^[a-zA-Z]/', $str) && strlen($str) >= 4 && preg_match('/^[a-zA-Z][0-9a-zA-Z_-]*$/', $str);
      }
      function only_nums_and_chars(string $str) {
        return preg_match('/^[0-9a-zA-Z_-]*$/', $str);
      }
          
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
     function erreursTable($erreursArr){
        echo "<table class=\"table w-100 table-striped table-light table-hover\">
        <thead class=\"table-danger\">
          <tr>
            <th scope=\"col\">#</th>
            <th scope=\"col\">First</th>
          </tr>
        </thead>
        <tbody>";
        foreach($erreursArr as $key => $value):
                echo "<tr>
                        <th>$key</th>
                        <td class=\"text-danger \">$value</td>
                      </tr>";
        endforeach;    
        echo "  </tbody>
                 </table>";
     }
       
    }else{
        $hash = password_hash($password, PASSWORD_DEFAULT);
        // $username =$pdo->quote($username);
        // $email = $pdo->quote($email);
        // $hash =$pdo->quote($hash);
        $addUser = $pdo->prepare("INSERT INTO user(userName, email, password) VALUES(?, ?, ?)");
        $addUser->execute([$username,$email,$hash]);
        if($addUser->rowCount() > 0){
            $userAdded=true ; 
        }
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
         <?php
            if (isset($userAdded) && $userAdded=true) {
              echo"  <div class=\"alert alert-dismissible alert-success\">
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
                <strong>vous êtes inscrit avec succés</strong> <a href=\"./signIn.php\" class=\"alert-link text-primary\">se connecter</a>.
                </div>";
            }
         ?>
        <form action="./signup.php" method="post" id="user_signup" autocomplete="off" novalidate>
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
                <div class="d-flex justify-content-between align-items-cente mt-2">
                    <button type="submit" class="btn btn-primary" id="submit-button">s'inscrire</button>
                    <a href="./signIn.php" class="text-decoration-none pt-1">Se connecter</a>
                </div>
            </fieldset>
        </form>
        </div>
        <?php
    if(isset($erreursArr) && sizeof($erreursArr) > 0):
        ?>
    <div class="toast show w-50 centered" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <strong class="me-auto">vous avez des erreurs</strong>
            <button type="button" class="btn-close ms-2 mb-1" data-bs-dismiss="toast" aria-label="Close">
            <span aria-hidden="true"></span>
            </button>
        </div>
        <div class="toast-body">
            <?php erreursTable($erreursArr) ?>
        </div>
     </div>
     <?php endif;?>
<script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="./javascript/signup.js"></script>
</body>
</html>