<?php

if($SERVER['REQUEST_METHOD'] == 'POST'){
    session_start();

}else{
    exit(false);
}
