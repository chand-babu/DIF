<?php

namespace controller\gallery;

use model\gallery\GalleryModel;

class GalleryController {
    //private $authentication = null;
    function __construct() {
        $this->gallery = new GalleryModel();
    }

    public function listGalleryController(){
        return $this->gallery->listGalleryModel();
    }

    public function getGalleryController($id){
        return $this->gallery->getGalleryModel($id);
    }

    public function popularGalleryController(){
        return $this->gallery->popularGalleryModel();
    }

    public function getGalleryImageController($data){
        return $this->gallery->getGalleryImageModel($data);
    }
}