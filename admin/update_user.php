<?php

// Récupération des données du formulaire
$id = $_POST['id'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

// Hachage du mot de passe
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Connexion à la base de données
$db = mysqli_connect("localhost", "root", "", "moviedb");

// Mise à jour de l'utilisateur dans la base de données
$sql = "UPDATE user SET userName='$username', email='$email', password='$hashed_password' WHERE idUser='$id'";
mysqli_query($db, $sql);

// Redirection vers la page de gestion des utilisateurs
header("Location: userhome.php");

?>
