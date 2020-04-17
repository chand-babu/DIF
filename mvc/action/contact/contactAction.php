<?php
require './../../autoloader.php';

$contact = new \controller\contact\ContactController;

$data = array(
    'con_id' => 'CON'. md5(uniqid(rand(), true)),
    'name' => $_POST['name'],
    'email' => $_POST['email'],
    'subject' => $_POST['subject'],
    'message' => $_POST['message'],
    'con_status' => 1,
    'created' => date("Y-m-d h:i:sa")
);
//print_r($data);
$response = $contact->addContactController($data);
echo json_encode($response);