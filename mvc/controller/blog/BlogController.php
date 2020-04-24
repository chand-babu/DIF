<?php

namespace controller\blog;

use model\blog\BlogModel;

class BlogController {
    //private $authentication = null;
    function __construct() {
        $this->blog = new BlogModel();
    }

    public function listBlogController(){
        return $this->blog->listBlogModel();
    }

    public function getBlogController($id){
        return $this->blog->getBlogModel($id);
    }

    public function letestBlogController(){
        return $this->blog->letestBlogModel();
    }

    public function commentBlogController($data){
        return $this->blog->commentBlogModel($data);
    }
}