<?php
require "./functions/database.php";
$images = $pdo->query("SELECT photo from film");
$images = $images->fetchAll(MYSQLI_NUM);
// var_dump($images);
echo $_SESSION["user_id"];
foreach ($images as $image){
    echo "<img src=\"".$image["photo"]."\" >";
}