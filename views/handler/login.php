<?php
require_once dirname(__DIR__,2)."\\models\\User.php";
require_once dirname(__DIR__,2)."\\controllers\\UserController.php";
require_once dirname(__DIR__,2)."\\MySQL.php";
try{

    if (isset($_POST['login']) && isset($_POST['password']) ) {
        $login = $_POST['login'];
        $password = $_POST['password'];
        $user = new User($login,$password);
        $userController = new UserController();
        $userController->login($user);
        //session_destroy();
        session_start();

        $response = new stdClass();
        $response->status = "success";
        $response->session = session_id();
        echo json_encode($response);

    }else{
        throw new Exception("no login and password");
    }
}catch(Exception $exception)
{
    $error = new stdClass();
    $error->status = "error";
    $error->message = $exception->getMessage();
    echo json_encode($error);
}