<?php


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    require_once "./database.php";
    session_start();
    if(!empty($_POST['type']) && !empty($_POST['number']) && isset($_SESSION['user_id'])){
        $iduser = $_SESSION['user_id'];
        $cardNumber = $_POST['number'];
        $cardType = $_POST['type'];
        $panier = $_SESSION['panier'];
        if(preg_match('/^[0-9]{16}$/', $cardNumber)){

        }
       
    }else{
        exit(json_encode(['complited'=>false,'connected'=>false,'response'=>"pour finaliser la commande  vous devez être connécté "]));
    }
}