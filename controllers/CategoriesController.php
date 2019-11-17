<?php

require_once "../mysql_credentials.php";
require_once "../MySQL.php";
class CategoriesController{

    ///TODO - change ids to exemplars of Category;
    public function getCategories(){
        return $this->getCategoriesByParent(new Category("NULL","","",""));
    }
    public function getCategoriesByParent(?Category $parent){
        $categories = array(
            "head" => $parent,
            "childrens" => $this->getChildrens($parent)
        );
        foreach ($categories["childrens"] as &$children){
            $children = $this->getCategoriesByParent($children);
        }
        return $categories;
    }
    public function getChildrens(Category $category){

        if ($category->id === "NULL"){
            $query = "SELECT id, name, description, parent_id FROM categories WHERE parent_id IS $category->id ;";
        }else{
            $query = "SELECT id, name, description, parent_id FROM categories WHERE parent_id = $category->id ;";
        }

        $childrens = array();
        $result = MySql::query($query);
        while($row = $result->fetch_array()){
            array_push($childrens, new Category($row["id"],$row["name"],$row["description"],$row["parent_id"]));
        }
        return $childrens;
    }
    public function deleteCategory(Category $category){
        foreach ($this->getChildrens($category) as $child) {
            $this->deleteCategory($child);
        }
        $query = "DELETE FROM categories WHERE id = $category->id ";
        MySql::query($query);
        return;
    }
    public function addCategory(Category $category){
        $query = "INSERT INTO categories (name, description, parent_id)".
                " VALUES ( $category->name , $category->description , $category->parent ) ;";
        MySql::query($query);
        $query = "SELECT MAX(id) as id FROM categories";
        $lastId = MySQL::query($query)->fetch_array();
        return new Category($lastId["id"],$$category->name,$$category->description,$category->parent);
    }
    public function modifyCategory(Category $new){
        $query = "UPDATE categories SET name = $new->name , description = $new->description WHERE id = $new->id;";
        MySQL::query($query);
        return;
    }

}