<?php

namespace controller\gallery;

use model\gallery\GalleryModel;

class GalleryController {
    //private $authentication = null;
    function __construct() {
        $this->gallery = new GalleryModel();
    }

    public function addGalleryController($data){
        return $this->gallery->addGalleryModel($data);
    }

    public function listGalleryController(){
        return $this->gallery->listGalleryModel();
    }

    public function getGalleryController($data){
        return $this->gallery->getGalleryModel($data);
    }

    public function editGalleryController($data){
        return $this->gallery->editGalleryModel($data);
    }

    public function deleteGalleryController($data){
        return $this->gallery->deleteGalleryModel($data);
    }

    public function orderGalleryController($data){
        return $this->gallery->orderGalleryModel($data);
    }
}