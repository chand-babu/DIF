<?php
require './../../autoloader.php';

$session = new \services\SessionService();
$constants = new \services\ConstantsKey();
$commonService = new \services\CommonService();
$subscribeList = new \controller\subscribe\SubscribeController;

$response = $subscribeList->listSubscribeController();
echo json_encode($response['data']);