<?php
 session_start();
if(!isset($_SESSION['user_id'])){
    header('Location:./signin.php');
}
$username =  $_SESSION['username'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="icon" href="./logoCinema.png">
    <title>CinemaTi</title>
</head>
<body class="bg-img3">

        <?php include './header.php'; ?>
        
        
        <main class="">
            <section class="d-flex justify-content-around flex-wrap mt-4 mx-5 bg-light border border-3 border-light rounded p-2" style="box-shadow: 0 0 2rem white;" id="dashboard">
                <ul class="nav nav-tabs w-100 justify-content-around" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active fs-4" data-bs-toggle="tab" href="#param" aria-selected="true" role="tab">paramètres</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link  fs-4" data-bs-toggle="tab" href="#produits" aria-selected="false" role="tab" tabindex="-1">produits</a>
                    </li>
                </ul>
                <div id="myTabContent" class="tab-content w-100 m-4">
                    <div class="tab-pane fade w-100" id="produits" role="tabpanel">
                    </div>
                    <div class="tab-pane fade active show" id="param" role="tabpanel">
                            <form action="./functions/updateParams.php" method="post"  autocomplete="off" class="p-1 w-50 m-auto">
                                <fieldset>
                                    <div class="form-group mt-2">
                                        <label for="username" class="form-label mt-1">Username</label>
                                        <input type="text" class="form-control" name="username" aria-describedby="usernamedesc" id="username"  placeholder="Enter username"  value="<?= $username ?>">
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
                </div>   
            </section>
         </main>
        <div class="absoluteCart m-2 p-1"></div>
    
    <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./javascript/panie.js"></script> 
    <script src="./javascript/dash.js"></script>
</body>
</html>