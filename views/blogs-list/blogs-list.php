<?php
require 'mvc/autoloader.php';

$blog = new \controller\blog\BlogController();

$responseGallery = $blog->listBlogController();

$blogLisiting = $responseGallery['result'] ? $responseGallery['data'] : array();
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
        <div class="col-sm-6 col-md-8 col-lg-8">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-body border p-3 mb-4">
                            <img src="https://images.pexels.com/photos/262508/pexels-photo-262508.jpeg?h=350&auto=compress&cs=tinysrgb"
                                alt="" class="img-thumbnail img-responsive">
                            <p class="text-muted">By <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                Lorem Ipsum | <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                                Jan/21/2018</p>
                            <h3>Images by pexels.com</h3>
                            <p>Nulla vehicula semper tellus, eleifend convallis dolor accumsan vitae. Donec diam lorem,
                                vulputate eget pharetra at, laoreet ac augue. Vestibulum tellus justo, faucibus quis
                                hendrerit sit amet, rutrum non nulla[...]</p>
                            <a href="javascript: void(0);" class="btn btn-default text-white">Read more...</a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-body border p-3 mb-4">
                            <img src="https://images.pexels.com/photos/34601/pexels-photo.jpg?h=350&auto=compress&cs=tinysrgb"
                                alt="" class="img-thumbnail img-responsive">
                            <p class="text-muted">By <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                Lorem Ipsum | <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                                Jan/21/2018</p>
                            <h3>Images by pexels.com</h3>
                            <p>Nulla vehicula semper tellus, eleifend convallis dolor accumsan vitae. Donec diam lorem,
                                vulputate eget pharetra at, laoreet ac augue. Vestibulum tellus justo, faucibus quis
                                hendrerit sit amet, rutrum non nulla[...]</p>
                            <a href="javascript: void(0);" class="btn btn-default text-white">Read more...</a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="panel panel-default">
                        <article class="panel-body border p-3 mb-4">
                            <img src="https://images.pexels.com/photos/459688/pexels-photo-459688.jpeg?h=350&auto=compress&cs=tinysrgb"
                                alt="" class="img-thumbnail img-responsive">
                            <p class="text-muted">By <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                Lorem Ipsum | <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                                Jan/21/2018</p>
                            <h3>Images by pexels.com</h3>
                            <p>Nulla vehicula semper tellus, eleifend convallis dolor accumsan vitae. Donec diam lorem,
                                vulputate eget pharetra at, laoreet ac augue. Vestibulum tellus justo, faucibus quis
                                hendrerit sit amet, rutrum non nulla[...]</p>
                            <a href="javascript: void(0);" class="btn btn-default text-white">Read more...</a>
                        </article>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="panel panel-default">
                        <article class="panel-body border p-3 mb-4">
                            <img src="https://images.pexels.com/photos/273222/pexels-photo-273222.jpeg?h=350&auto=compress&cs=tinysrgb"
                                alt="" class="img-thumbnail img-responsive">
                            <p class="text-muted">By <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                Lorem Ipsum | <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                                Jan/21/2018</p>
                            <h3>Images by pexels.com</h3>
                            <p>Nulla vehicula semper tellus, eleifend convallis dolor accumsan vitae. Donec diam lorem,
                                vulputate eget pharetra at, laoreet ac augue. Vestibulum tellus justo, faucibus quis
                                hendrerit sit amet, rutrum non nulla[...]</p>
                            <a href="javascript: void(0);" class="btn btn-default text-white">Read more...</a>
                        </article>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="panel panel-default">
                        <article class="panel-body border p-3 mb-4">
                            <img src="https://images.pexels.com/photos/392018/pexels-photo-392018.jpeg?h=350&auto=compress&cs=tinysrgb"
                                alt="" class="img-thumbnail img-responsive">
                            <p class="text-muted">By <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                Lorem Ipsum | <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                                Jan/21/2018</p>
                            <h3>Images by pexels.com</h3>
                            <p>Nulla vehicula semper tellus, eleifend convallis dolor accumsan vitae. Donec diam lorem,
                                vulputate eget pharetra at, laoreet ac augue. Vestibulum tellus justo, faucibus quis
                                hendrerit sit amet, rutrum non nulla[...]</p>
                            <a href="javascript: void(0);" class="btn btn-default text-white">Read more...</a>
                        </article>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="panel panel-default">
                        <article class="panel-body border p-3 mb-4">
                            <img src="https://images.pexels.com/photos/301930/pexels-photo-301930.jpeg?h=350&auto=compress&cs=tinysrgb"
                                alt="" class="img-thumbnail img-responsive">
                            <p class="text-muted">By <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                Lorem Ipsum | <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                                Jan/21/2018</p>
                            <h3>Images by pexels.com</h3>
                            <p>Nulla vehicula semper tellus, eleifend convallis dolor accumsan vitae. Donec diam lorem,
                                vulputate eget pharetra at, laoreet ac augue. Vestibulum tellus justo, faucibus quis
                                hendrerit sit amet, rutrum non nulla[...]</p>
                            <a href="javascript: void(0);" class="btn btn-default text-white">Read more...</a>
                        </article>
                    </div>
                </div>
            </div>
            <hr>

        </div>

        <div class="col-sm-6 col-md-4 col-lg-4">
            <div class="panel panel-default">
                <div class="panel-body">

                    <h4 class="text-center">Search for Posts!</h4>
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
                    </form>

                    <h4 class="text-center my-3">Popular Posts!</h4>
                    <div class="row">
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <img src="https://images.pexels.com/photos/301930/pexels-photo-301930.jpeg?h=350&auto=compress&cs=tinysrgb"
                                alt="" class="img-thumbnail img-responsive">
                        </div>
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            <h5>Images by pexels.com</h5>
                            <p class="text-muted"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                                Jan/21/2018</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <img src="https://images.pexels.com/photos/34601/pexels-photo.jpg?h=350&auto=compress&cs=tinysrgb"
                                alt="" class="img-thumbnail img-responsive">
                        </div>
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            <h5>Images by pexels.com</h5>
                            <p class="text-muted"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                                Jan/21/2018</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <img src="https://images.pexels.com/photos/459688/pexels-photo-459688.jpeg?h=350&auto=compress&cs=tinysrgb"
                                alt="" class="img-thumbnail img-responsive">
                        </div>
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            <h5>Images by pexels.com</h5>
                            <p class="text-muted"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                                Jan/21/2018</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <img src="https://images.pexels.com/photos/273222/pexels-photo-273222.jpeg?h=350&auto=compress&cs=tinysrgb"
                                alt="" class="img-thumbnail img-responsive">
                        </div>
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            <h5>Images by pexels.com</h5>
                            <p class="text-muted"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                                Jan/21/2018</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <img src="https://images.pexels.com/photos/392018/pexels-photo-392018.jpeg?h=350&auto=compress&cs=tinysrgb"
                                alt="" class="img-thumbnail img-responsive">
                        </div>
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            <h5>Images by pexels.com</h5>
                            <p class="text-muted"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                                Jan/21/2018</p>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>

</div>