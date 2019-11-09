<?php

require_once "mysql_credentials.php";

class Categories{


    private $connection;
    public function __construct()
    {
        $this->connection = new mysqli(HOST,USER,PASSWORD,DATABASE) or die ("MYSQL CONNECTION FAILED:" . mysqli_connect_error());
    }

    public function __destruct()
    {
        $this->connection->close();
    }

    public function getCategories(){
        return getCategoriesByParentId("NULL");
    }

    public function getCategoriesByParentId($parentId){
        $categories = array(
            head => $parentId,
            childrens => $this->getChildrensId($parentId)
        );
        foreach ($categories["childrens"] as $children){
            array_push($categories, $this->getCategoriesByParentId($children));
        }
        return $categories;
    }
    private function addChildCategories($categoryHeadId){

    }

    public function getChildrensId($categoryId){
        mysqli_real_escape_string($categoryId);
        $result = $this->connection->query("SELECT id FROM categories WHERE parent_id = $categoryId");
        return $result->fetch_array();
    }
    public function deleteCategory($categoryId){
        mysqli_real_escape_string($categoryId);
        foreach ($this->getChildrensId() as $childId) {
            $this->deleteCategory($childId);
        }
        $this->connection->query("DELETE FROM categories WHERE id = $categoryId");
    }

    public function addCategory($name, $description, $parentId){
        ///
    }

}