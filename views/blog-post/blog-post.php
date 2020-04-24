<?php
//require 'mvc/autoloader.php';

$blog = new \controller\post\PostController();

$uriArray = explode('/', $_SERVER['REQUEST_URI']);
$post = $uriArray[count($uriArray) - 1];
$cat = str_replace('-', ' ', $uriArray[count($uriArray) - 2]);
$responseGallery = $blog->getPostController(array('name' => $cat, 'post_url' => $post));

$blogLisiting = $responseGallery['result'] ? $responseGallery : array();
echo '<pre>';print_r($blogLisiting);echo '</pre>';

//echo $cat.$post;
?>