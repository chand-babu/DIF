<?php
require './../../autoloader.php';

$session = new \services\SessionService();
$constants = new \services\ConstantsKey();
$commonService = new \services\CommonService();
$categoryAdd = new \controller\category\CategoryController;

$redirect = '';
$userSessionData = json_decode(json_encode($session->getSessionDetails($constants->USERS_SESSION)['data']), true);

$image_name = !empty($_FILES['image']['name']) ? $commonService->uploadFilesToDirectory($_FILES['image'], 'category') : json_decode($_POST['imageData']);
//print_r($image_name);die();
$data = array(
        'cat_id' => $_POST['catId'],
        'name' => $_POST['name'],
        'image_lg' => $image_name[0],
        'image_sm' => $image_name[1],
        'cat_status' => $_POST['status'],
        'modified' => strval(json_encode(array(
                        'modified_on' => date("Y-m-d h:i:sa"),
                        'modified_by' => $userSessionData['full_name'])
                        )
                    )
        );
$response = $categoryAdd->editCategoryController($data);

echo json_encode($response);