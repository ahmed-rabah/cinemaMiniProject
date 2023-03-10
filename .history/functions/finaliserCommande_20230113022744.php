<?php


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    require_once "./database.php";
    session_start();
    if( isset($_SESSION['user_id'])){
    if(!empty($_POST['type']) && !empty($_POST['number'])){
        $iduser = $_SESSION['user_id'];
        $cardNumber = $_POST['number'];
        $cardType = $_POST['type'];
        $panier = $_SESSION['panier'];
        $cardTypes = array('Visa','Mastercard','American Express','Discover','Diners Club','JCB','UnionPay','Maestro');
        $tickets=[];
        if(preg_match('/^[0-9]{16}$/', $cardNumber) && in_array($cardType,$cardTypes) ){
                $totalPrice=0;
                for ($i=0; $i <sizeof($panier) ; $i++) { 
                        $totalPrice+=$panier[$i]["prix"];
                        $tickets[$panier[$i]["idProgramme"]]=$panier[$i]["nbrPlace"];
                }

                // var_dump($tickets);
                try{
                    $pdo->beginTransaction();
                    $reqnum="SELECT id_user from commande WHERE card_number=$cardNumber";
                    $queryNum=$pdo->query($reqnum);
                    if($queryNum->rowCount() > 0){
                        $answer = $queryNum->fetch(PDO::FETCH_ASSOC);
                        if($answer['id_user'] === $iduser){
                            exit(json_encode(['complited'=>false,'connected'=>true,'response'=>"desolé!! le numero de card est déjà utilisé dans un autre compte"]));
                        }
                    }

                   foreach ($tickets as $key => $value) {
                    $req="UPDATE programme SET ticketsDisponible=ticketsDisponible-? WHERE idProgramme=?";
                    $stmt=$pdo->prepare($req);
                    $stmt->execute([$value,$key]);
                   }
                   $reqid="SELECT MAX(id_commande) as maxID FROM commande";
                   $id=$pdo->query($reqid);
                   $idresult=$id->fetch(PDO::FETCH_ASSOC);
                   $newID=$idresult['maxID']+1;
                   $req2 = "INSERT INTO commande(id_commande,id_user,prix_total,card_type,card_number) value(?,?,?,?,?)";
                   $stmt2 = $pdo->prepare($req2);
                   $stmt2->execute([$newID,$iduser,$totalPrice,$cardType,$cardNumber]);
                   for ($i=0; $i < sizeof($panier); $i++) { 
                            $req3 = "INSERT INTO produit(id_programme,id_commande,id_user,nombre_places,prix) values(?,?,?,?,?)";
                            $stmt3 = $pdo->prepare($req3);
                            $stmt3->execute([$panier[$i]['idProgramme'],$newID,$iduser,$panier[$i]['nbrPlace'],$panier[$i]['prix']]);
                   }
                   $_SESSION['panier']=[];
                   $pdo->commit();
        exit(json_encode(['complited'=>true,'connected'=>true,'response'=>"vous avez finaliser la commande avec succés"]));
                   
                }catch(PDOException $e){
                    $pdo->rollBack();
                    // exit($e->getCode());
                    exit(json_encode(['complited'=>false,'connected'=>true,'response'=>"desolé!! nous ne pouvons pas traité la commande"]));
                }
            }else{
                exit(json_encode(['complited'=>false,'connected'=>true,'response'=>"le numero de carte doit être composé de 16 chiffres"]));
            }
       
    }elseif(empty($_POST['number'])){
        exit(json_encode(['complited'=>false,'connected'=>true,'response'=>"le champs du numero de carte bancaire est obligatoire"]));
    }
    else{
        exit(json_encode(['complited'=>false,'connected'=>true,'response'=>"requete POST erronné "]));
    }
    }else{
            exit(json_encode(['complited'=>false,'connected'=>false,'response'=>"pour finaliser la commande  vous devez être connécté "]));
        }
}else{
    exit("not POST");
}


/*
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
        if(preg_match('/^\d{16}$/', (string)$cardNumber) && in_array($cardType,$cardTypes) ){
             $totalPrice=0;
                for ($i=0; $i <sizeof($panier) ; $i++) { 
                        $totalPrice+=$panier[$i]["prix"];
                        $tickets[$panier[$i]["idProgramme"]]=$panier[$i]["nbrPlace"];
                }
                
                // var_dump($tickets);
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
                   $req2 = "INSERT INTO commande(id_commande,id_user,prix_total,card_type,card_number) value(?,?,?,?,?)";
                   $stmt2 = $pdo->prepare($req2);
                   $stmt2->execute([$newID,$iduser,$totalPrice,$cardType,$cardNumber]);
                   for ($i=0; $i < sizeof($panier); $i++) { 
                       $req3 = "INSERT INTO produit(id_programme,id_commande,id_user,nombre_places,prix) values(?,?,?,?,?)";
                       $stmt3 = $pdo->prepare($req3);
                            $stmt3->execute([$panier[$i]['idProgramme'],$newID,$iduser,$panier[$i]['nbrPlace'],$panier[$i]['prix']]);
                   }
                   $SESSION['panier']=[];
                   $pdo->commit();
                   exit(json_encode(['complited'=>true,'connected'=>true,'response'=>"vous avez finaliser la commande avec succés"]));
                   
                }catch(PDOException $e){
                    $pdo->rollBack();
                    exit(json_encode(['complited'=>false,'connected'=>true,'response'=>"desolé!! nous ne pouvons pas traité la commande"]));
                }
            }else{
                var_dump($cardNumber,$cardType);
                exit(json_encode(['complited'=>false,'connected'=>true,'response'=>"numero de card doit contenir 16digits"]));
            }
        
        }else{
            exit(json_encode(['complited'=>false,'connected'=>false,'response'=>"pour finaliser la commande  vous devez être connécté "]));
        }
        }
*/