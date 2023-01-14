<?php

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    # code...
}else{
    exit(json_encode(['success'=>false,'connected'=>true,"response"=>"seulement les requêtes Get sont validés"]));
}