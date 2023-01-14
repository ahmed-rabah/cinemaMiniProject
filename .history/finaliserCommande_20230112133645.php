<?php
 session_start();
 $isEmptyCart = empty($_SESSION['panier']);
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
<body>
    <header>
        <?php include './header.php'; ?>

    </header>
    <main class="container" id="container">
        <?php if(!$isEmptyCart){ ?>
        <section class="" id="cartContainer"></section>
        <div class="alert alert-primary m-2 text-center" role="alert">
            <h2>prix total <span class="badge bg-success" id="totalPrice">200</span> DH</h2>
        </div>
        <form action="./functions/commanderProcess.php" method="post" class="d-flex justify-content-around align-items-center rounded bg-light mt-1 mx-2 py-2 px-5">
            <div class="form-group">
                <label for="cardNumber" class="form-label mt-4">numero de carte bancaire</label>
                <input type="text" class="form-control" id="cardNumber" aria-describedby="numberMsg" placeholder="Enter numero de carte bancaire">
                <small id="numberMsg" class="form-text text-muted">nous allons jamais partagé votre numéro de carte</small>
            </div>
            <div class="form-group">
                <label for="cardNumber" class="form-label mt-4">numero de carte bancaire</label>
                <input type="text" class="form-control" id="cardNumber" aria-describedby="numberMsg" placeholder="Enter numero de carte bancaire">
                <small id="numberMsg" class="form-text text-muted">nous allons jamais partagé votre numéro de carte</small>
            </div>
            <div class="form-group pt-2"><button type="submit" class="btn btn-success text-white"><strong>acheter</strong></button></div>
        </form>
    <?php } ?>
    </main>
    
    <div class="absoluteCart m-2 p-1"></div>

    <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./javascript/panie.js"></script> 
</body>
</html>