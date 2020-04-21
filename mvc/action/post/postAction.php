<?php
require './../../autoloader.php';

$blog = new \controller\post\PostController();

$responseBlog = $blog->searchPostController($_GET['query'],$_GET['page']);
$blogLisiting = $responseBlog['result'] ? $responseBlog : array();
echo json_encode($blogLisiting);

?>