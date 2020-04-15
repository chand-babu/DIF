<?php
require './../../autoloader.php';

$session = new \services\SessionService();
$constants = new \services\ConstantsKey();
$commonService = new \services\CommonService();
$blog = new \controller\blog\BlogController;

$response = $blog->getBlogController(array('blg_id' => $_GET['id']));
echo json_encode($response);