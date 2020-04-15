<?php 
include_once './helpers/init.php';

includeView('sub-views/header.php');
//echo $base = rtrim(rtrim($_SERVER['PHP_SELF'], $_SERVER['REQUEST_URI']), 'index.php');
// Require composer autoloader
require __DIR__ . '/vendor/autoload.php';
// Create Router instance
$router = new \Bramus\Router\Router();

$router->get('/', function() {
    echo requireView('landing/index.php');
});

$router->get('/categories', function() {
    echo requireView('categories/categories.php');
});

$router->get('/galleries', function() {
    echo requireView('sub-categories/sub-categories.php');
});

$router->get('/galleries-images', function() {
    echo requireView('categories-images/categories-images.php');
});

$router->get('/about', function() {
    echo requireView('about/about.php');
});

$router->get('/contact', function() {
    echo requireView('contact/contact.php');
});

$router->get('/privacy', function() {
    echo requireView('privacy/privacy.php');
});

$router->get('/blog', function() {
    echo requireView('blogs-list/blogs-list.php');
});

$router->run();

includeView('sub-views/footer-bar.php');

includeView('sub-views/footer.php');

?>