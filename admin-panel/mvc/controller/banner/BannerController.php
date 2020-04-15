<?php

namespace controller\banner;

use model\banner\BannerModel;

class BannerController {
    //private $authentication = null;
    function __construct() {
        $this->banner = new BannerModel();
    }

    public function addBannerController($data){
        return $this->banner->addBannerModel($data);
    }

    public function listBannerController(){
        return $this->banner->listBannerModel();
    }

    public function getBannerController($data){
        return $this->banner->getBannerModel($data);
    }

    public function editBannerController($data){
        return $this->banner->editBannerModel($data);
    }

    public function deleteBannerController($data){
        return $this->banner->deleteBannerModel($data);
    }
}