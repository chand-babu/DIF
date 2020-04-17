<?php
require './../../autoloader.php';

$session = new \services\SessionService();
$constants = new \services\ConstantsKey();
$commonService = new \services\CommonService();
$categoryAdd = new \controller\category\CategoryController;

$redirect = '';
$userSessionData = json_decode(json_encode($session->getSessionDetails($constants->USERS_SESSION)['data']), true);
//print_r($userSessionData);
$image_name = $commonService->uploadFilesToDirectory($_FILES['image'], 'category');
if (!empty($image_name) && !empty($_POST['name'])){
    $data = array(
        'cat_id' => $commonService->getUniqueIdentityCode('CAT', false),
        'name' => trim($_POST['name'],""),
        'image_lg' => $image_name[0],
        'image_sm' => $image_name[1],
        'cat_status' => 1,
        'created' => strval(json_encode(array(
                        'created_on' => date("Y-m-d h:i:sa"),
                        'created_by' => $userSessionData['full_name'])
                        )
                    ));
    $response = $categoryAdd->addCategoryController($data);
    echo json_encode($response);
} else {
    $res = array('result' => false, 'message' => 'Form should not empty');
    echo json_encode($res);
}
// header("location: ".$redirect);