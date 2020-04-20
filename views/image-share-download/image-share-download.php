<?php
require 'mvc/autoloader.php';
$category = new \controller\category\CategoryController();
$response = $category->listCategoryController();
$categoryListing = $response['result'] ? $response['data'] : array();

// $uriArray = explode('/', $_SERVER['REQUEST_URI']);
// $post = str_replace('-', ' ', $uriArray[count($uriArray) - 1]);
//$image_values = $_SESSION['image'][$post];
// echo '<pre>';print_r($_SESSION);echo '</pre>';
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-9 mt-5">
            <div class="blog column text-center">
                <img id="image-view" src="" alt="" width="100%">
                <h4 id="image-title" class="mt-2"></h4>
                <p id="image-desc"></p>
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="header_links">
                             <ul>
                                 <li><a target="_blank" href="https://www.facebook.com/dailyimagefunda/"> <i class="fab fa-facebook-f"></i> </a></li>
                                 <li><a target="_blank" class="twiter" href="https://twitter.com/home?lang=en"> <i class="fab fa-twitter"></i> </a></li>
                                 <li><a target="_blank" class="insta" href="https://www.linkedin.com/in/daily-image-0b144719a/"> <i class="fab fa-linkedin"></i> </a></li>
                                 <li><a target="_blank" class="insta" href="https://in.pinterest.com/dailyimage/"> <i class="fab fa-pinterest"></i> </a></li>
                                 <li><a target="_blank" class="insta" href="https://www.instagram.com/daily_image_funda/"> <i class="fab fa-instagram"></i> </a></li>
                             </ul>
                         </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <a id="img-download" href="" download>
                            <button class="w-100 n-button">
                                <i class="fa fa-download"></i> Download
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 sidebar mt-5">
            <!-- <div class="widget widget-search">
                <form action="#" method="get" accept-charset="utf-8">
                    <input type="text" name="widget-search" placeholder="Search">
                </form>
            </div> -->
            <div class="widget widget-categories">
                <div class="widget-title">
                    <h3>Categories</h3>
                </div>
                <ul class="cat-list">
                <?php
                    //print_r($categoryListing);
                    foreach ($categoryListing as $key => $value) {
                        echo '<li>
                                <a href="'.URL_BASE.'categories/'.str_replace(' ','-', $value['name']).'"><i class="fas fa-chevron-right"></i> '.$value['name'].'<span>('.$value['gal_count'].')</span></a>
                            </li>';
                    }
                ?>	
                </ul>
            </div>
            <!-- <div class="widget widget-tags">
                <div class="widget-title">
                    <h3>Popular Tags</h3>
                </div>
                <ul class="tag-list">
                    <li>
                        <a href="#" class="waves-effect waves-teal">Phone</a>
                    </li>
                    <li>
                        <a href="#" class="waves-effect waves-teal">Cameras</a>
                    </li>
                    <li>
                        <a href="#" class="waves-effect waves-teal">Computers</a>
                    </li>
                    <li>
                        <a href="#" class="waves-effect waves-teal">Laptops</a>
                    </li>
                    <li>
                        <a href="#" class="waves-effect waves-teal">Headphones</a>
                    </li>
                </ul>
            </div> -->
        </div>
    </div>
</div>