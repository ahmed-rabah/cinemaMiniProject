<?php

require_once './database.php';

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    session_start();
    if(!empty($_GET['idProgramme']) && isset($_SESSION['user_id'])){
        $iduser = $_SESSION['user_id'];
        $idprogramme = $_GET['idProgramme'];
        $stmt="SELECT prix_unitaire FROM programme WHERE idProgramme=$idprogramme";
        $query1=$pdo->query($stmt);
        $prix = $query1->fetch(PDO::FETCH_ASSOC);
        if($prix == false){
            $prix_unitraire=100;
        }
        // var_dump($prix['prix_unitaire']);
        $prix_unitraire = $prix['prix_unitaire'];
        $product_array= array("idProgramme"=>$idprogramme,"nbrPlace"=>1,"prix"=>$prix_unitraire);
        // $_SESSION['panier'] +=$product_array;
        // array_push($_SESSION['panier'],$product_array);

        foreach ($_SESSION['panier'] as $key => $value) {
            if(in_array("1",$value['idProgramme'])){
                echo "yes";
            }else{
                echo "no";
            }
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
        echo "<h2 style=\"background:red; color:white; position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%); padding : 4rem; border-radius : 10px;\">vous n'êtes pas connécté</h2>";
        header('REFRESH:2,../signin.php');
    }
}