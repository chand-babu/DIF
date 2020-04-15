<?php
require './../../autoloader.php';

$session = new \services\SessionService();
$constants = new \services\ConstantsKey();
$commonService = new \services\CommonService();
$banner = new \controller\banner\BannerController;

$userSessionData = json_decode(json_encode($session->getSessionDetails($constants->USERS_SESSION)['data']), true);
$image_name = $commonService->uploadFilesToDirectory($_FILES['image'], 'banner');
$data = array(
    'bnr_id' => $commonService->getUniqueIdentityCode('BNR', false),
    'title' => $_POST['title'],
    'description' => $_POST['description'],
    'url_redirect' => $_POST['url'],
    'image_lg' => $image_name[0],
    'image_sm' => $image_name[1],
    'bnr_status' => 1,
    'created' => strval(json_encode(array(
                    'created_on' => date("Y-m-d h:i:sa"),
                    'created_by' => $userSessionData['full_name'])
                    )
                ));
$response = $banner->addBannerController($data);
echo json_encode($response);