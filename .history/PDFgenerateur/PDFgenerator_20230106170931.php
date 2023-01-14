<?php

require __DIR__ . '/vendor/autoload.php';

    use Dompdf\Dompdf;
    use Dompdf\Options;
    require '../functions/counterPDF.php';
 if($_SERVER['REQUEST_METHOD'] == 'GET'){
        session_start();
     if(!empty($_GET) && isset($_SESSION['user_id']) && !empty($_SESSION['panier'])){
            $idproduit = $_GET['id_produit'];
            require_once '../functions/database.php';
                $req="SELECT
                    u.userName as username,
                   f.photo ,
                   f.titre , 
                    g.libelle as genre  ,
                 prod.nombre_places as places , 
                prog.date_projection ,
                 prog.heure_debut ,
                   prog.prix_unitaire , 
                  prog.num_salle as salle ,
                prod.prix ,
                 prod.PDFprinted 
        from produit as prod , programme as prog , film as f , user as u , genre as g 
        WHERE prod.id_programme = prog.idProgramme AND prod.id_user=u.idUser AND f.idGenre=g.idGenre AND prog.idFilm = f.idFilm AND prod.id_produit=$idproduit";
                $stmt=$pdo->query($req);
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                    $username=$result['username'];
                    $poster=$result['photo'];
                    $moviename=$result['titre'];
                    $genre = $result['genre'];
                    $nombre_places=$result['places'];
                    $projection= $result['date_projection'];
                    $start = $result["heure_debut"];
                    $prix_unitaire = $result["prix_unitaire"];
                    $salle  =$result['salle'];
                    $total = $result['prix'];
                    $isAlreadyPrinted = $result['PDFprinted'];
     }
    $options = new Options();
    
    $options->setChroot([__DIR__,'C:\xampp3\htdocs\cinemaMiniProject\images']);
    $options->setIsRemoteEnabled(true);
    $dompdf = new Dompdf($options);
    
                
    $html = file_get_contents("template.html");
    // $html = str_replace(["{{pdfCounter}}","{{username}}"],
    // [$count,$username],$html);
   
    $html = str_replace(["{{pdfCounter}}","{{username}}","{{moviePoster}}","{{movieName}","{{genre}}","{{numSalle}}","{{date_projection}}","{{heure_debut}}","{{prix_unitaire}}","{{nbrticket}}","{{total}}"],
    [$count,$username,$poster,$moviename,$genre,$salle,$projection,$start,$prix_unitaire,$nombre_places,$total],$html);
    $dompdf->loadHtml($html);
    
    $dompdf->render();
    
    $dompdf->stream("commande.pdf");
    }
