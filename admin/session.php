<?php
//Start session
session_start();
//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['idAdmin']) || (trim($_SESSION['idAdmin']) == '')) {
    header("location: index.php");
    exit();
}
$session_id=$_SESSION['idAdmin'];

?>