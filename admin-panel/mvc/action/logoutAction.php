<?php
require '../autoloader.php';
$session = new \services\SessionService();
$constants = new \services\ConstantsKey();
// $session_details = $session->checkSession($constants->USERS_SESSION);
$session->deleteSession($constants->USERS_SESSION);
header("location: ./../../");