<?php
require './../../autoloader.php';

$session = new \services\SessionService();
$constants = new \services\ConstantsKey();
$commonService = new \services\CommonService();
$gallery = new \controller\gallery\GalleryController;

$id = $_REQUEST;
//print_r($id);
$response = $gallery->deleteGalleryController($id);
echo json_encode($response);