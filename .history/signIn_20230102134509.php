<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // var_dump($_POST);
    $username = $_POST["username"] ?? "";
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
    <form action="./signin.php" method="post" id="user_signin" autocomplete="off" class="p-1">
            <fieldset>
                <div class="form-group mt-2">
                    <label for="username" class="form-label mt-1">Username</label>
                    <input type="text" class="form-control" name="username" aria-describedby="usernamedesc" id="username"  placeholder="Enter username">
                    <small id="usernamedesc" class="form-text"></small>
                </div>
                <div class="form-group mt-2">
                    <label for="password" class="form-label mt-1">Password</label>
                    <input type="password" class="form-control" name="password" aria-describedby="pwddesc" id="password" placeholder="Password">
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