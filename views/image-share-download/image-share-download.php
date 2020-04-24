<?php
// require 'mvc/autoloader.php';
$uriArray = explode('/', $_SERVER['REQUEST_URI']);
$post = str_replace('-', ' ', $uriArray[count($uriArray) - 1]);
//echo $_SERVER['REQUEST_URI'];
$category = new \controller\category\CategoryController();
$gallery = new \model\gallery\GalleryModel();

$response = $category->listCategoryController();
$responseGallery = $gallery->getGalleryImageModel(strtok($post, '?'));

$categoryListing = $response['result'] ? $response['data'] : array();
$galleryListing = $responseGallery['result'] ? $responseGallery['data'] : array();


//$image_values = $_SESSION['image'][$post];
//echo '<pre>';print_r($galleryListing);echo '</pre>';

$imgSrc = 'http://version2.dailyimagefunda.com'.json_decode($galleryListing[0]['imageName'], true)[1];
//echo $imgSrc;
$imgAlt = $galleryListing[0]['imageAlt'];
$imgTitle = $galleryListing[0]['imageTitle'];
$imgDesc = $galleryListing[0]['imageDesc'];

?>

<script>
(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

</script>
<!-- <span class="facebook-share" data-js="facebook-share">Share on Facebook</span> -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-9 mt-5">
            <div class="blog column text-center">
                <img id="image-view" src="<?php echo $imgSrc; ?>"
                alt="<?php echo $imgAlt; ?>" width="100%">
                <h4 id="image-title" class="mt-2"><?php echo $imgTitle; ?></h4>
                <p id="image-desc"><?php echo $imgDesc; ?></p>
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="header_links">
                             <ul>
                                 <li>
                                     <a target="_blank" 
                                    href="https://www.facebook.com/sharer/sharer.php?u=http://version2.dailyimagefunda.com<?php echo $_SERVER['REQUEST_URI'];?>"> <i class="fab fa-facebook-f"></i>
                                    <!-- <div class="fb-share-button" style="opacity:0" 
                                        data-href="">
                                    </div> -->
                                    </a>
                                </li>
                                 <li><a target="_blank" class="twiter" 
                                 href="https://twitter.com/share?url=http://version2.dailyimagefunda.com<?php echo $_SERVER['REQUEST_URI'];?>&text="<?php echo $imgTitle; ?>>
                                    <i class="fab fa-twitter"></i> </a></li>
                                 <li><a target="_blank" class="insta" 
                                 href="https://www.linkedin.com/sharing/share-offsite/?url=http://version2.dailyimagefunda.com<?php echo $_SERVER['REQUEST_URI'];?>">
                                    <i class="fab fa-linkedin"></i> </a></li>
                                 <li><a target="_blank" class="insta" 
                                 href="http://pinterest.com/pin/create/link/?url=http://version2.dailyimagefunda.com<?php echo $_SERVER['REQUEST_URI'];?>"> <i class="fab fa-pinterest"></i> </a></li>
                                 <li><a target="_blank" class="insta" 
                                 href="https://www.instagram.com/daily_image_funda/"> <i class="fab fa-instagram"></i> </a></li>
                             </ul>
                         </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <a id="img-download" href="<?php echo $imgSrc; ?>" download>
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
                                <a href="'.URL_BASE.'categories/'.str_replace(' ','-', strtolower($value['name'])).'"><i class="fas fa-chevron-right"></i> '.$value['name'].'<span>('.$value['gal_count'].')</span></a>
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