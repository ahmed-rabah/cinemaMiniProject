<?php


if($_SERVER['REQUEST_METHOD'] == 'GET'){
    session_start();
    if(isset($_SESSION['user_id']) && !empty( $_SESSION['panier'])){
        $panier = $_SESSION['panier'];
        require_once './database.php';
        $productsInfos=[];
        foreach ($panier as $product) {
            $idProgramme = $product['idProgramme'];
            $req = "SELECT  p.idProgramme,g.libelle,f.titre,p.date_projection,f.photo , p.heure_debut, p.ticketsDisponible, p.prix_unitaire FROM programme as p, film as f , genre as g WHERE p.idFilm= f.idFilm AND p.idProgramme =$idprogramme AND g.idGenre = f.idGenre";
            $requete = $pdo->query($req);
            $resultat = $pdo->fetch(PDO::FETCH_ASSOC);
            $productsInfos
        }
        exit(json_encode($panier));
        
        
        // require_once './database.php';
        // $idUser = $_GET['idUser'];
        // $req = "SELECT pro.id_produit ,pro.nombre_places , pro.prix , p.date_projection ,p.heure_debut , p.prix_unitaire , g.libelle , f.titre,f.photo FROM produit as pro, programme as p , film as f ,genre as g WHERE pro.id_user=$idUser AND p.idFilm=f.idFilm AND pro.id_programme=p.idProgramme AND g.idGenre =f.idGenre";
        // $query = $pdo->query($req);
        // $resultat = $query->fetchAll(PDO::FETCH_ASSOC);
    }else{
        exit(json_encode(false));
    }
}