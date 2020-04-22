<?php
require './../../autoloader.php';

$session = new \services\SessionService();
$constants = new \services\ConstantsKey();
$commonService = new \services\CommonService();
$gallery = new \controller\gallery\GalleryController;
$userSessionData = json_decode(json_encode($session->getSessionDetails($constants->USERS_SESSION)['data']), true);

if (isset($_POST['image_index'])) {
    //print_r($_FILES);
    if (isset($_FILES['image'])){
        $response = $commonService->uploadFilesToDirectory($_FILES['image'], 'gallery');    
    } else {
        $response = $commonService->uploadFilesToDirectory($_FILES['image-'.$_POST['image_index']], 'gallery');
    }
    echo json_encode(!empty($response) ? array('result' => true, 'file' => $response) : array('result' => false, 'file' => ''));
}

if (!isset($_POST['image_index'])) {
    $arraySet = array();
    $allData = array();
    $index = 0;
    foreach ( $_POST as $key => $value )
    {   
        if ($key == 'category' || $key == 'title' || $key == 'imageDesc' || $key == 'image-name'||
            $key == 'imageAlt' || $key == 'postUrl' || $key == 'metaTag' || $key == 'metaDesc') { 
        } else {
            $newKey = explode('-', $key);
            $arraySet[$newKey[0]] = $value;
            if (count($arraySet) == 4) {
                array_push($allData, $arraySet);
                unset($arraySet);
                $arraySet = array();
            }
        }
        $index++;
    }
    $created = array('created_on' => date("Y-m-d h:i:sa"), 'created_by' => $userSessionData['full_name']);
    $feat_image = json_decode($_POST['image-name']);
    $uploadData = array(
        'cat_id' => $_POST['category'],
        'gal_id' => $commonService->getUniqueIdentityCode('GAL', false),
        'title' => trim($_POST['title'],""),
        'description' => $_POST['imageDesc'],
        'image_alt' => $_POST['imageAlt'],
        'post_url' => trim($_POST['postUrl']),
        'meta_tag' => $_POST['metaTag'],
        'meta_desc' => $_POST['metaDesc'],
        'featured_image_lg' => $feat_image[0],
        'featured_image_sm' => $feat_image[1],
        'gallery_images' => json_encode($allData),
        'gal_status' => 1,
        'created' => json_encode($created)
    );
    $response = $gallery->addGalleryController($uploadData);
    echo json_encode($response);
}

