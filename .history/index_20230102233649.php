<?php
//  session_start();
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
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="icon" href="./logoCinema.png">
    <title>CinemaTy</title>
    <style>
        body{
            height: 1000vh;
        }
    </style>
</head>
<body>
    <header>
        <?php include './header.php'; ?>
        <div id="carouselExampleFade" class="carousel slide carousel-fade h-50" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="./images/salles/salle2.png" style ="height: 40vh; width: 20vw ;" class="d-block" alt="...">
    </div>
    <div class="carousel-item">
      <img src="..." class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="..." class="d-block w-100" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
    </header>

<script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="./javascript/index.js"></script>
</body>
</html>