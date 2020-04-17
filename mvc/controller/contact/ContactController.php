<?php

namespace controller\contact;

use model\contact\ContactModel;

class ContactController {
    //private $authentication = null;
    function __construct() {
        $this->contact = new ContactModel();
    }

    public function addContactController($data){
        return $this->contact->addContactModel($data);
    }

    public function addSubscribeController($data){
        return $this->contact->addSubscribeModel($data);
    }
}