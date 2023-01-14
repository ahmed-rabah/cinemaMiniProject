<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if(isset($_SESSION['user_id'])) {
        # code...
    }
    
}else{
    exit(json_encode(['success'=>false,'connected'=>true,"response"=>"seulement les requêtes Get sont validés"]));
}