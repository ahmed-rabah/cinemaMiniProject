<?php


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    require_once "./database.php";
    session_start();
    if(!empty($_POST['type']) && !empty($_POST['number']) && isset($_SESSION['user_id'])){
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
                }

                $req = "INSERT INTO commande value()";
        }
       
    }else{
        exit(json_encode(['complited'=>false,'connected'=>false,'response'=>"pour finaliser la commande  vous devez être connécté "]));
    }
}