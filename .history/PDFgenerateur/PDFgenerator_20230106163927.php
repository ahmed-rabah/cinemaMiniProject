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
                $req="SELECT prod.nombre_places as places , prod.prix , prod.PDFprinted , 
                prog.date_projection , prog.heure_debut , prog.num_salle as salle , prog.prix_unitaire , f.titre , f.photo , g.libelle as genre  ,u.userName as username
        from produit as prod , programme as prog , film as f , user as u , genre as g 
        WHERE prod.id_programme = prog.idProgramme AND prod.id_user=u.idUser AND f.idGenre=g.idGenre AND prog.idFilm = f.idFilm AND prod.id_produit=$idproduit";
                $stmt=$pdo->query($req);
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                $response=[];
                foreach ($result as $key => $value) {
                    # code...
                }
                 var_dump($result);
     }
    $options = new Options();
    
    $options->setChroot(__DIR__);
    $options->setIsRemoteEnabled(true);
    $dompdf = new Dompdf($options);
    
                
    $html = file_get_contents("template.html");
    $html = str_replace(["{{pdfCounter}}","{{username}}","{{moviePoster}}","{{movieName}","{{genre}}","{{numSalle}}","{{date_projection}}","{{heure_debut}}","{{prix_unitaire}}","{{nbrticket}}","{{total}}"],
    [$count,$result["username"],$result['photo'],$result['titre'],$result["genre"],$result['salle'],$result['date_projection'],$resultat['heure_debut'],$result['prix_unitaire'],$result['places'],$result['prix']],$html);
    $dompdf->loadHtml($html);
    
    $dompdf->render();
    
    $dompdf->stream("commande.pdf");
    }
