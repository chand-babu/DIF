<?php

namespace controller\category;

use model\category\CategoryModel;

class CategoryController {
    //private $authentication = null;
    function __construct() {
        $this->category = new CategoryModel();
    }

    public function addCategoryController($data){
        return $this->category->addCategoryModel($data);
    }

    public function listCategoryController(){
        return $this->category->listCategoryModel();
    }

    public function editCategoryController($data){
        return $this->category->editCategoryModel($data);
    }

    public function deleteCategoryController($data){
        return $this->category->deleteCategoryModel($data);
    }
}