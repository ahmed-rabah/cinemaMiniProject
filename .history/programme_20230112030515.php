<?php
// var_dump($_GET);
if($_SERVER['REQUEST_METHOD'] == "GET"){
    session_start();
    require_once "./functions/database.php";

    if(!empty($_GET['idProgramme'])){

        $idprogramme = $_GET['idProgramme'];
        //  select * from programme,film as f where date_projection="2022-01-22" and f.idFilm = "1" and f.idGenre="3" and YEAR(f.date_sortie)=2018
        $req = "SELECT  p.idProgramme,f.idFilm,f.idGenre ,g.libelle,f.titre,f.cast,f.date_sortie,p.date_projection , f.duree , f.resume,f.en_cours_de_projection , f.photo , f.trailer , p.heure_debut , p.num_salle , p.ticketsDisponible, p.prix_unitaire FROM programme as p, film as f , genre as g WHERE p.idFilm= f.idFilm AND p.idProgramme =$idprogramme AND g.idGenre = f.idGenre";
        
        $requete = $pdo->query($req);
    
        ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="./css/style.css">
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
        <link rel="icon" href="./logoCinema.png">
        <title>CinemaTi</title>
    </head>
    <body>
        <header>
            <?php include './header.php'; ?>
        </header>
        <?php echo '<span style="display : none ;" id="programmeID">$idProgramme</span>'; ?>
        <main class="">
        <?php
            if($requete->rowCount() > 0){
            $programme = $requete->fetch(PDO::FETCH_ASSOC);
            ?> 
                 <div class="grid">
                 <div>
                    <a href="./" class="fixedarrow btn btn-primary mb-2"><i class="uil uil-left-arrow-from-left">Retour</i></a>
                    <img src="<?= $programme['photo'] ?>" style="height:500px; width: 90%;" class="me-2" alt="">
                 </div>
                 <div>
                    <div class="d-flex justify-content-between p-2">
                        <h1 class="text-center"><?= $programme['titre'] ?></h1>
                        <button class="btn btn-primary me-2 addToCart">ajouter au panier</button>
                    </div>

                        <div class="inner-grid">
                            <h5>date de sortie </h5>  
                            <h6><?= $programme['date_sortie'] ?></h6>
                        </div>
                        <div class="inner-grid">
                            <h5 class="">type </h5>  
                            <h6><?= $programme['libelle'] ?></h6>
                        </div>
                        <div class="inner-grid">
                            <h5>description </h5>  
                            <p class=""><?= $programme['resume'] ?></p>
                        </div>
                        <div class="inner-grid">
                            <h5>Cast </h5>  
                            <p class=""><?= $programme['cast'] ?></p>
                        </div>
                        <div class="inner-grid">
                            <h5>Salle</h5>  
                            <h5 class=""><?= $programme['num_salle'] ?></h5>
                        </div>
                        <div class="inner-grid">
                            <h5>date de projection</h5>  
                            <h5 class="">le <?= $programme['date_projection'] ?> ??  <?= $programme['heure_debut'] ?></h5>
                        </div>
                        <div class="inner-grid">
                            <h5>tickets disponible</h5>  
                            <h5 class=""><?= $programme['ticketsDisponible'] ?> ticket(s)</h5>
                        </div>
                        <div class="inner-grid">
                            <h5>prix unitaire</h5>  
                            <h5 class=""><?= $programme['prix_unitaire'] ?> DH</h5>
                        </div>
                        <div class="inner-grid">
                            <h5>Duree</h5>  
                            <h5 class=""><?= $programme['duree'] ?> Minutes</h5>
                        </div>
                        <div class="inner-grid">
                            <h5>trailer</h5>  
                            <h6> <a href="<?= $programme['trailer'] ?>" target="_blank">trailer</a></h6>
                        </div>
                </div>
             </div
        <?php
    }else{
        $programme = $requete->fetch(PDO::FETCH_ASSOC);
        ?>
            <div class="alert alert-danger m-5" role="alert" id="not-found">
            D??sol??, nous n'avons pas r??ussi ?? trouver le programme</div>
        <?php
    }
        }else{
            header('location: ./');
        }

    }
            ?>
        </main>
    <div class="absoluteCart m-2 p-1"></div>

    <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./javascript/panie.js"></script>
</body>
</html>


