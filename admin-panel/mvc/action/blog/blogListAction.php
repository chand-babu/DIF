<?php
require './../../autoloader.php';

$session = new \services\SessionService();
$constants = new \services\ConstantsKey();
$commonService = new \services\CommonService();
$blogList = new \controller\blog\BlogController;

$response = $blogList->listBlogController();
//print_r($response);
echo json_encode($response['data']);