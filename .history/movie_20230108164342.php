<?php
// var_dump($_GET);
if($_SERVER['REQUEST_METHOD'] == "GET"){
    require_once "./functions/database.php";

    if(!empty($_GET['idFilm'])){

        $idfilm = $_GET['idFilm'];
        //  select * from programme,film as f where date_projection="2022-01-22" and f.idFilm = "1" and f.idGenre="3" and YEAR(f.date_sortie)=2018
        $req = "SELECT  * FROM film as f , genre as g WHERE idFilm =$idfilm AND g.idGenre = f.idGenre";
        
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
        <style>
            .inner-grid{
                display: grid ;
            grid-template-columns:30% 70% ;
            border-bottom:  1px solid black ;
            margin: 0.4em 0; 
            }
            .grid{
                display: grid ;
            grid-template-columns:30% 70% ; 
            }
            @media screen and (max-width:1048px) {
                .grid{
                display: grid ;
            grid-template-columns:20% 80% ; 
            }
            }
        </style>
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
            $film = $requete->fetch(PDO::FETCH_ASSOC);
            ?> 
                 <div class="grid">
                 <div>
                    <a href="./" class="fixedarrow btn btn-primary mb-2"><i class="uil uil-left-arrow-from-left">Retour</i></a>
                    <img src="<?= $film['photo'] ?>" style="height:500px; width: 90%;" class="me-2" alt="">
                 </div>
                 <div>
                    <div class="d-flex justify-content-between p-2">
                        <h1 class="text-center"><?= $film['titre'] ?></h1>
                        <button class="btn btn-primary me-2 addToCart">ajouter au panier</button>
                    </div>

                        <div class="inner-grid">
                            <h5>date de sortie </h5>  
                            <h6><?= $film['date_sortie'] ?></h6>
                        </div>
                        <div class="inner-grid">
                            <h5 class="">type </h5>  
                            <h6><?= $film['libelle'] ?></h6>
                        </div>
                        <div class="inner-grid">
                            <h5>description </h5>  
                            <p class=""><?= $film['resume'] ?></p>
                        </div>
                        <div class="inner-grid">
                            <h5>Cast </h5>  
                            <p class=""><?= $film['cast'] ?></p>
                        </div>
                        <div class="inner-grid">
                            <h5>Duree</h5>  
                            <h5 class=""><?= $film['duree'] ?> Minutes</h5>
                        </div>
                        <div class="inner-grid">
                            <h5>en cours de projection</h5>  
                            <h5 class=""><?php if($film['en_cours_de_projection']){echo "oui";}else{echo "non";} ?></h5>
                        </div>
                        <div class="inner-grid">
                            <h5>trailer</h5>  
                            <h6> <a href="<?= $film['trailer'] ?>" target="_blank">trailer</a></h6>
                        </div>
                </div>
             </div
        <?php
    }else{
        $film = $requete->fetch(PDO::FETCH_ASSOC);
        ?>
            <div class="alert alert-danger m-5" role="alert" id="not-found">
            Désolé, nous n'avons pas réussi à trouver le programme</div>
        <?php
    }
        }else{
            header('location: ./');
        }

    }
            ?>
        </main>
    <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./javascript/panier.js"></script>
</body>
</html>


