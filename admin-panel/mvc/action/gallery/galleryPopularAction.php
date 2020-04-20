<?php
require './../../autoloader.php';

$session = new \services\SessionService();
$constants = new \services\ConstantsKey();
$commonService = new \services\CommonService();
$gallery = new \controller\gallery\GalleryController;

$data = array('gal_id' => $_POST['gal_id'], 'status' => $_POST['status']); 

$response = $gallery->popularGalleryController($data);
echo json_encode($response);