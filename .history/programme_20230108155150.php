<?php
// var_dump($_GET);
if($_SERVER['REQUEST_METHOD'] == "GET"){
    require_once "./functions/database.php";

    if(!empty($_GET['idProgramme'])){

        $idprogramme = $_GET['idProgramme'];
        //  select * from programme,film as f where date_projection="2022-01-22" and f.idFilm = "1" and f.idGenre="3" and YEAR(f.date_sortie)=2018
        $req = "SELECT  p.idProgramme,f.idFilm,f.idGenre ,g.libelle,f.titre,f.cast,f.date_sortie,p.date_projection , f.duree , f.resume,f.en_cours_de_projection , f.photo , f.trailer , p.heure_debut , p.num_salle , p.ticketsDisponible, p.prix_unitaire FROM programme as p, film as f , genre as g WHERE p.idFilm= f.idFilm AND p.idProgramme =$idprogramme AND g.idGenre = f.idGenre";
        
        $requete = $pdo->query($req);
    }
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
            .grid{
                display: grid;
            grid-template-columns:auto auto auto ; 
            }
            .inner-grid{
                display: grid ;
            grid-template-columns:30% 70% ; 
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
                <div class="grid">
                    <div><img src="./images/zodiac.jpg" alt=""></div>
                    <div><
                    <h1 class="text-center">Zodiac</h1>
                        <div class="inner-grid">
                            <h5>date de sortie </h5>  
                            <h6>12-12-12</h6>
                        </div>
                        <div class="inner-grid">
                            <h5 class="">type </h5>  
                            <h6>action</h6>
                        </div>
                        <div class="inner-grid">
                            <h5>description </h5>  
                            <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod officiis eius natus nobis vitae similique. Quisquam praesentium rerum omnis ipsa?</p>
                        </div>
                        <div class="inner-grid">
                            <h5>Cast </h5>  
                            <p class="text-center">"Jack Nicholson, Shelley Duvall, Danny Lloyd, Scatman Crothers"</p>
                        </div>
                    </div>
                </div>
        </main>
    <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./javascript/panier.js"></script>
</body>
</html>

<?php 
} 
 ?>


