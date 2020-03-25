<?php 
include_once './helpers/init.php';

includeView('sub-views/header.php');

$request = str_replace('/projects/dailyimagefunda/', '/', $_SERVER['REQUEST_URI']);
switch($request) {
    case '/' :
        requireView('landing/index.php');
    break;
    default:
        http_response_code(404);
        requireView('error/404.php');
    break;
}

includeView('sub-views/footer.php');
?>