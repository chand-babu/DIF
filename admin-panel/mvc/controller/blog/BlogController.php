<?php

namespace controller\blog;

use model\blog\BlogModel;

class BlogController {
    //private $authentication = null;
    function __construct() {
        $this->blog = new BlogModel();
    }

    public function addBlogController($data){
        return $this->blog->addBlogModel($data);
    }

    public function listBlogController(){
        return $this->blog->listBlogModel();
    }

    public function getBlogController($data){
        return $this->blog->getBlogModel($data);
    }

    public function editBlogController($data){
        return $this->blog->editBlogModel($data);
    }

    public function deleteBlogController($data){
        return $this->blog->deleteBlogModel($data);
    }
}