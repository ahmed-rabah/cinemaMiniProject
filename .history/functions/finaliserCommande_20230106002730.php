<?php


if($_SERVER['REQUEST_METHOD'] == 'GET'){
    require_once "./database.php";
    session_start();
    if(!empty($_GET['type']) && !empty($_GET['number']) && isset($_SESSION['user_id'])){
        $iduser = $_SESSION['user_id'];
        $cardNumber = $_GET['number'];
        $cardType = $_GET['type'];
        $panier = $_SESSION['panier'];
        $cardTypes = array('Visa','Mastercard','American Express','Discover','Diners Club','JCB','UnionPay','Maestro');
        $tickets=[];
        if(preg_match('/^[0-9]{16}$/', $cardNumber) && in_array($cardType,$cardTypes) ){
                $totalPrice=0;
                for ($i=0; $i <sizeof($panier) ; $i++) { 
                        $totalPrice+=$panier[$i]["prix"];
                        $tickets[$panier[$i]["idProgramme"]]=$panier[$i]["nbrPlace"];
                }

                var_dump($tickets);
                try{
                    $pdo->beginTransaction();
                   foreach ($tickets as $key => $value) {
                    $req="UPDATE programme SET ticketsDisponible=ticketsDisponible-? WHERE idProgramme=?";
                    $stmt=$pdo->prepare($req);
                    $stmt->execute([$value,$key]);
                   }
                   $reqid="SELECT MAX(id_commande) as maxID FROM commande";
                   $id=$pdo->query($reqid);
                   $idresult=$id->fetch(PDO::FETCH_ASSOC);
                   $newID=$idresult['maxID']+1;
                   $req2 = "INSERT INTO commande(id_commande,id_user,prix_total,card_type,card_number) value(?????)";
                   $stmt2 = $pdo->prepare($req2);
                   $stmt2->execute([$newID,$iduser,$totalPrice,$cardType,$cardNumber]);
                   for ($i=0; $i < sizeof($panier); $i++) { 
                            $req3 = "INSERT INTO produit(id_programme,id_commande,id_user,nombre_places,prix) values(?,?,?,?)";
                            $stmt3 = $pdo->prepare($req3);
                            $stmt3->execute([$panier[$i]['idProgramme'],$newID,$iduser,$panier[$i]['nbrPlace'],$panier[$i]['prix']]);
                   }
                   $pdo->commit();
                }catch(PDOException $e){
                    $pdo->rollBack();
                    throw $e;
                }
            }
       
    }else{
        exit(json_encode(['complited'=>false,'connected'=>false,'response'=>"pour finaliser la commande  vous devez être connécté "]));
    }
}else{
    echo "<h1 style=\"font-size:2rem ;margin: 5rem; background: red ;\">cette page n'est pas accessible pour les requêtes GET</h1>";
}