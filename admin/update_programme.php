<?php

// Récupération des données du formulaire
$id = $_POST['idProgramme'];
$idFilm = $_POST['idFilm'];
$date_projection = $_POST['date_projection'];
$heure_debut = $_POST['heure_debut'];
$num_salle = $_POST['num_salle'];
$ticketsDisponible = $_POST['ticketsDisponible'];
$prix_unitaire = $_POST['prix_unitaire'];




// Connexion à la base de données
$db = mysqli_connect("localhost", "root", "", "moviedb");

// Mise à jour de l'utilisateur dans la base de données
$sql = "UPDATE programme SET idProgramme='$idProgramme', idFilm='$idFilm', date_projection='$date_projection'
, heure_debut='$heure_debut', num_salle='$num_salle', ticketsDisponible='$ticketsDisponible',
 prix_unitaire='$prix_unitaire' WHERE idProgramme='$id'";
mysqli_query($db, $sql);

// Redirection vers la page de gestion des utilisateurs
header("Location: programmehome.php");

?>
