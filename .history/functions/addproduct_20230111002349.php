<?php


if($_SERVER['REQUEST_METHOD'] == 'GET'){
    require_once './database.php';
    session_start();
    if(!empty($_GET['idProgramme']) && isset($_SESSION['user_id'])){
        $iduser = $_SESSION['user_id'];
        $idprogramme = $_GET['idProgramme'];
        $checkreq=$pdo->query("SELECT idProgramme from programme WHERE idProgramme = $idprogramme");
        if($checkreq->rowCount() <= 0){
            exit(json_encode(["added"=>false,"connected"=>true,"response"=>"on a trouvé des difficultés a trouver le programme"]));
        }

        $stmt="SELECT prix_unitaire FROM programme WHERE idProgramme=$idprogramme";
        $query1=$pdo->query($stmt);
        $prix = $query1->fetch(PDO::FETCH_ASSOC);
        if($prix == false){
            $prix_unitraire=100;
        }
        // var_dump($_SESSION['panier']);
        $prix_unitraire = $prix['prix_unitaire'];

        $exist = false; 
        for ($i=0; $i < sizeof($_SESSION['panier']); $i++) { 
            foreach ($_SESSION['panier'][$i] as $key => $value) {
               if($key =="idProgramme" && $value == $idprogramme){
                    $exist = true;
               }
            }
        }
        // echo "$exist";
        if(!$exist){
            $product_array= array("idProgramme"=>$idprogramme,"nbrPlace"=>1,"prix"=>$prix_unitraire);
            array_push($_SESSION['panier'],$product_array);
            exit(json_encode(["added"=>true,"connected"=>true,"response"=>"le programme est ajouté au panier avec succés"]));
        }
        if($exist){
            exit(json_encode(["added"=>false,"connected"=>true,"response"=>"le programme est déja ajouté au panier"]));
        }

        
        // // var_dump($prix_unitraire);
        // $req = "INSERT INTO produit(id_programme,id_user,nombre_places,prix) values(?,?,?,?)";
        // $query = $pdo->prepare($req);
        // $query->execute([$idprogramme,$iduser,1,$prix_unitraire]);
        // if ($query->rowCount() > 0) {
        //     exit(json_encode(true));
        // } else {
        //     exit(json_encode(false));
        // }     
        
        
        // exit(json_encode($resultat));
    }else{
        exit(json_encode(["added"=>false,"connected"=>false,"response"=>"vous n'êtes pas connectés , veuillez se connecter pour ajouter au panier"]));
    }
}