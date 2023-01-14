<?php
        session_start();
        if(isset($_SESSION['user_id'])){
            header("location:./index.php");
        }else{
$postMethod =$_SERVER["REQUEST_METHOD"] == "POST";
if($postMethod && isset($_POST["username"],$_POST["password"])){
    require_once './functions/database.php';
    $statement = $pdo->prepare("SELECT * FROM user WHERE username=?");
    $statement->execute([$_POST["username"]]);
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    $verified = false ; 
    if($result&& password_verify($_POST["password"],$result['password'])){
            $verified = true ;
            $_SESSION['user_id']= $result['idUser'];
            $_SESSION['username']= $result['username'];
            $_SESSION['expiration_date']=time()+604800;
            setcookie("username",$result['username'],time()+604800,"/");
            header("Location:./index.php");
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
    <title>se connecter</title>
</head>
<body class="bg-success bg-opacity-50">
<div class="centered rounded bg-light shadow-lg py-5 px-5 mb-5">
         <h3 class="text-center m-1">Accédez à votre compte</h3>
         <div class="alert alert-dismissible alert-danger">
              <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
              <strong>Nom d'utilisateur ou mot de passe invalide</strong><br>réessayez avec des informations de connexion correctes.
         </div>
    <form action="./signin.php" method="post" id="user_signin" autocomplete="off" class="p-1">
            <fieldset>
                <div class="form-group mt-2">
                    <label for="username" class="form-label mt-1">Username</label>
                    <input type="text" class="form-control" name="username" aria-describedby="usernamedesc" id="username"  placeholder="Enter username"  value="<?php if($postMethod):  echo $_POST['username']; else: echo ''; endif ?>">
                    <small id="usernamedesc" class="form-text"></small>
                </div>
                <div class="form-group mt-2">
                    <label for="password" class="form-label mt-1">Password</label>
                    <input type="password" class="form-control" name="password" aria-describedby="pwddesc" id="password" placeholder="Password"  value="<?php if($postMethod):  echo $_POST['password']; else: echo ''; endif ?>">
                    <small id="pwddesc" class="form-text"></small>
                </div> 
                <div class="d-flex justify-content-between align-items-center mt-4">
                    <button type="submit" class="btn btn-primary" id="loginBtn">se connecter</button>
                    <a href="./signup.php" class="text-decoration-none pt-1">S'inscrire</a>
                </div>               
            </fieldset>
        </form>
</div>

        <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
        <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="./javascript/signin.js"></script>
</body>
</html>
<?php  } ?>