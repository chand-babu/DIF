<?php
require './../../autoloader.php';

$comment = new \controller\blog\BlogController();

$data = array(
    'blg_id' => $_POST['blog_id'],
    'com_id' => 'COM'. md5(uniqid(rand(), true)),
    'name' => $_POST['comment_name'],
    'message' => $_POST['comment_msg'],
    'com_status' => 0,
    'created' => date("Y-m-d h:i:sa")
);
print_r(json_encode([$data]));
$response = $comment->commentBlogController([$data]);
// echo json_encode($response);