<?php
// Établissement de la connexion à la base de données
$host = "localhost";
$user = "root";
$password = "";
$dbname = "moviedb";

$conn = mysqli_connect($host, $user, $password, $dbname);

// Vérification de la connexion
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Récupération de l'ID de l'utilisateur à partir de l'URL
$id = $_POST['idUser'];

// Création de la requête SQL pour supprimer l'utilisateur
$sql = "DELETE FROM user WHERE idUser=$id";

// Exécution de la requête et vérification du résultat
if (mysqli_query($conn, $sql)) {
    echo "Utilisateur supprimé avec succès";
    header("Location: userhome.php");

} else {
    echo "Erreur lors de la suppression de l'utilisateur: " . mysqli_error($conn);
}

// Fermeture de la connexion
mysqli_close($conn);
?>
