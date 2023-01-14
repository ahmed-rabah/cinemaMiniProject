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
$sql = "INSERT INTO programme (`idProgramme`, `idFilm`, `date_projection`, `heure_debut`, `num_salle`, `ticketsDisponible`, `prix_unitaire`) VALUES ('$id', '$idFilm', '$date_projection'
, '$heure_debut', '$num_salle', '$ticketsDisponible','$prix_unitaire' )";
mysqli_query($db, $sql);

// Redirection vers la page de gestion des utilisateurs
header("Location: programmehome.php");

?>
