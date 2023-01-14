<?php

if($SERVER['REQUEST_METHOD'] == 'POST'){
    session_start();
    if(isset($_SESSION['user_id'])){
        exit()
    }

}else{
    exit(false);
}
