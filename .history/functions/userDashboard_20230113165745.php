<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if ($) {
        # code...
    }
    
}else{
    exit(json_encode(['success'=>false,'connected'=>true,"response"=>"seulement les requêtes Get sont validés"]));
}