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
            <section class="d-flex justify-content-around flex-wrap mt-4 mx-5 bg-light border border-3 border-light rounded p-2" style="box-shadow: 0 0 3rem black;" id="dashboard">
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
                    <div class="tab-pane fade active show bg-dark p-4 rounded" id="param" role="tabpanel">
                        <form action="./functions/updateParams.php" method="post"  autocomplete="off" class="p-5 w-50 m-auto bg-light rounded" id="update-form">
                                <h3 class="text-center fs-2 fw-bolder">changer le mot de passe</h3>
                                <div id="errors"></div>
                                <fieldset>
                                <div class="form-group mt-2">
                                    <fieldset disabled="">
                                        <label class="form-label fs-5 fw-bolder" for="username">username</label>
                                        <input class="form-control mt-1" id="username" name="username" type="text"   value="<?= $username ?>" disabled="">
                                    </fieldset>
                                    </div>

                                    <div class="form-group mt-2">
                                        <label for="password" class="form-label fs-5 fw-bolder mt-1">Password actuel</label>
                                        <input type="password" class="form-control" name="password"  id="password" placeholder="Password"  value="">
                                    </div> 
                                    <div class="form-group mt-2">
                                        <label for="new-password" class="form-label fs-5 fw-bolder mt-1">nouveau Password</label>
                                        <input type="password" class="form-control" name="new-password"  id="new-password" placeholder="nouveau Password"  value="">
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="confirm-password" class="form-label fs-5 fw-bolder mt-1">confirmer nouveau Password</label>
                                        <input type="password" class="form-control" name="confirm-password"  id="confirm-password" placeholder="confirmer nouveau Password"  value="">
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mt-4">
                                        <button type="submit" class="btn btn-primary" id="loginBtn">appliquer les changements</button>
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