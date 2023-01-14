<html>
<head>
   <title>Films</title>
   <style>

   table {
      border-collapse: collapse;
      width: 100%;
    }

    th, td {
      text-align: left;
      padding: 8px;
    }

    tr:nth-child(even){background-color: #black}

    th {
      background-color: #4CAF50;
      color: white;
    }
 img {
    width: 200px;
    height: auto;
    border: 1px solid rgba(255, 255, 255, 0.014);
    margin-bottom: 10px;
 }
  </style>
</head>
<body>
   <?php

// Connexion à la base de données
$host = "localhost";
$user = "root";
$password = "";
$dbname = "moviedb";

$conn = mysqli_connect($host, $user, $password, $dbname);

// Vérifier la connexion
if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
}

// Requête pour récupérer les films de la base de données
$sql = "SELECT titre, resume , photo, date_sortie FROM film";
$result = mysqli_query($conn, $sql);

echo "<table>";
echo "<tr>";
echo "<th>titre</th>";
echo "<th>resume</th>";
echo "<th>photo</th>";
echo "<th>date_sortie</th>";
echo "</tr>";

if (mysqli_num_rows($result) > 0) {
   // Affichage des films
   while($row = mysqli_fetch_assoc($result)) {
      echo "<tr>";
      echo "<td>" . $row["titre"]. "</td>";
      echo "<td>" . $row["resume"]. "</td>";
      echo "<td><img src='.." . $row["photo"]. "' alt='Movie Image'></td>";
      echo "<td>" . $row["date_sortie"]. "</td>";
      echo "</tr>";
   }
} else {
   echo "<tr><td colspan='4'>Aucun film trouvé</td></tr>";
}

echo "</table>";

// Fermeture de la connexion
mysqli_close($conn);
?>
</body>
</html>