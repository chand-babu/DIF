<?php
require './../../autoloader.php';

$session = new \services\SessionService();
$constants = new \services\ConstantsKey();
$commonService = new \services\CommonService();
$categoryAdd = new \controller\category\CategoryController;

$response = $categoryAdd->listCategoryController();
echo json_encode($response['data']);