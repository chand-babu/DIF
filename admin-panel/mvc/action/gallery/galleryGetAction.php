<?php
require './../../autoloader.php';

$session = new \services\SessionService();
$constants = new \services\ConstantsKey();
$commonService = new \services\CommonService();
$gallery = new \controller\gallery\GalleryController;

$response = $gallery->getGalleryController(array('gal_id' => $_GET['id']));
echo json_encode($response);