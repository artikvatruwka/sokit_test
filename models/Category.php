<?php


class Category
{
    public $id;
    public $name;
    public $description;
    public $parent;

    public function __construct(?int $id,?string $name,?string $description,?int $parent)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->parent = $parent;
    }


}