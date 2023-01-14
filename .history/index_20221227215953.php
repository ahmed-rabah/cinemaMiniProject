<?php
try {
    $user='root';
    $password="";
    $db = new PDO('mysql:host=localhost;dbname=moviedb', $user, $password);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

$images = $db->query("SELECT photo from film");
$images = $images->fetchAll(MYSQLI_NUM);
// var_dump($images);

foreach ($images as $image){
    echo "<img src=\"".$image["photo"]."\" >";
}