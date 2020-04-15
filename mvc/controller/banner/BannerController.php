<?php

namespace controller\banner;

use model\banner\BannerModel;

class BannerController {
    //private $authentication = null;
    function __construct() {
        $this->banner = new BannerModel();
    }

    public function listBannerController(){
        return $this->banner->listBannerModel();
    }
}