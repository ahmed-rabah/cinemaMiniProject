<?php

require_once "./database.php";
if($_SERVER['REQUEST_METHOD'] == "GET"){
     print_r($_GET);
    if(isset($_GET["genre"],$_GET["annee"],$_GET['movie'])){
        echo "ok";
    }
 }