<?php
require './../../autoloader.php';

$session = new \services\SessionService();
$constants = new \services\ConstantsKey();
$commonService = new \services\CommonService();
$banner = new \controller\banner\BannerController;

$response = $banner->getBannerController(array('bnr_id' => $_GET['id']));
echo json_encode($response);