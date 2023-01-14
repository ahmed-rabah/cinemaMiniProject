<?php

// Récupération des données du formulaire
$username = $_POST['username'];
$Current_password = $_POST['Current_password'];
$password = $_POST['password'];

// Hachage du mot de passe
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Connexion à la base de données
$db = mysqli_connect("localhost", "root", "", "moviedb");

$query 		= mysqli_query($db, "SELECT * FROM admin");
			$row		= mysqli_fetch_array($query);
			$num_row 	= mysqli_num_rows($query);

			
			if ($num_row > 0) 
				{	
					if ($Current_password === $row['password']) {
// Mise à jour de l'utilisateur dans la base de données
							$sql = "UPDATE admin SET username='$username',  password='$hashed_password'";
							mysqli_query($db, $sql);

							// Redirection vers la page de gestion des utilisateurs
							header("Location: home2.php");
                    }}
                    else
				{
					echo 'Current Password invalid';
				}
  ?>
