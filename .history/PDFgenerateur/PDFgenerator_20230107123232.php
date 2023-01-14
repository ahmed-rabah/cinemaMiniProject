<?php

require __DIR__ . '/vendor/autoload.php';

    use Dompdf\Dompdf;
    use Dompdf\Options;
    require '../functions/counterPDF.php';
 if($_SERVER['REQUEST_METHOD'] == 'GET'){
        session_start();
        if(!empty($_GET['id_produit']) && isset($_SESSION['user_id']) && empty($_SESSION['panier'])){
           $idproduit = $_GET['id_produit'];
           require_once '../functions/database.php';
           try{
              $pdo->beginTransaction();
              $req="SELECT u.userName as username,f.photo ,f.titre ,g.libelle as genre  ,prod.nombre_places as places ,prog.date_projection ,prog.heure_debut ,prog.prix_unitaire , prog.num_salle as salle ,prod.prix ,prod.PDFprinted
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
                if(!$isAlreadyPrinted){
                  $is_active = true ; 
                   $req2="UPDATE produit SET PDFprinted = :isactive , lastModifiedDate=NOW() WHERE id_produit = :productID";
                   $query=$pdo->prepare($req2);
                   $query->bindParam(':isactive', $is_active);
                  $query->bindParam(':productID', $idproduit);
                  $query->execute();
                  if($query->rowCount() > 0){
                     $options = new Options();
                     
                     $options->setChroot('C:\xampp3\htdocs\cinemaMiniProject');
                     $options->setIsRemoteEnabled(true);
                     $dompdf = new Dompdf($options);
                     
                     
                     $html = file_get_contents("template.html");
                     // $html = str_replace(["{{pdfCounter}}","{{username}}"],
                     // [$count,$username],$html);
                     
                     $html = str_replace(["{{pdfCounter}}","{{username}}","{{moviePoster}}","{{movieName}}","{{genre}}","{{numSalle}}","{{date_projection}}","{{heure_debut}}","{{prix_unitaire}}","{{nbrticket}}","{{total}}"],
                     [$count,$username,$poster,$moviename,$genre,$salle,$projection,$start,$prix_unitaire,$nombre_places,$total],$html);
                     $dompdf->loadHtml($html);
                     
                     $dompdf->render();
                     
                     $dompdf->stream("ticket$count _ $username.pdf");
                     
                     $pdo->commit();
                     $downloaded = true ;                         
                        }else{
                           exit(json_encode(['downloaded'=>false,"connected"=>true,"response"=>"erreur serveur!!"]));
                           $pdo->rollBack();
                        }

              }else{
                   $pdo->rollBack();
                 exit(json_encode(['downloaded'=>false,"connected"=>true,"response"=>"vous avez dejà imprimé le reçu ,nous ne pouvons pas vous founris une autre copie"]));
              }
         }catch(Exception $e){
                   $pdo->rollBack();
            exit(json_encode(['downloaded'=>false,"connected"=>true,"response"=>"erreur serveur!!"]));               
         }
   }elseif(!isset($_SESSION['user_id'])){
   exit(json_encode(['downloaded'=>false,"connected"=>false,"response"=>"vous devez être connecté"]));
   }elseif(empty($_GET['id_produit'])){
   exit(json_encode(['downloaded'=>false,"connected"=>true,"response"=>"vous devez spécifier le produit à imprimer"]));
   }
}
                