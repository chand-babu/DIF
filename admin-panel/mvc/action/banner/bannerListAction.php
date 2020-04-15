<?php
require './../../autoloader.php';

$session = new \services\SessionService();
$constants = new \services\ConstantsKey();
$commonService = new \services\CommonService();
$bannerList = new \controller\banner\BannerController;

$response = $bannerList->listBannerController();
echo json_encode($response['data']);