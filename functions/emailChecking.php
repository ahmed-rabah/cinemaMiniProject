<?php

require_once('./database.php');

if(isset($_GET["email"],$_GET["username"])){
    $emailDoesExist;
    $userdoesExist;
    $username = $_GET["username"];
    $email = $_GET["email"];
    try {
        $stmt1 = $pdo->prepare("SELECT email FROM user WHERE email = ?");
        $stmt1->execute([$email]);
        $result = $stmt1->rowCount();
        if($result == 0){
            $emailDoesExist =false;
        }else{
            $emailDoesExist=true;
        }

        $stmt2 = $pdo->prepare("SELECT username FROM user WHERE userName = ?");
        $stmt2->execute([$username]);
        $result = $stmt2->rowCount();
        if($result == 0){
            // $userdoesExist ='false';
            $userdoesExist =false;
        }else{
            $userdoesExist= true ;
            // $userdoesExist= 'true' ;
        }
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    exit(json_encode(["email_exist"=>$emailDoesExist,
                        "user_exist"=>$userdoesExist]
                    ));
    // setcookie("is_user",$userdoesExist, time()+120,"/");
    // setcookie("is_email", $emailDoesExist, time(),"/");
}
if(isset($_GET["email"])){
    $emailDoesExist;
    $email = $_GET["email"];
    try {
        $stmt = $pdo->prepare("SELECT email FROM user WHERE email = ?");
        $stmt->execute([$email]);
        $result = $stmt->rowCount();
        if($result == 0){
            $emailDoesExist =false;
        }else{
            $emailDoesExist=true;
        }
    
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    setcookie("is_email", $emailDoesExist, time(),"/");

    exit(json_encode($emailDoesExist));
}

if(isset($_GET["username"])){
    $userdoesExist;
    $username = $_GET["username"];
    try {
        $stmt = $pdo->prepare("SELECT username FROM user WHERE userName = ?");
        $stmt->execute([$username]);
        $result = $stmt->rowCount();
        if($result == 0){
            // $userdoesExist ='false';
            $usersdoesExist =false;
        }else{
            $usersdoesExist= true ;
            // $userdoesExist= 'true' ;
        }
    
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    
    // setcookie("is_user",$userdoesExist, time()+120,"/");
    exit(json_encode($usersdoesExist));
}