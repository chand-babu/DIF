<?php
require './../../autoloader.php';

$session = new \services\SessionService();
$constants = new \services\ConstantsKey();
$commonService = new \services\CommonService();
$galleryList = new \controller\gallery\GalleryController;

$response = $galleryList->listGalleryController();
//print_r($response['data']);
echo json_encode($response['data']);