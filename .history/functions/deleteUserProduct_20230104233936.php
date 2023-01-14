<?php

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    if(!empty($_GET['user']) && !empty($_GET['product'])){
        require_once './database.php';
    }
}