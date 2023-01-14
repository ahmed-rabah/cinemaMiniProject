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
    <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./javascript/programmesSearch.js"></script>
    <script src="./javascript/panier.js"></script>
</body>
</html>