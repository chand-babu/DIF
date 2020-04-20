<?php 
$base = rtrim(rtrim($_SERVER['PHP_SELF'], $_SERVER['REQUEST_URI']), 'index.php');
define("URL_BASE", $base);
include_once './helpers/init.php';

includeView('sub-views/header.php');
// Require composer autoloader
require __DIR__ . '/vendor/autoload.php';

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

$router->get('/categories/{gal}', function($gal) {
    echo requireView('sub-categories/sub-categories.php');
});

$router->get('/image/{share}', function($share) {
    echo requireView('image-share-download/image-share-download.php');
});

$router->get('/search/{val}', function($val) {
    echo requireView('search-results/search-results.php');
});

$router->get('/{cat}/{post}', function($cat, $post) {
    echo requireView('categories-images/categories-images.php');
    //echo requireView('blog-post/blog-post.php');
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

$router->get('/single-blog', function() {
    echo requireView('categories-blog/categories-blog.php');
});

$router->get('/404', function() {
    echo requireView('error/404.php');
});



$router->run();

includeView('sub-views/footer-bar.php');

includeView('sub-views/footer.php');

?>