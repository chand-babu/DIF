<?php
require 'mvc/autoloader.php';

$blog = new \controller\blog\BlogController();

$responseBlog = $blog->listBlogController();
$responseLatest = $blog->letestBlogController();

$blogLisiting = $responseBlog['result'] ? $responseBlog['data'] : array();
$blogLatestListing = $responseLatest['result'] ? $responseLatest['data'] : array();
//echo '<pre>';print_r($blogLisiting);echo '</pre>';
?>
<section class="container-fluid">
    <div class="jumbotron bg-dark mt-5">
        <h1>About Our Blogs</h1>
        <p>Nulla vehicula semper tellus, eleifend convallis dolor accumsan vitae. Donec diam lorem,
            vulputate eget pharetra at, laoreet</p>
    </div>
</section>

<div class="container-fluid px-5">

    <div class="row">
        <div class="col-12 col-md-8 col-lg-8">
            <div class="row">
      
                <?php 
                    foreach ($blogLisiting as $key => $value) {
                        echo '<a class="text-decoration-none" href="'.URL_BASE.str_replace(' ','-',$value['name']).'/'.$value['post_url'].'">
                        
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-body blog-border p-3 mb-4">
                                <img src="'.URL_BASE.$value['image_sm'].'"
                                    alt="" class="img-thumbnail img-responsive w-100">
                                <p class="text-muted">By <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                    '.date('d/M/Y', strtotime(json_decode($value['created'], true)['created_on'])).'</p>
                                <h3 class="blog-list-h3 multi-line-truncate">'.$value['title'].'</h3>
                                <p class="blog-list-p multi-line-truncate">'.$value['description'].'</p>
                                <a href="'.URL_BASE.str_replace(' ','-',$value['name']).'/'.$value['post_url'].'"
                                class="btn btn-default text-white">Read more...</a>
                            </div>
                        </div>
                    </div>
                        
                        </a>';
                    }
                ?>
            </div>
            <hr>

        </div>

        <div class="col-12 col-md-4 col-lg-4">
            <div class="panel panel-default">
                <div class="panel-body">

                    <!-- <h4 class="text-center">Search for Posts!</h4>
                    <form role="Form" method="GET" action="" accept-charset="UTF-8">
                        <div class="form-group">
                            <div class="input-group">
                                <input class="form-control" type="text" name="search" placeholder="Search..."
                                    required />
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit"><span
                                            class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                                </span>
                            </div>
                        </div>
                    </form> -->

                    <h4 class="text-center my-3">Popular Posts!</h4>
                    <?php 
                        foreach ($blogLatestListing as $key => $value) {
                            echo '
                            <a class="text-white" href="'.URL_BASE.str_replace(' ','-',$value['name']).'/'.$value['post_url'].'">
                            <div class="row">
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                    <img src="'.URL_BASE.$value['image_sm'].'" alt="" class="img-thumbnail img-responsive w-100">
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

                    <!-- <div class="row">
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <img src="https://images.pexels.com/photos/301930/pexels-photo-301930.jpeg?h=350&auto=compress&cs=tinysrgb"
                                alt="" class="img-thumbnail img-responsive w-100">
                        </div>
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            <h5>Images by pexels.com</h5>
                            <p class="text-muted"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                                Jan/21/2018</p>
                        </div>
                    </div> -->

                </div>
            </div>
        </div>
    </div>

</div>