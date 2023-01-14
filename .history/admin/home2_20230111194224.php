<?php 
include('dbcon.php');
include('session.php'); 

$result=mysqli_query($con, "select * from admin where idAdmin='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);

 ?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style2.css">

<title>Admin</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
</head>
<body class="w3-light-grey">

<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
  <span class="w3-bar-item w3-right"></span>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
      <img src="admin.png" class="w3-circle w3-margin-right" style="width:46px">
    </div>
    <div class="w3-col s8 w3-bar">
      <span> <strong>Admin</strong></span><br>
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Dashboard</h5>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a href="userhome.php" class="w3-bar-item w3-button w3-padding "><i class="fa fa-users fa-fw"></i>  utilisateurs</a>
    <a href="home2.php" class="w3-bar-item w3-button w3-padding w3-black"><i class="fa fa-camera fa-fw"></i>  films</a>
    <a href="programmehome.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bullseye fa-fw"></i>  programmes</a>
    <a href="adminhome.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-user fa-fw"></i>  Mes infos</a>

    <a href="logout.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-cog fa-fw"></i>  logout</a><br><br>
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px ; ">
    <h5><b><i class="fa fa-dashboard"></i> My Dashboard</b></h5>
 
  </header>



   
  <br>
  <div class="w3-container w3-white w3-padding-32">
    <div class="w3-row">
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
      background-color: #191185;
      color: white;
    }
 img {
    width: 80px;
    height: auto;
    border: 1px solid rgba(255, 255, 255, 0.014);
    margin-bottom: 10px;
 }
  </style>
</head>
<body>
<h5><b><i class="fa fa-book"></i> AJOUTER  </b></h5>
     <form action="filmajout.php" method="post">
      <input  type="submit" value="Ajouter">
    </form> 
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
$sql = "SELECT idFilm ,titre, resume , photo, date_sortie FROM film";
$result = mysqli_query($conn, $sql);

echo "<table>";
echo "<tr>";
echo "<th>idFilm</th>";
echo "<th>titre</th>";
echo "<th>resume</th>";
echo "<th>photo</th>";
echo "<th>date_sortie</th>";
echo "<th>actions</th>";
echo "</tr>";

if (mysqli_num_rows($result) > 0) {
   // Affichage des films
   while($row = mysqli_fetch_assoc($result)) {
      echo "<tr>";
      echo "<td>" . $row["idFilm"]. "</td>";
      echo "<td>" . $row["titre"]. "</td>";
      echo "<td>" . $row["resume"]. "</td>";
      echo "<td><img src='." . $row["photo"]. "' alt='Movie Image'></td>";
      echo "<td>" . $row["date_sortie"]. "</td>";
      echo "<td>   <form action=\"filmedit.php\" method=\"post\">
      <input type=\"number\" name=\"idFilm\" required=\"required\" placeholder=\"idFilm\" value=\"".$row['idFilm']."\" style=\"display : none\"><input type=\"submit\" value=\"Modifier\"></form>
      <form action=\"film_delete.php\" method=\"post\">
  <input type=\"number\" name=\"id\" required=\"required\" placeholder=\"id\"value=\"".$row['idFilm']."\" style=\"display : none\">  <input type=\"submit\"style=\"background-color:red;\" value=\"supprimer\">
  </form> 
      </td>";
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
      <div class="w3-container w3-third">
        <h5 class="w3-bottombar w3-border-green"></h5>
        <p></p>
        <p></p>
        <p></p>
      </div>
      <div class="w3-container w3-third">
        <h5 class="w3-bottombar w3-border-red"></h5>
        <p></p>
        <p></p>
        <p></p>
      </div>
      <div class="w3-container w3-third">
        <h5 class="w3-bottombar w3-border-orange"></h5>
        <p></p>
        <p></p>
        <p></p>
        <p></p>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="w3-container w3-padding-16 w3-light-grey">
    <h4><p><a href="logout.php">Log out</a></p></h4>
    <p>Admin  <a href="https://www.w3schools.com/w3css/default.asp" target="_blank"></a></p>
    <h5><b><i class="fa fa-pencil"></i> MODIFIER  </b></h5>
     <form action="filmedit.php" method="post">
  <input type="number" name="idFilm" required="required" placeholder="idFilm" ?>
  <style>
  <style>
/* form {
  width: 50%;
  margin: 0 auto;
  border: 1px solid #ccc;
  border-radius: 5px;
  padding: 20px;
} */

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
  background-color: #191185;
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
  <input type="submit" value="Modifier">
</form> 
<h5><b><i class="fa fa-trash"></i> SUPPRIMER  </b></h5>
     <form action="film_delete.php" method="post">
  <input type="number" name="id" required="required" placeholder="id" ?>
  <style>
/* form {
  width: 50%;
  margin: 0 auto;
  border: 1px solid #ccc;
  border-radius: 5px;
  padding: 20px;
} */

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
  background-color: #191185;
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
  <input type="submit" value="supprimer">
</form> 
<h5><b><i class="fa fa-book"></i> AJOUTER  </b></h5>
     <form action="filmajout.php" method="post">
  <input  type="submit" value="Ajouter">
</form> 
  </footer>

  <!-- End page content -->
</div>

<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
    overlayBg.style.display = "none";
  } else {
    mySidebar.style.display = 'block';
    overlayBg.style.display = "block";
  }
}

// Close the sidebar with the close button
function w3_close() {
  mySidebar.style.display = "none";
  overlayBg.style.display = "none";
}
</script>

</body>
</html>
