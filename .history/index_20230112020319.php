<?php
 session_start();
//  require "./functions/database.php";
//  $images = $pdo->query("SELECT photo from film");
//  $images = $images->fetchAll(MYSQLI_NUM);
//  foreach ($images as $image){
//     echo "<img src=\"".$image["photo"]."\" >";
// }?>
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
    <main class="">
        <?php  include_once './homeSearchSection.php'; ?>
        <section class="d-flex justify-content-around flex-wrap mt-4 mx-5 bg-dark border border-3 border-light rounded p-2" style="box-shadow: 0 0 2rem black;" id="programms">
        </section>
    </main>
    <div class="absoluteCart m-2 p-1"></div>
    
    <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./javascript/panie.js"></script> 
    <script src="./javascript/progrmesSearch.js"></script>
</body>
</html>