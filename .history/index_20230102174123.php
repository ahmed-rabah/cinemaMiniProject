<?php
session_start();
require "./functions/database.php";
$images = $pdo->query("SELECT photo from film");
$images = $images->fetchAll(MYSQLI_NUM);
var_dump($_SESSION);
foreach ($images as $image){
    echo "<img src=\"".$image["photo"]."\" >";
}