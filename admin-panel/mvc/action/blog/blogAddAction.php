<?php
require './../../autoloader.php';

$session = new \services\SessionService();
$constants = new \services\ConstantsKey();
$commonService = new \services\CommonService();
$blog = new \controller\blog\BlogController;

$userSessionData = json_decode(json_encode($session->getSessionDetails($constants->USERS_SESSION)['data']), true);

if (isset($_POST['blog_img'])) {
    //print_r($_FILES);
    $response = $commonService->uploadFilesToDirectory($_FILES['image'], 'blog');
    echo json_encode(!empty($response) ? array('result' => true, 'file' => $response) : array('result' => false, 'file' => ''));
}

if (!isset($_POST['blog_img'])) {
    $image_name = $commonService->uploadFilesToDirectory($_FILES['image'], 'blog');
    $data = array(
        'blg_id' => $commonService->getUniqueIdentityCode('BLG', false),
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
        'blg_status' => 1,
        'created' => strval(json_encode(array(
                        'created_on' => date("Y-m-d h:i:sa"),
                        'created_by' => $userSessionData['full_name'])
                        )
                    ));
    //print_r($data);
    $response = $blog->addBlogController($data);
    echo json_encode($response);
}