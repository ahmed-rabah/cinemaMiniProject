<?php

require_once './database.php';

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $idUser = $_GET['idUser'];
    $req = "SELECT * FROM produit WHERE p.id_user=$idUser";
}