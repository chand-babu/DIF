<?php
require '../autoloader.php';

$session = new \services\SessionService();
$constants = new \services\ConstantsKey();
$flashMessage = new \services\FlashMessage();
$authentication_controller = new \controller\AuthenticationController();

$redirect = '';
$user_data = array('email' => $_POST['email'], 'password' => md5($_POST['password']));

if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $response = $authentication_controller->userLogin($user_data);
    if ($response['result']) {
        $redirect = "../../dashboard.php";
        $session->createNewSession($constants->USERS_SESSION, $response['data']);
    } else {
        $redirect = "../../";
        $flashMessage->setFlashMessage($constants->FLASH_MESSAGE_SESSION_NAME, $response['message'], 1);
    }
}else {
    $redirect = "../../";
    $flashMessage->setFlashMessage($constants->FLASH_MESSAGE_SESSION_NAME, 'Username and Password Required', 1);
}

header("location: ".$redirect);