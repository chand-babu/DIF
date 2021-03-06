<?php
//require 'mvc/autoloader.php';
$category = new \controller\category\CategoryController();
$banner = new \controller\banner\BannerController();
$gallery = new \controller\gallery\GalleryController();
$blog = new \controller\blog\BlogController();


$response = $category->listCategoryController();
$responseBanner = $banner->listBannerController();
$responseGallery = $gallery->listGalleryController();
$popularGallery = $gallery->popularGalleryController();
$responseBlog = $blog->letestBlogController();

$categoryListing = $response['result'] ? $response['data'] : array();
$bannerListing = $responseBanner['result'] ? $responseBanner['data'] : array();
$galleryLisiting = $responseGallery['result'] ? $responseGallery['data'] : array();
$blogLisiting = $responseBlog['result'] ? $responseBlog['data'] : array();
$popularLisiting = $popularGallery['result'] ? $popularGallery['data'] : array();
//print_r($popularLisiting);
$popularImages = array();
foreach ($popularLisiting as $key => $value) {
    array_push($popularImages, $value['featured_image_sm']);
    foreach (json_decode($value['gallery_images'], true) as $childkey => $childvalue) {
        array_push($popularImages, json_decode($childvalue['imageName'], true)[1]);
    }
}
?>

<div class="container-fluid">

    <div class="row">
        <div class="col-12 search__container p-5">
            <p class="search__title">
                Go ahead, and search images
            </p>
            <input id="ch-search" class="search__input" type="text" placeholder="Search">
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="swiper-container main-slider loading">
                <div class="swiper-wrapper banner-ghost">
                    <?php
                        foreach ($bannerListing as $key => $value) {
                            echo '
                            <div class="swiper-slide position-relative">
                                <figure class="slide-bgimg" style="background-image:url(.'.$value['image_lg'].')">
                                    <img src=".'.$value['image_lg'].'" class="entity-img" />
                                </figure>
                                <div class="content">
                                    <p class="title">'.$value['title'].'</p>
                                    <span class="caption">'.$value['description'].'</span>
                                </div>
                                <!-- on hover -->
                                <div class="w-100 h-100 view-more position-absolute">
                                    <div class="banner-footer">
                                        <div class="w-75">
                                            <h4 class="title">'.$value['title'].'</h4>
                                            <p>
                                                <span class="caption">'.$value['description'].'</span>
                                            </p>
                                        </div>
                                        <div class="w-25">
                                            <a target="_blank" href="'.$value['url_redirect'].'">
                                                <button class="text-white n-button mr-3">View More <i class="fas fa-angle-double-right"></i></button>
                                            </a> 
                                        </div>
                                    </div>
                                </div>
                            </div>';
                        }
                    ?>
                </div>
                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev swiper-button-white"></div>
                <div class="swiper-button-next swiper-button-white"></div>
            </div>

            <!-- Thumbnail navigation -->
            <div class="swiper-container nav-slider loading d-none d-md-block">
                <div class="swiper-wrapper" role="navigation">
                    <?php
                        foreach ($bannerListing as $key => $value) {
                            echo '
                            <div class="swiper-slide">
                                <figure class="slide-bgimg" style="background-image:url(.'.$value['image_lg'].')">
                                    <img src=".'.$value['image_lg'].'" class="entity-img" />
                                </figure>
                                <div class="content">
                                    <p class="title">'.$value['title'].'</p>
                                </div>
                            </div>';
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12 col-lg-9 ">
            <div class="container">
                <div class="row">
                    <div class="col-12 mt-3 text-uppercase text-center">
                        <h4>Trending Categories</h4>
                        <div class="slick-trending-slider mt-3">
                        <?php
                            foreach ($categoryListing as $key => $value) {
                                echo '
                                <a href="./categories" class="text-decoration-none">
                                    <div class="img-container-trending">
                                        <div class="position-relative">
                                            <div>
                                                <img src=".'.$value['image_sm'].'" alt="Banner One" />
                                            </div>
                                            <div class="w-100 h-100 image-name">
                                                <div class="text-overflow" title="'.$value['name'].'">'.$value['name'].'</div>
                                            </div>
                                        </div>
                                    </div>
                                </a>';
                            }
                        ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mt-3 text-uppercase text-center">
                        <h4>Galleries</h4>
                        <div class="slick-trending-slider mt-3">
                        <?php
                            foreach ($galleryLisiting as $key => $value) {
                                echo '
                                <a class="text-decoration-none" href="./'.$value['post_url'].'"><div class="img-container-trending">
                                    <div class="position-relative">
                                        <div>
                                            <img src=".'.$value['featured_image_sm'].'" alt="Banner One" />
                                        </div>
                                        <div class="w-100 h-100 image-name">
                                            <div class="text-overflow" title="'.$value['title'].'">'.$value['title'].'</div>
                                        </div>
                                    </div>
                                </div> </a>';
                            }
                        ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mt-3 text-uppercase text-center">
                        <h4>Popular Downloads</h4>
                        <div class="slick-trending-slider mt-3">
                            <?php 
                                foreach ($popularImages as $key => $value) {
                                    echo '<div class="img-container-trending">
                                    <div class="position-relative">
                                        <div>
                                            <img src=".'.$value.'" alt="Banner One" />
                                        </div>
                                        <div class="w-100 h-100 image-name">
                                            <div>
                                                <a class="text-decoration-none primary-color" href=".'.$value.'" download
                                                style="text-decoration: none;outline:none;">
                                                    <i class="fas fa-download mr-3"></i>
                                                </a>
                                                <i class="fas fa-share-alt"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>';     
                                }
                            ?>
                            
                        </div>
                    </div>
                </div>

                <div class="row text-center">
                    <div class="col-12 my-4">
                        <h1 class="text-center">Latest Blogs</h1>
                    </div>
                    <?php
                        foreach ($blogLisiting as $key => $value) {
                            $postDate = json_decode($value['created'], true);
                            //print_r($postDate);
                            echo '
                            <a class="text-decoration-none" href="'.URL_BASE.$value['post_url'].'">
                            
                            <div class="col-sm-6 col-md-4">
                            <div class="blog-box">
                                <div class="blog-box-image">
                                    <img class="w-100" src=".'.$value['image_sm'].'" class="img-responsive" alt="'.$value['image_alt'].'">
                                </div>
                                <div class="blog-box-content">
                                    <h4 class="mt-2 multi-line-truncate" title="'.$value['title'].'"><a href="'.URL_BASE.$value['post_url'].'">'.$value['title'].'</a></h4>
                                    <p class="multi-line-truncate" title="'.$value['description'].'">'.$value['description'].'</p>
                                    <div class="row mb-2 border-bottom pb-2">
                                        <div class="col-6 text-left">
                                            <i class="fab fa-facebook-f"></i>
                                            <i class="fab fa-twitter"></i>
                                            <i class="fab fa-instagram"></i>
                                        </div>
                                        <div class="col-6" style="font-size: 12px">
                                            <div class="text-right">
                                                <i class="fas fa-calendar-week"></i>
                                                <span>'.date("d/m/Y", strtotime($postDate['created_on'])).'</span>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="'.URL_BASE.$value['post_url'].'" class="btn btn-default site-btn text-white text-decoration-none">Read More</a>
                                </div>
                            </div>
                        </div> 
                            
                            </a>';
                        }
                    ?>
                </div>

            </div>
        </div>
        <div class="col-lg-3 d-none d-lg-block">
            <div class="side-nav-container sticky-top overflow-auto" style="top: 100px;max-height: 350px;">
                <div class="title"> Categories </div>
                <ul class="side-nav-landing sticky-top text-capitalize">
                    <?php
                        //print_r($categoryListing);
                        foreach ($categoryListing as $key => $value) {

                            echo '<li><a class="text-white" href="'.URL_BASE.'categories/'.str_replace(' ','-', strtolower($value['name'])).'" style="text-decoration:none;">
                                <span>'.$value['name'].' ('.$value['gal_count'].')</span>
                                    <i class="fas fa-angle-double-right float-right"></i></a>
                                </li>';

                            // echo '<li><a class="text-white" href="'.URL_BASE.'categories/'.str_replace(' ','-', $value['name']).'" style="text-decoration:none;">
                            //     <span>'.$value['name'].' ('.$value['gal_count'].')</span>
                            //         <i class="fas fa-angle-double-right float-right"></i></a>
                            //     </li>';
                        }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>