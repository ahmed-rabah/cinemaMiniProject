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
        .gradiant-bg{
            background-color: #ff8155;
    background-image : linear-gradient(to top,#ff6201 0% , #aa1191 100%) ; 
    background-clip: text;
    -webkit-background-clip: text;
    -moz-background-clip: text;
    -webkit-text-fill-color: transparent;
    -moz-text-fill-color: transparent;
    background-size: 100%;
    display : flex  ; 
    align-items: center ; 
    cursor : pointer ; 
    text-decoration: none;
        }
    </style>
</head>
<body>
    <header>
        <?php include './header.php'; ?>

    </header>

    <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./javascript/programmesSearch.js"></script>
</body>
</html>