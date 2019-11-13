<?php
session_start();
$authorized = false;

if(!$authorized){
    header("Location:login.php");
    require_once "views/LoginView.php";
}

?>