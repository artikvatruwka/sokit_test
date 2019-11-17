
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>

<?php
session_start();
require_once "../controllers/CategoriesController.php";
require_once "../models/Category.php";
$categories = new CategoriesController();
$level = 0;
$category = $categories->getCategories();
printCategories($category,$level);

function printCategories($category,$level){
    if($level>0){
        echo "<br>";
        echo "<input class='btn' type='button' data-id='".$category["head"]->id."' name='add' value='➕ add' > ";
        echo "<input class='btn' type='button' data-id='".$category["head"]->id."' name='modify' value='📝 edit' > ";
        echo "<input class='btn'type='button' data-id='".$category["head"]->id."' name='delete' value='🗑️ delete'> ";



        for($i=1; $i<$level; $i++){
            if($level)
                echo "___ ";
        }
        echo "<span title='".$category["head"]->description."'>". $category["head"]->name."</span>";
    }

    $level++;
    foreach($category["childrens"] as $child){
        printCategories($child,$level);
    }
}
?>

</body>
</html>
