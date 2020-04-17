<?php
require 'mvc/autoloader.php';

$gallery = new \controller\gallery\GalleryController();

$responseGallery = $gallery->listGalleryController();

$galleryLisiting = $responseGallery['result'] ? $responseGallery['data'] : array();
// echo '<pre>';print_r($galleryLisiting);echo '</pre>';
?>

<div class="container-fluid mt-3 mb-5 p-4 d-none">
    <div class="row">
        <div class="col-12 my-3">
            <h1>Gallery</h1>
        </div>
        <div class="col-lg-6 col-lg-offset-0 col-md-6 col-md-offset-0 col-sm-10 col-sm-offset-1 col-xs-12">
            <figure>
                <div class="media"
                    style="background-image:url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/584938/bg_15.png);"></div>
                <figcaption>
                    <svg viewBox="0 0 200 200" version="1.1" preserveAspectRatio="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <defs>
                            <mask id="mask" ,="," x="0" y="0" width="100%" height="100%">
                                <rect id="alpha" ,="," x="0" y="0" width="100%" height="100%"></rect>
                                <text class="title" dx="50%" dy="3.5em">Blogs</text>
                            </mask>
                        </defs>
                        <rect id="base" ,="," x="0" y="0" width="100%" height="100%"></rect>
                    </svg>
                    <div class="body">
                        <p>Enamel pin selvage health goth edison bulb, venmo glossier tattooed hella butcher cred
                            iPhone.</p>
                    </div>
                </figcaption><a href="#"></a>
            </figure>
        </div>
        <div class="col-lg-6 col-lg-offset-0 col-md-6 col-md-offset-0 col-sm-10 col-sm-offset-1 col-xs-12">
            <figure>
                <div class="media"
                    style="background-image:url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/584938/bg_5.png);"></div>
                <figcaption>
                    <svg viewBox="0 0 200 200" version="1.1" preserveAspectRatio="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <defs>
                            <mask id="mask1" ,="," x="0" y="0" width="100%" height="100%">
                                <rect id="alpha" ,="," x="0" y="0" width="100%" height="100%"></rect>
                                <text class="title" dx="50%" dy="3.5em">Images</text>
                            </mask>
                        </defs>
                        <rect id="base1" ,="," x="0" y="0" width="100%" height="100%"></rect>
                    </svg>
                    <div class="body">
                        <p>Enamel pin selvage health goth edison bulb, venmo glossier tattooed hella butcher cred
                            iPhone.</p>
                    </div>
                </figcaption><a href="#"></a>
            </figure>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-12 mt-4">
            <h1 class="text-center">Gallery</h1>
        </div>
        <div class="col-md-9 col-12">
            <div class="row">
                <h4 class="my-5 text-center w-100">Latest Images</h4>
                <?php
                    foreach ($galleryLisiting as $key => $value) {
                        echo '
                        <div class="col-4 mb-3">
                            <div class="position-relative w-100">
                                <div>
                                    <a href="./galleries-images">
                                        <img class="w-100" src=".'.$value['featured_image_sm'].'" height="216px" />
                                    </a>
                                </div>
                                <div class="position-absolute photo-name">
                                    <div>'.$value['title'].'</div>
                                </div>
                            </div>
                        </div>';
                    }
                ?>
                
            </div>
        </div>

        <div class="col-12 col-md-3 shadow">
            <div class="row">
                <div class="col-12 my-5">
                    <h4 class="text-center mb-0">Recents Blogs</h4>
                </div>
                <div class="col-12 mb-3">
                    <div class="shadow w-100">
                        <img class="w-100" src="http://unsplash.it/600/400?image=940" alt="blog image" />
                        <div class="text-center py-3 bg-white text-dark">
                            Blog Title what is blog??? blog blog blog
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <div class="shadow w-100">
                        <img class="w-100" src="http://unsplash.it/640/450?image=906" alt="blog image" />
                        <div class="text-center py-3 bg-white text-dark">
                            Blog Title
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <div class="shadow w-100">
                        <img class="w-100" src="http://unsplash.it/600/400?image=940" alt="blog image" />
                        <div class="text-center py-3 bg-white text-dark">
                            Blog Title
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <button class="n-button w-100">View More</button>
                </div>
            </div>
        </div>

    </div>
</div>