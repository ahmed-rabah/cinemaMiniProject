<?php 
    require_once './functions/database.php';

    function getAllgenres($pdo){
      $req = $pdo->query('SELECT * from genre');
      $rows = $req->fetchAll(PDO::FETCH_ASSOC);
      foreach ($rows as $row) {
        $genres[] = $row ; 
      }
      
      return $genres;
    }
?>
<!-- Image and text -->
<!--<nav class="navbar navbar-light bg-light">
  <a class="navbar-brand" href="#">
    <img src="./logoCinema.png" width="60" height="60" class="d-inline-block align-top rounded-circle" alt="">
    CinemaTi
  </a>
  
</nav> -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  
  <div class="container-fluid">
      <a class="navbar-brand d-flex cine-name" href="./index.php">
        <img src="./logoCinema.png" width="60" height="60" class="d-inline-block align-top rounded-circle" alt="">
        <h2 class="mt-2 gradiant-bg">CinemaTi</h2>
      </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" href="./index.php">accueil
            <span class="visually-hidden">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./movies.php">Films </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">mon Espace</a>
        </li>
      </ul>

    </div>
    <ul class="nav navbar" id="non-connected">
      <li><a href="./signIn.php" class="btn btn-success me-2">se connecter</a></li>
      <li><a href="./signup.php" class="btn btn-primary ms-3">s'inscrire</a></li>
    </ul>
    <ul class="nav navbar" id="connected">
      <li><a href="./.php" class="btn btn-light me-2"><i class="uil uil-shopping-cart-alt font-family"></i></a></li>
      <li><a href="./signup.php" class="btn btn-primary ms-3">s'inscrire</a></li>
    </ul>
  </div>
</nav>
    
<form class="d-flex">
    <div class="form-group">
      <label for="genre" class="form-label mt-4">genre</label>
      <select class="form-select" id="genre">
        <option value="">All</option>
        <?php 
          $genres = getAllGenres($pdo);
        foreach ($genres as $genre) {
          echo "<option value=\"".$genre['idGenre']."\">".$genre['libelle']."</option>";
        }
        ?>
      </select>
    </div>
    <div class="form-group">
      <label for="annee" class="form-label mt-4">annee de sortie</label>
      <select class="form-select" id="annee">
        <option value=""></option>
        <?php
          $i=2023;
          while($i >= 1950):
              echo "<option value='$i'>$i</option>";
              $i--;
          endwhile;
        ?>
      </select>
    </div>
    <div class="form-group">
      <label for="projection" class="form-label mt-4"> date de projection</label>
      <input type="date" class="form-control" id="projection" placeholder="projection">
    </div>
    <div class="form-group">
      <label for="movie-name" class="form-label mt-4">nom du film</label>
      <input type="text" class="form-control" id="movie-name" placeholder="entrez le nom du film">
    </div>
</form>