<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if(isset($_SESSION['user_id'])) {
        
    }else{
        exit(json_encode(['success'=>false,'connected'=>true,"response"=>"seulement les requêtes Get sont validés"]));
    }
    
}else{
    exit(json_encode(['success'=>false,'connected'=>true,"response"=>"seulement les requêtes Get sont validés"]));
}