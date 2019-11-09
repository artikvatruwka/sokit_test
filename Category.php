<?php


class Category
{
    public $id;
    public $name;
    public $description;
    public $parent;

    /**
     * Category constructor.
     * @param $id
     * @param $name
     * @param $description
     * @param $parent
     */
    public function __construct($id, $name, $description, $parent)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->parent = $parent;
    }


}