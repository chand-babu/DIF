<?php
require './../../autoloader.php';

$session = new \services\SessionService();
$constants = new \services\ConstantsKey();
$commonService = new \services\CommonService();
$categoryAdd = new \controller\category\CategoryController;

$arrayData = json_decode($_POST['dataSet'], true);

$index = 0;
$cat = '';
$condition = '';
$where = '';

foreach ($arrayData as $key => $value) {
    $join = (count($arrayData) - 1) > $index ?  'JOIN ': '';
    $and = (count($arrayData) - 1) > $index ?  'AND ': '';
    $comma = (count($arrayData) - 1) > $index ?  ', ': '';
    $cat .= 'category t' .( $index + 1 ). ' '. $join;
    $condition .= "t" .( $index + 1 ). ".cat_id='".$value["cat_id"]. "' ". $and;
    $where .= 't'.($index + 1).'.trending_order='. $value['order']. $comma; 
    $index++;
}
$query = $query = count($arrayData) == 1 ? "UPDATE category SET trending_order = ".$arrayData[0]['order']." WHERE cat_id='".$arrayData[0]['cat_id']."'": 'UPDATE ' .$cat. 'ON '.$condition. 'SET '. $where. ';';
$response = $categoryAdd->orderCategoryController($query);
echo json_encode($response);