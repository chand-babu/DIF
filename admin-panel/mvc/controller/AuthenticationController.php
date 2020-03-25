<?php

namespace controller;

use model\AuthenticationModel;

class AuthenticationController {
    private $authentication = null;
    function __construct() {
        $this->authentication = new AuthenticationModel();
    }

    public function userLogin($data){
        return $this->authentication->userLogin($data);
    }
}