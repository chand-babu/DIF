<?php
require './../../autoloader.php';

$session = new \services\SessionService();
$constants = new \services\ConstantsKey();
$commonService = new \services\CommonService();
$category = new \controller\category\CategoryController;

$id = $_REQUEST;
//print_r($id);
$response = $category->deleteCategoryController($id);
echo json_encode($response);