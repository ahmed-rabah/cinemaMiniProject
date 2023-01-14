<?php
session_start();
require "./functions/database.php";
$images = $pdo->query("SELECT photo from film");
$images = $images->fetchAll(MYSQLI_NUM);
foreach ($images as $image){
    echo "<img src=\"".$image["photo"]."\" >";
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>