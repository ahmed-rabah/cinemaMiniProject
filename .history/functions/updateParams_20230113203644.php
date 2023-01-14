<?php

if($SERVER['REQUEST_METHOD'] == 'POST'){
    session_start();
    if(isset($_SESSION['user_id'])){
        if(!empty($_POST['use'])){
            if($_POST['use']==="checking"){
                    if(!empty($_POST['username']) && !empty($_POST['password']));



            }elseif($_POST['use']==="updating"){
                    //too be continued
            }
        }else{
            exit(json_encode(['complited'=>false,'connected'=>true,"response"=>"erreur de code"]));
        }
    }else{
        exit(json_encode(['complited'=>false,'connected'=>false,"response"=>"vous n'êtes pas connecté"]));
    }

}else{
    exit(false);
}
