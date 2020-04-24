<?php 
$base = rtrim(rtrim($_SERVER['PHP_SELF'], $_SERVER['REQUEST_URI']), 'index.php');
define("URL_BASE", 'http://version2.dailyimagefunda.com/');
//define("URL_BASE", $base);
include_once './helpers/init.php';

//includeView('sub-views/header.php');
// Require composer autoloader
require __DIR__ . '/vendor/autoload.php';

$router = new \Bramus\Router\Router();

$router->get('/', function() {
    echo includeView('sub-views/header.php');
    echo requireView('landing/index.php');
});

$router->get('/categories', function() {
    includeView('sub-views/header.php');
    echo requireView('categories/categories.php');
});

$router->get('/galleries', function() {
    includeView('sub-views/header.php');
    echo requireView('sub-categories/sub-categories.php');
});

$router->get('/categories/{gal}', function($gal) {
    includeView('sub-views/header.php');
    echo requireView('sub-categories/sub-categories.php');
});

$router->get('/image/{val}', function($val) {
    includeView('sub-views/header.php');
    echo requireView('image-share-download/image-share-download.php');
});

$router->get('/search/{val}', function($val) {
    includeView('sub-views/header.php');
    echo requireView('search-results/search-results.php');
});

$router->get('/about', function() {
    includeView('sub-views/header.php');
    echo requireView('about/about.php');
});

$router->get('/contact', function() {
    includeView('sub-views/header.php');
    echo requireView('contact/contact.php');
});

$router->get('/privacy', function() {
    includeView('sub-views/header.php');
    echo requireView('privacy/privacy.php');
});

$router->get('/blog', function() {
    includeView('sub-views/header.php');
    echo requireView('blogs-list/blogs-list.php');
});

$router->get('/single-blog', function() {
    includeView('sub-views/header.php');
    echo requireView('categories-blog/categories-blog.php');
});

$router->get('/404', function() {
    includeView('sub-views/header.php');
    echo requireView('error/404.php');
});

$router->get('/{post}', function($post) {
    includeView('sub-views/header.php');
    echo requireView('categories-images/categories-images.php');
    //echo requireView('blog-post/blog-post.php');
});



$router->run();

includeView('sub-views/footer-bar.php');

includeView('sub-views/footer.php');

?>