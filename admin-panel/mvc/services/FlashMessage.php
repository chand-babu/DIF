<?php

namespace services;

class FlashMessage
{
    private $session = null;
    function __construct()
    {
        $this->session = new SessionService();
    }

    public function getFlashMessage(string $key): string {
        $message = $this->session->getSessionDetails($key);
        if ($message['result']) {
            $messageData = $message['data'];
            $alertType = ($messageData->message_type==0) ? 'alert-success' : (
                $messageData->message_type==1 ? 'alert-danger' : (
                    $messageData->message_type==2 ? 'alert-info' : 'alert-warning'
                )
            );
            $this->destroyMessage($key);
            return '<div class="alert '. $alertType .' alert-dismissable fade-in"><a href="#" class="close"'.
            ' data-dismiss="alert" aria-label="close">&times;</a>'.
            '<strong>'.$messageData->message.'</strong></div>';
        } else {
            return '';
        }
    }

    public function setFlashMessage(string $key, string $message, int $type = 0) {
        // TYPE - 0:- success, 1:- error, 2: info 3: Warning; DEFAULT = SUCCESS
        if ($this->session->checkSession($key)) {
            $this->destroyMessage($key);
        }
        $this->session->createNewSession($key, array(
            'message' => $message,
            'message_type' => $type
        ));
    }

    private function destroyMessage(string $key) {
        $this->session->deleteSession($key);
    }

}