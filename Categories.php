<?php

require_once "mysql_credentials.php";

class Categories{

    ///TODO - change ids to exemplars of Category;
    public function getCategories(){
        return $this->getCategoriesByParent(null);
    }
    public function getCategoriesByParent($parent){
        $categories = array(
            "head" => $parent,
            "childrens" => $this->getChildrens($parent)
        );
        foreach ($categories["childrens"] as $children){
            array_push($categories, $this->getCategoriesByParentId($children));
        }
        return $categories;
    }
    public function getChildrens($category){
        $query = "SELECT * FROM categories WHERE parent_id = $category->id ;";
        $result = MySql::query($query);
        return $result->fetch_array();
    }
    public function deleteCategory($categoryId){
        foreach ($this->getChildrensId($categoryId) as $childId) {
            $this->deleteCategory($childId);
        }
        $query = "DELETE FROM categories WHERE id = $categoryId";
        MySql::query($query);
    }
    public function addCategory($name, $description, $parentId){
        $query = "INSERT INTO categories (name, description, parentId)".
                " VALUES ( $name , $description , $parentId ) ;";
        MySql::query($query);
    }
    public function changeCategoryName($id, $newName){
        $query = "UPDATE categories SET name = $newName WHERE id = $id;";
        MySQL::query($query);
    }
    public function changeCategoryDescription($id, $newDescription){
        $query = "UPDATE categories SET description = $newDescription WHERE id = $id;";
        MySQL::query($query);
    }
}