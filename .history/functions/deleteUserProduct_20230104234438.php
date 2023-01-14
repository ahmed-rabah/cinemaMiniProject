<?php

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    if(!empty($_GET['product'])){
        $product = $_GET['product'];
        require_once './database.php';
        $req = "DELETE FROM product WHERE id_produit=$product";
        $query = $pdo->query($req);
        $result = $query->fetch();
    }
}