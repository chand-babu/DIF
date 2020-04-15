<?php
require './../../autoloader.php';

$session = new \services\SessionService();
$constants = new \services\ConstantsKey();
$commonService = new \services\CommonService();
$banner = new \controller\banner\BannerController;

$id = $_REQUEST;
//print_r($id);
$response = $banner->deleteBannerController($id);
echo json_encode($response);