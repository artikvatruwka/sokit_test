<?php

    session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Panel</title>
</head>
<body>
<nav class="navbar navbar-dark bg-dark text-white">

    <?php echo "<span>Hello ".$_SESSION["login"] . "!</span>" ?>
    <a href="handler/logout.php">logout</a>
</nav>
<div class="row">
    <div class="col">
        <h1>Categories: </h1>
        <form>
            <input class='btn' type='button' data-id='null' name='add' value='➕ add category' >
            <hr>
            <?php
            require_once dirname(__DIR__)."\\controllers\\CategoriesController.php";
            $categories = new CategoriesController();
            $level = 0;
            $category = $categories->getCategories();



            printCategories($category,$level);

            function printCategories($category,$level){

                if($level>0){
                    echo "<br>";
                    echo "<input class='btn' type='button' data-id='".$category["head"]->id."' name='add' value='➕ add subcategory' > ";
                    echo "<input class='btn' type='button' data-id='".$category["head"]->id."' name='edit' value='📝 edit' > ";
                    echo "<input class='btn'type='button' data-id='".$category["head"]->id."' name='delete' value='🗑️ delete'> ";
                    for($i=1; $i<$level; $i++){
                        if($level)
                            echo " > ";
                    }
                    echo "<span>". $category["head"]->name." </span>";
                    if($category["head"]->description!=""){
                        echo "<small>(".$category["head"]->description.")</small>";
                    }
                }

                $level++;
                foreach($category["childrens"] as $child){
                    printCategories($child,$level);
                }
            }
            ?>
        </form>
        <div id="errors" class="row d-flex justify-content-center">

        </div>
    </div>
</div>
<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="js/ajax.js"></script>
<script type="text/javascript" src="js/category.js"></script>
</body>
</html>
