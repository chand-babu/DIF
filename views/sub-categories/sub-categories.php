<?php
//require 'mvc/autoloader.php';

$uriArray = explode('/', $_SERVER['REQUEST_URI']);
$post = $uriArray[count($uriArray) - 1];

$gallery = new \controller\gallery\GalleryController();
$blog = new \controller\blog\BlogController();

if ($post == 'galleries') {
    $responseGallery = $gallery->listGalleryController();
} else {
    $responseGallery = $gallery->getGalleryController(str_replace('-',' ',$post));
}

$responseBlog = $blog->letestBlogController();

$galleryLisiting = $responseGallery['result'] ? $responseGallery['data'] : array();
$blogLisiting = $responseBlog['result'] ? $responseBlog['data'] : array();
//echo '<pre>';print_r($responseGallery);echo '</pre>';
if (empty($galleryLisiting)){
    header("location: ".URL_BASE.'404');
}
?>

<!-- <div class="container-fluid mt-3 mb-5 p-4 d-none">
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
</div> -->

<div class="container-fluid">
    <div class="row">
        <div class="col-12 mt-4">
            <h1 class="text-center">Gallery</h1>
        </div>
        <div class="col-md-8 col-lg-9 col-12">
            <div class="row">
                <h4 class="my-5 text-center w-100">Latest Images</h4>
                <?php
                    //unset($_SESSION['image']);
                    //$image_array = [];
                    foreach ($galleryLisiting as $key => $value) {
                        //$_SESSION['image'] = array($value['title'] => $value);
                        //array_push($image_array[$value['title']], $value);
                        //$image_array[$value['title']] = $value;
                        //print_r($value);
                        echo '
                        <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-3">
                            <div class="position-relative w-100">
                                <div>
                                    <a href="'.URL_BASE.$value['post_url'].'">
                                        <img class="w-100" src="'.URL_BASE.$value['featured_image_sm'].'" height="216px" />
                                    </a>
                                </div>
                                <div class="position-absolute photo-name">
                                    <div>'.$value['title'].'</div>
                                </div>
                            </div>
                        </div>';
                    }
                    //$_SESSION['image'] = $image_array;
                ?>
                
            </div>
        </div>

        <div class="col-12 col-md-4 col-lg-3 shadow">
            <div class="row">
                <div class="col-12 my-5">
                    <h4 class="text-center mb-0">Recents Blogs</h4>
                </div>
                <?php
                        foreach ($blogLisiting as $key => $value) {
                            //print_r($value);
                            
                            echo '
                            <a href="'.URL_BASE.$value['post_url'].'">
                            <div class="col-12 mb-3">
                                <div class="shadow w-100">
                                    <img class="w-100" src="'.URL_BASE.$value['image_sm'].'" alt="blog image" />
                                    <div class="text-center py-3 bg-white text-dark">
                                        '.$value['title'].'
                                    </div>
                                </div>
                            </div></a>';
                        }
                    ?>
                
                <div class="col-12">
                <a href="<?php echo URL_BASE; ?>blog"><button class="n-button w-100">View More</button></a>
                </div>
            </div>
        </div>

    </div>
</div>