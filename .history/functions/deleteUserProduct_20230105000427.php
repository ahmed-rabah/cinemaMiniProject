<?php

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    if(!empty($_GET['product'])){
        $product = $_GET['product'];
        require_once './database.php';
        $req = "DELETE FROM produit WHERE id_produit=:product";
        $stmt=$pdo->prepare($req);
        $stmt->bindParam(':product', $product, PDO::PARAM_INT);
        $stmt->execute();
        
        if ($stmt->rowCount() > 0) {
            exit(json_encode(true));
        } else {
            exit(json_encode(false));
        }
    }else{
        echo "empty";
    }
    }else{
        echo "not a get method";
    }