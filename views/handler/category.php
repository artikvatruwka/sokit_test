<?php
try{

    require_once "../../controllers/CategoriesController.php";
    require_once "../../models/Category.php";

    if (isset($_POST["action"])){
        $action = $_POST["action"];
        $categoryController = new CategoriesController();
        switch ($action){
            case "add":
                if(isset($_POST["name"]) && isset($_POST["description"]) && isset($_POST["parentId"])){
                    $name = $_POST["name"];
                    $description = $_POST["description"];
                    $parentId = $_POST["parentId"];
                    $category = new Category(null,$name,$description,$parentId);
                    $categoryController->addCategory($category);
                }
                else{
                    throw new Exception("Not set name, description or parent id!");
                }
                break;
            case "edit":
                if(isset($_POST["name"]) && isset($_POST["description"]) && isset($_POST["id"])){
                    $name = $_POST["name"];
                    $description = $_POST["description"];
                    $id = $_POST["id"];
                    $category = new Category($id,$name,$description,null);
                    $categoryController->modifyCategory($category);
                }
                else{
                    throw new Exception("Not set name, description or id!");
                }
                break;
            case "delete":
                if(isset($_POST["name"]) && isset($_POST["description"]) && isset($_POST["id"])){
                    $name = $_POST["name"];
                    $description = $_POST["description"];
                    $id = $_POST["id"];
                    $category = new Category($id,$name,$description,null);
                    $categoryController->modifyCategory($category);
                }
                else{
                    throw new Exception("Not set name, description or id!");
                }
                break;
                break;
        }
    }

}catch(Exception $exception){
    $error = new stdClass();
    $error->status = "error";
    $error->message = $exception->getMessage();
    echo json_encode($error);
}
