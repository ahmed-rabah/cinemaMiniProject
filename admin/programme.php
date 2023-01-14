<?php
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
$sql = "SELECT p.idProgramme , p.date_projection , p.heure_debut , p.num_salle , p.ticketsDisponible , p.prix_unitaire , f.titre FROM programme as p , film as f WHERE f.idFilm = p.idFilm";
$result = mysqli_query($conn, $sql);

echo "<table>";
echo "<tr>";
echo "<th>idProgramme</th>";
echo "<th>film</th>";
echo "<th>date_projection</th>";
echo "<th>heure_debut</th>";
echo "<th>num_salle</th>";
echo "<th>ticketsDisponibles</th>";
echo "<th>prix_unitaire</th>";
echo "</tr>";

if (mysqli_num_rows($result) > 0) {
   // Affichage des films
   while($row = mysqli_fetch_assoc($result)) {
      echo "<tr>";
      echo "<td>" . $row["idProgramme"]. "</td>";
      echo "<td>" . $row["titre"]. "</td>";
      echo "<td>" . $row["date_projection"]. "</td>";
      echo "<td>" . $row["heure_debut"]. "</td>";
      echo "<td>" . $row["num_salle"]. "</td>";
      echo "<td>" . $row["ticketsDisponible"]. "</td>";
      echo "<td>" . $row["prix_unitaire"]. "</td>";
      echo "</tr>";
    }
 } else {
    echo "<tr><td colspan='4'>Aucun programme trouvé</td></tr>";
 }

echo "</table>";

// Fermeture de la connexion
mysqli_close($conn);
?>
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
   background-color: #191185;
   color: white;
 }
img {
 width: 200px;
 height: auto;
 border: 1px solid rgba(255, 255, 255, 0.014);
 margin-bottom: 10px;
}
</style>