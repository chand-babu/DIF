<?php

namespace services;

class SessionService
{
    function __construct() {
    }

    public function createNewSession($sessionName, $data) {
        $sessionData = json_encode($data);
        $_SESSION[$sessionName] = $sessionData;
    }

    public function getSessionDetails($sessionName) {
        if ($this->checkSession($sessionName)) {
            $data = json_decode($_SESSION[$sessionName]);
            return array(
                'result' => true,
                'message' => 'Retrieved Successfully',
                'data' => $data
            );
        } else {
            return array(
                'result' => false,
                'message' => 'Session Not Found',
                'data' => []
            );
        }
    }

    public function checkSession($sessionName) {
        if (!isset($_SESSION[$sessionName])) {
            return false;
        } else {
            return true;
        }
    }

    public function deleteSession($sessionName) {
        unset($_SESSION[$sessionName]);
    }

    public function destroyAllSession() {
        session_destroy();
    }
}