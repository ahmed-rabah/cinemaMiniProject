<?php

// Récupération des données du formulaire
$idFilm = $_POST['idFilm'];
$idGenre = $_POST['idGenre'];
$titre = $_POST['titre'];
$cast = $_POST['cast'];
$date_sortie = $_POST['date_sortie'];
$duree = $_POST['duree'];
$resume = $_POST['resume'];
$en_cours_de_projection = $_POST['en_cours_de_projection'];

$trailer = $_POST['trailer'];

$fileName = $_FILES["photo"]["name"];
    $destination = "../images/".$fileName;
    $des = "./images/".$fileName;
    $pathinfo = pathinfo($_FILES["photo"]["name"]);
    $file = explode(".",$fileName);
    print_r($file);
    print_r($pathinfo);
    // setcookie('fileName',$pathinfo["filename"],time()+120);
    // echo $_COOKIE['fileName'];

    copy($_FILES["photo"]["tmp_name"],$destination);
    move_uploaded_file($_FILES["photo"]["tmp_name"], $destination);


// Connexion à la base de données
$db = mysqli_connect("localhost", "root", "", "moviedb");

// Mise à jour de l'utilisateur dans la base de données
$sql = "INSERT INTO `film`(`idFilm`, `idGenre`, `titre`, `cast`, `date_sortie`, `duree`, `resume`, 
`en_cours_de_projection`, `photo`, `trailer`) 
VALUES ('$idFilm','$idGenre','$titre','$cast','$date_sortie','$duree','$resume',
'$en_cours_de_projection','$destination','$trailer')";
mysqli_query($db, $sql);

// Redirection vers la page de gestion des utilisateurs
header("Location: home2.php");

?>
