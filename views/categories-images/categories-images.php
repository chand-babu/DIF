<?php
require 'mvc/autoloader.php';

$blog = new \controller\post\PostController();
$category = new \controller\category\CategoryController();
$blogLatest = new \controller\blog\BlogController();

$cat_response = $category->listCategoryController();
$responseBlog = $blogLatest->letestBlogController();

$categoryListing = $cat_response['result'] ? $cat_response['data'] : array();

$uriArray = explode('/', $_SERVER['REQUEST_URI']);
$post = $uriArray[count($uriArray) - 1];
$cat = str_replace('-', ' ', $uriArray[count($uriArray) - 2]);
$responseGallery = $blog->getPostController(array('name' => $cat, 'post_url' => $post));

$blogLisiting = $responseGallery['result'] ? $responseGallery : array();
$blogLatestLisiting = $responseBlog['result'] ? $responseBlog['data'] : array();
//echo '<pre>';print_r($blogLisiting);echo '</pre>';
//echo $cat.$post;
echo '<input type="hidden" id="meta-desc" value="'.$responseGallery['data']['meta_desc'].'"/>';
echo '<input type="hidden" id="meta-tag" value="'.$responseGallery['data']['meta_tag'].'"/>';

?>

<!-- <link rel="stylesheet" href="./views/categories-images/categories-images.css" /> -->
<section id="blog" class="<?php echo $blogLisiting['blog'] ? 'd-none':'d-block'?>">
    <div class="container">

        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-12 text-center">
                <h2><span class="fa fa-minus icon-minus"></span><?php echo $blogLisiting['data']['title']; ?><span class="fa fa-minus icon-minus"></span></h2>
                <p><?php echo $blogLisiting['data']['description']; ?></p><br>
            </div>
        </div>

        <div class="row">
            <div class="col-md-9 col-12">
                <div class="row">
                    <?php 
                        
                        $decodeData = json_decode($blogLisiting['data']['gallery_images'], true);
                        foreach ($decodeData as $key => $value) {
                            //echo htmlentities(json_encode($value));
//comment review-issue
                            echo '<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 mb-3" data-aos="fade-right">
                                <div class="blog column text-center">
                                    <img src="./..'.json_decode($value['imageName'], true)[1].'" alt="'.$value['imageAlt'].'" width="100%">
                                    <h4 class="mt-2">'.$value['imageTitle'].'</h4>
                                    <p>'.$value['imageDesc'].'</p>
                                    <a href="javascript:void(0)" onclick="downloadPage('.htmlentities(json_encode($value)).')">Preview</a>
//comment===
                            echo '<a href="javascript:void(0)" onclick="downloadPage('.htmlentities(json_encode($value)).')">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 mb-3" data-aos="fade-right">
                            <div class="blog column text-center">
                                <img src="./..'.json_decode($value['imageName'], true)[1].'" alt="'.$value['imageAlt'].'" width="100%">
                                <h4 class="mt-2 multi-line-truncate text-white">'.$value['imageTitle'].'</h4>
                                <div class="multi-line-truncate blogPara">
                                    <p class="multi-line-truncate text-white">'.$value['imageDesc'].'</p>
//comment master
                                </div>
                                <a href="javascript:void(0)" onclick="downloadPage('.htmlentities(json_encode($value)).')">Read More</a>
                            </div>
                        </div>
                            </a>';
                        }
                    ?>
                </div>
            </div>

            <!-- sidebar -->
            <div class="col-md-3 sidebar">
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
</section>

<div id="gallery-post-ch" class="container-fluid <?php echo $blogLisiting['blog'] ? 'd-block':'d-none'?>">
    <div class="row my-4">
        <div class="col-md-9 page-body">
            <div class="row">
                <div class="col-md-12 content-page">
                    <div class="col-md-12 blog-post">
                        <!-- Post Headline Start -->
                        <div class="post-title">
                            <h1><?php echo $blogLisiting['data']['title']; ?></h1>
                        </div>
                        <img class="w-100" src="./..<?php echo $blogLisiting['data']['image_lg']; ?>" alt="Blog Banner">
                        <!-- Post Headline End -->

                        <!-- Post Detail Start -->
                        <div class="post-info mt-3">
                            <span><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo date('d/M/Y', strtotime(json_decode($blogLisiting['data']['created'], true)['created_on'])); ?> </span>
                        </div>
                        <!-- Post Detail End -->


                        <p><?php echo $blogLisiting['data']['description']; ?></p>


                        <div><?php echo $blogLisiting['data']['content']; ?></div>
                        <!-- Post List Style End -->




                        <!-- Post Author Bio Box Start -->
                        <div class="about-author margin-top-70 margin-bottom-50">

                            <div class="picture">
                                <img src="images/blog/author.png" class="img-responsive" alt="">
                            </div>

                            <div class="c-padding">
                                <h3>Article By <a href="#" target="_blank" data-toggle="tooltip" data-placement="top" title="Visit Alex Website">Alex Parker</a></h3>
                                <p>You can use about author box when someone guest post on your blog, Lorem ipsum
                                    consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                                    dolore magna ad minim veniam.</p>
                            </div>
                        </div>

                        <!-- Comments Form -->
                        <div class="card1 my-4">
                            <h5 class="card-header">Leave a Comment:</h5>
                            <div class="card-body">
                                <form>
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Comment</label>
                                        <textarea class="form-control" rows="3"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>

                        <!-- Single Comment -->
                        <div class="media mb-4">
                            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                            <div class="media-body">
                                <h5 class="mt-0">Commenter Name</h5>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                        </div>

                        <!-- Comment with nested comments -->
                        <div class="media mb-4">
                            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                            <div class="media-body">
                                <h5 class="mt-0">Commenter Name</h5>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

                                <div class="media mt-4">
                                    <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                                    <div class="media-body">
                                        <h5 class="mt-0">Commenter Name</h5>
                                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                                    </div>
                                </div>

                                <div class="media mt-4">
                                    <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                                    <div class="media-body">
                                        <h5 class="mt-0">Commenter Name</h5>
                                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                                    </div>
                                </div>

                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-body">

                    <!-- <h4 class="text-center">Search for Posts!</h4>
                    <form role="Form" method="GET" action="" accept-charset="UTF-8">
                        <div class="form-group">
                            <div class="input-group">
                                <input class="form-control" type="text" name="search" placeholder="Search..." required />
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                                </span>
                            </div>
                        </div>
                    </form> -->

                    <h4 class="text-center">Popular Posts!</h4>
                    <?php 
                        foreach ($blogLatestLisiting as $key => $value) {
                            echo '
                            <a class="text-white" href="'.URL_BASE.str_replace(' ','-',strtolower($value['name'])).'/'.$value['post_url'].'">
                            <div class="row">
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                    <img src="./..'.$value['image_sm'].'" alt="" class="img-thumbnail img-responsive">
                                </div>
                                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                    <h5>'.$value['title'].'</h5>
                                    <p class="text-muted"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                                        '.date('d/M/Y', strtotime(json_decode($value['created'], true)['created_on'])).'</p>
                                </div>
                            </div></a>
                            <hr>';
                        }
                    ?>
                </div>
            </div>
        </div>

    </div>
</div>