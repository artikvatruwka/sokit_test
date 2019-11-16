<?php

header('Content-Type: text/html; charset=utf-8');
session_start();
$authorized = false;

if($authorized){
    header("Location:views/Main.php");
    require_once "views/Main.php";
}
else{
    header("Location:views/Login.php");
    require_once "views/Login.php";
}

?>