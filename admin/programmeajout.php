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
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-cog"></i></a>
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Dashboard</h5>
  </div>
  <div class="w3-bar-block">
    <a href=".php" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a href="userhome.php" class="w3-bar-item w3-button w3-padding w3-black"><i class="fa fa-users fa-fw"></i>  utilisateurs</a>
    <a href="home2.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-eye fa-fw"></i>  films</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bullseye fa-fw"></i>  programmes</a>

    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-cog fa-fw"></i>  Settings</a><br><br>
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> My Dashboard</b></h5>
  </header>



   
  <br>
  <div class="w3-container w3-white w3-padding-32">
    <div class="w3-row">
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

$query2="select idFilm , titre from film";
$req2 = mysqli_query($conn,$query2);
$resultat = mysqli_fetch_all($req2, MYSQLI_ASSOC);

// Récupération des données de l'utilisateur


// Fermeture de la connexion
mysqli_close($conn);
?>

<form method="post" action="ajouterprogramme.php">
<label for="idProgramme">idProgramme</label>
  <input type="hidden" name="idProgramme" >
  <label for="idFilm">idFilm</label>
  <select name="idFilm">
    <?php 
    foreach ($resultat as $value) {
      ?>
      <option value="<?= $value['idFilm'] ?>"  ?><?= $value['titre'] ?></option>";
    <?php
    }
    ?>
  </select>
  <br>
  <label for="date_projection">date_projection</label>
  <input type="date" name="date_projection" required="required" placeholder="date_projection" required></input> 
   <label for="heure_debut">heure_debut</label>
  <input type="time" name="heure_debut" ><br>
  <label for="num_salle">num_salle</label>
  <input type="number" name="num_salle" ><br>
  <label for="ticketsDisponible">ticket Disponibles</label>
  <input type="number" name="ticketsDisponible" ><br>
  <label for="prix_unitaire">prix_unitaire</label>
  <input type="number" name="prix_unitaire" ><br>
  <input type="submit" value="Ajouter">
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
    <h4></h4>
    <p>Admin  <a href="https://www.w3schools.com/w3css/default.asp" target="_blank"></a></p>
    
  </footer>
    <p><a href="logout.php">Log out</a></p>
   

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
