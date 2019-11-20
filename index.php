<?php

header('Content-Type: text/html; charset=utf-8');
session_start();
$auth = false;
if(isset($_SESSION["login"]) && isset($_SESSION["id"]) && isset($_SESSION["authenticated"])){
    $auth=true;
}
if($auth){
    header("Location:views/Main.php");
}
else{
    header("Location:views/Login.php");
}
