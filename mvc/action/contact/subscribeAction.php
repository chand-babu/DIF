<?php
require './../../autoloader.php';

$contact = new \controller\contact\ContactController;

$data = array(
    'sb_id' => 'SUB'. md5(uniqid(rand(), true)),
    'email' => $_POST['email'],
    'sb_status' => 1,
    'created' => date("Y-m-d h:i:sa")
);
$response = $contact->addSubscribeController($data);
echo json_encode($response);