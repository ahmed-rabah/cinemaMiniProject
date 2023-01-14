<?php

// Récupération des données du formulaire
$idFilm = $_POST['idFilm'];
$idGenre = $_POST['idGenre'];
$titre = $_POST['titre'];
$cast = $_POST['cast'];
$date_sortie = $_POST['date_sortie'];
$duree = $_POST['duree'];
$resume = $_POST['resume'];
// $en_cours_de_projection = $_POST['en_cours_de_projection'];
// $photo = $_FILES['photo']['tmp_name'];
// $photo_data = file_get_contents($photo);
$trailer = $_POST['trailer'];
$fileName = $_FILES["photo"]["name"];
$destination = "./images/".$fileName;
$pathinfo = pathinfo($_FILES["photo"]["name"]);
$file = explode(".",$fileName);
print_r($file);
print_r($pathinfo);
// setcookie('fileName',$pathinfo["filename"],time()+120);
// echo $_COOKIE['fileName'];

copy($_FILES["photo"]["tmp_name"],$destination);
move_uploaded_file($_FILES["photo"]["tmp_name"], $destination);

var_dump($_POST);
var_dump($_FILES);
$db = mysqli_connect("localhost", "root", "", "moviedb");

if (empty($_FILES)&& empty($date_sortie))
{ 
    $sql = "UPDATE film SET idFilm='$idFilm', idGenre='$idGenre' , 
    titre='$titre' ,cast='$cast',duree='$duree',resume='$resume',trailer='$trailer'
      WHERE idFilm='$idFilm'";
} elseif (empty($_FILES)&& !empty($date_sortie))
{
    $sql = "UPDATE film SET idFilm='$idFilm', idGenre='$idGenre' , 
    titre='$titre' ,cast='$cast',date_sortie='$date_sortie',duree='$duree',resume='$resume',trailer='$trailer'
      WHERE idFilm='$idFilm'";
}
elseif (empty($date_sortie)&& !empty($_FILES))
{
    $sql = "UPDATE film SET idFilm='$idFilm', idGenre='$idGenre' , 
    titre='$titre' ,cast='$cast',photo='$destination',duree='$duree',resume='$resume',trailer='$trailer'
      WHERE idFilm='$idFilm'";
}
else {
// Mise à jour de l'utilisateur dans la base de données
$sql = "UPDATE film SET idFilm='$idFilm', idGenre='$idGenre' , 
titre='$titre' ,cast='$cast',date_sortie='$date_sortie'
,duree='$duree',resume='$resume', 
photo='$destination',trailer='$trailer'  WHERE idFilm='$idFilm'";
}
mysqli_query($db, $sql);
 header("Location: home2.php");

?>
