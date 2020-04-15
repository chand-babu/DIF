<?php

namespace controller\subscribe;

use model\subscribe\SubscribeModel;

class subscribeController {
    //private $authentication = null;
    function __construct() {
        $this->subscribe = new SubscribeModel();
    }

    public function listSubscribeController(){
        return $this->subscribe->listSubscribeModel();
    }
}