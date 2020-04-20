<?php

namespace controller\post;

use model\post\PostModel;

class PostController {
    function __construct() {
        $this->post = new PostModel();
    }

    public function searchPostController($data,$page){
        return $this->post->searchPostModel($data,$page);
    }

    public function getPostController($data){
        return $this->post->getPostModel($data);
    }
}