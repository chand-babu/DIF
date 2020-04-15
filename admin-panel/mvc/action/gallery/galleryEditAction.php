<?php
require './../../autoloader.php';

$session = new \services\SessionService();
$constants = new \services\ConstantsKey();
$commonService = new \services\CommonService();
$gallery = new \controller\gallery\GalleryController;
$userSessionData = json_decode(json_encode($session->getSessionDetails($constants->USERS_SESSION)['data']), true);

if (!isset($_POST['image_index'])) {
    $arraySet = array();
    $allData = array();
    $index = 0;
    foreach ( $_POST as $key => $value )
    {   
        if ($key == 'category' || $key == 'title' || $key == 'imageDesc' ||
            $key == 'image-name' || $key == 'gal_id' || $key == 'gal_status') { 
        } else {
            $newKey = explode('-', $key);
            $arraySet[$newKey[0]] = $value;
            if (count($arraySet) == 3) {
                array_push($allData, $arraySet);
                unset($arraySet);
                $arraySet = array();
            }
        }
        $index++;
    }
    $modified = array('modified_on' => date("Y-m-d h:i:sa"), 'modified_by' => $userSessionData['full_name']);
    $feat_image = json_decode($_POST['image-name']);
    $uploadData = array(
        'cat_id' => $_POST['category'],
        'gal_id' => $_POST['gal_id'],
        'title' => $_POST['title'],
        'description' => $_POST['imageDesc'],
        'featured_image_lg' => $feat_image[0],
        'featured_image_sm' => $feat_image[1],
        'gallery_images' => json_encode($allData),
        'gal_status' => $_POST['gal_status'],
        'modified' => json_encode($modified)
    );
    //print_r($uploadData);die();
    $response = $gallery->editGalleryController($uploadData);
    echo json_encode($response);
}

