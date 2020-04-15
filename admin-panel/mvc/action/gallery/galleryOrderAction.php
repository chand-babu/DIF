<?php
require './../../autoloader.php';

$session = new \services\SessionService();
$constants = new \services\ConstantsKey();
$commonService = new \services\CommonService();
$gallery = new \controller\gallery\GalleryController;

$arrayData = json_decode($_POST['dataSet'], true);

$index = 0;
$cat = '';
$condition = '';
$where = '';

foreach ($arrayData as $key => $value) {
    $join = (count($arrayData) - 1) > $index ?  'JOIN ': '';
    $and = (count($arrayData) - 1) > $index ?  'AND ': '';
    $comma = (count($arrayData) - 1) > $index ?  ', ': '';
    $cat .= 'gallery t' .( $index + 1 ). ' '. $join;
    $condition .= "t" .( $index + 1 ). ".gal_id='".$value["gal_id"]. "' ". $and;
    $where .= 't'.($index + 1).'.trending_order='. $value['order']. $comma; 
    $index++;
}
$query = count($arrayData) == 1 ? "UPDATE gallery SET trending_order = ".$arrayData[0]['order']." WHERE gal_id='".$arrayData[0]['gal_id']."'": 'UPDATE ' .$cat. 'ON '.$condition. 'SET '. $where. ';';
$response = $gallery->orderGalleryController($query);
echo json_encode($response);