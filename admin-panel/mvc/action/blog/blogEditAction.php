<?php
require './../../autoloader.php';

$session = new \services\SessionService();
$constants = new \services\ConstantsKey();
$commonService = new \services\CommonService();
$blog = new \controller\blog\BlogController;

$userSessionData = json_decode(json_encode($session->getSessionDetails($constants->USERS_SESSION)['data']), true);
$image_name = !empty($_FILES['image']['name']) ? $commonService->uploadFilesToDirectory($_FILES['image'], 'blog') : json_decode($_POST['imageName']);

$data = array(
    'blg_id' => $_POST['blg_id'],
    'cat_id' => $_POST['category'],
    'title' => trim($_POST['title'],""),
    'image_alt' => $_POST['image_alt'],
    'post_url' => trim($_POST['post_url']),
    'meta_tag' => $_POST['metaTag'],
    'meta_desc' => $_POST['metaDesc'],
    'description' => $_POST['description'],
    'content' => $_POST['content_description'],
    'image_lg' => $image_name[0],
    'image_sm' => $image_name[1],
    'blg_status' => $_POST['blg_status'],
    'modified' => strval(json_encode(array(
                    'modified_on' => date("Y-m-d h:i:sa"),
                    'modified_by' => $userSessionData['full_name'])
                    )
                ));
//print_r($data['content']);
$response = $blog->editBlogController($data);
echo json_encode($response);