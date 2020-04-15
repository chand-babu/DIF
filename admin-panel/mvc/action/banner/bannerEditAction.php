<?php
require './../../autoloader.php';

$session = new \services\SessionService();
$constants = new \services\ConstantsKey();
$commonService = new \services\CommonService();
$banner = new \controller\banner\BannerController;

$userSessionData = json_decode(json_encode($session->getSessionDetails($constants->USERS_SESSION)['data']), true);
$image_name = !empty($_FILES['image']['name']) ? $commonService->uploadFilesToDirectory($_FILES['image'], 'banner') : json_decode($_POST['imageName']);

$data = array(
    'bnr_id' => $_POST['bnr_id'],
    'title' => $_POST['title'],
    'description' => $_POST['description'],
    'url_redirect' => $_POST['url'],
    'image_lg' => $image_name[0],
    'image_sm' => $image_name[1],
    'bnr_status' => $_POST['bnr_status'],
    'modified' => strval(json_encode(array(
                    'modified_on' => date("Y-m-d h:i:sa"),
                    'modified_by' => $userSessionData['full_name'])
                    )
                ));
//print_r($data);
$response = $banner->editBannerController($data);
echo json_encode($response);