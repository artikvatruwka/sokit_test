<?php
try{

    if (isset($_POST['login']) && isset($_POST['password']) ) {
        $login = $_POST['login'];
        $password = $_POST['password'];
        require_once dirname(__DIR__,2)."\\models\\Category.php";
        require_once dirname(__DIR__,2)."\\controllers\\CategoriesControlleer.php";
        require_once dirname(__DIR__,2)."\\MySQL.php";
        $user = new User($login,$password);
        $userController = new UserController();
        $userController->login($user);
        $response = new stdClass();
        $response->status = "success";
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