<?php
require './../../autoloader.php';

$session = new \services\SessionService();
$constants = new \services\ConstantsKey();
$commonService = new \services\CommonService();
$blog = new \controller\blog\BlogController;

$id = $_REQUEST;
//print_r($id);
$response = $blog->deleteBlogController($id);
echo json_encode($response);