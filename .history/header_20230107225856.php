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
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  
  <div class="container-fluid">
      <a class="navbar-brand d-flex cine-name" href="./index.php">
        <img src="./logoCinema.png" width="60" height="60" class="d-inline-block align-top rounded-circle" alt="">
        <h2 class="mt-2 gradiant-bg">CinemaTi</h2>
      </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-between" id="navbarColor01">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" href="./index.php"><h5>accueil</h5>
            <span class="visually-hidden">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./movies.php"><h5>les Films</h5></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./movies.php"><h5>les salles de projection</h5></a>
        </li>
      </ul>
      <?php
      if(!isset($_SESSION['user_id'])){
        ?>

<ul class="nav navbar" id="non-connected">
  <li><a href="./signIn.php" class="btn btn-success me-2 font-size">se connecter</a></li>
  <li><a href="./signup.php" class="btn btn-primary ms-3 font-size">s'inscrire</a></li>
</ul>
<?php } 
if(isset($_SESSION['user_id'])){ ?>
    <ul class="nav navbar" id="connected">
      <li><button class="btn btn-light me-2" id="panier"><span class="font-size"><i class="uil uil-shopping-cart-alt ">panier d'achat</i></span></button></li>
      <li><a href="./dashboard.php" class="btn btn-primary ms-3 "><span class="font-size"><i class="uil uil-user-circle"></i>votre compte</span></a></li>
      <li><a href="./logout.php" class="btn btn-danger ms-3 "><span class="font-size"><i class="uil uil-signout"></i>deconnexion</span></a></li>
    </ul>
    <?php } ?>
  </div>
  </div>
</nav>
    
