<?php
require './../../autoloader.php';

$session = new \services\SessionService();
$constants = new \services\ConstantsKey();
$commonService = new \services\CommonService();
$blog = new \controller\blog\BlogController;
//echo $_GET['id'];
$response = $blog->checkPostUrlController(array('post_url' => $_GET['id']));
echo json_encode($response);