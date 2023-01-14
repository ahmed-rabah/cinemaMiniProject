<?php
// Connexion à la base de données
$host = "localhost";
$username = "root";
$password = "";
$dbname = "moviedb";
$conn = mysqli_connect($host, $username, $password, $dbname);

// Vérification de la connexion
if (!$conn) {
    die("Erreur de connexion : " . mysqli_connect_error());
}

// Récupération de l'ID de l'utilisateur à mettre à jour
$id = $_POST['idUser'];

// Requête SELECT pour récupérer les données de l'utilisateur
$query = "SELECT * FROM user WHERE idUser = $id";
$result = mysqli_query($conn, $query);

// Vérification de la requête
if (!$result) {
    die("Erreur de requête : " . mysqli_error($conn));
}

// Récupération des données de l'utilisateur
$user = mysqli_fetch_assoc($result);
$username = $user['userName'];
$email = $user['email'];
$password = $user['password'];

// Fermeture de la connexion
mysqli_close($conn);
?>

<form method="post" action="update_user.php">
  <input type="hidden" name="id" value="<?php echo $id; ?>">
  <label for="username">Nom d'utilisateur :</label>
  <input type="text" name="username" value="<?php echo $username; ?>"><br>
  <label for="email">Adresse email :</label>
  <input type="email" name="email" value="<?php echo $email; ?>"><br>
  <label for="password">Mot de passe :</label>
  <input type="password" name="password" value="<?php echo $password; ?>"><br>
  <input type="submit" value="Mettre à jour">
</form>
<style>
form {
  width: 50%;
  margin: 0 auto;
  border: 1px solid #ccc;
  border-radius: 5px;
  padding: 20px;
}

label {
  display: block;
  margin-bottom: 8px;
  font-size: 18px;
}

input[type="text"],
input[type="email"],
input[type="password"] {
  width: 100%;
  padding: 12px 20px;
  margin-bottom: 20px;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
}

input[type="submit"] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type="submit"]:hover {
  background-color: #45a049;
}
</style>


