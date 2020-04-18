<!-- <?php
        require 'mvc/autoloader.php';

        $gallery = new \controller\gallery\GalleryController();

        $responseGallery = $gallery->getGalleryController('GAL30056923099030c3d062d996571e3f3b');

        $galleryLisiting = $responseGallery['result'] ? $responseGallery['data'] : array();
        $gallery_img = json_decode($galleryLisiting['gallery_images'], true);
        ?>
<link rel="stylesheet" href="./views/categories-images/categories-images.css" />
$galleryLisiting = $responseGallery['result'] ? $responseGallery['data'] : array();
$gallery_img = json_decode($galleryLisiting['gallery_images'], true);
?>


<div class="container-fluid">
    <div class="row my-4">
        <h1 class="mt-5 mb-5 text-center w-100">Gallery Images</h1>
        <?php
        foreach ($gallery_img as $key => $value) {
            echo '
                <div class="col-4 p-0">
                    <img class="w-100 h-100" src=".' . json_decode($value['imageName'], true)[1] . '" />
                </div>';
        }
        ?>
    </div>


</div> -->

<link rel="stylesheet" href="./views/categories-images/categories-images.css" />
<section id="blog">
    <div class="container">

        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-12 text-center">
                <h2><span class="fa fa-minus icon-minus"></span>Pongal Images<span class="fa fa-minus icon-minus"></span></h2>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus </p><br>
            </div>
        </div>

        <div class="row">
            <div class="col-md-9 col-12">
                <div class="row">

                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-3" data-aos="fade-right">
                        <div class="blog column text-center">
                            <img src="https://images.pexels.com/photos/129441/pexels-photo-129441.jpeg?h=350&auto=compress&cs=tinysrgb" alt="" width="100%">
                            <h4 class="mt-2">Post Title</h4>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>
                            <a href="./image-share-download">Read More</a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-3" data-aos="fade-up">
                        <div class="blog column text-center">
                            <img src="https://images.pexels.com/photos/129105/pexels-photo-129105.jpeg?h=350&auto=compress&cs=tinysrgb" alt="" width="100%">
                            <h4 class="mt-2">Post Title</h4>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>
                            <a href="#">Read More</a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-3" data-aos="fade-left">
                        <div class="blog column text-center">
                            <img src="https://images.pexels.com/photos/39811/pexels-photo-39811.jpeg?h=350&auto=compress&cs=tinysrgb" alt="" width="100%">
                            <h4 class="mt-2">Post Title</h4>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>
                            <a href="#">Read More</a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-3" data-aos="fade-left">
                        <div class="blog column text-center">
                            <img src="https://images.pexels.com/photos/39811/pexels-photo-39811.jpeg?h=350&auto=compress&cs=tinysrgb" alt="" width="100%">
                            <h4 class="mt-2">Post Title</h4>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>
                            <a href="#">Read More</a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-3" data-aos="fade-left">
                        <div class="blog column text-center">
                            <img src="https://images.pexels.com/photos/39811/pexels-photo-39811.jpeg?h=350&auto=compress&cs=tinysrgb" alt="" width="100%">
                            <h4 class="mt-2">Post Title</h4>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>
                            <a href="#">Read More</a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-3" data-aos="fade-left">
                        <div class="blog column text-center">
                            <img src="https://images.pexels.com/photos/39811/pexels-photo-39811.jpeg?h=350&auto=compress&cs=tinysrgb" alt="" width="100%">
                            <h4 class="mt-2">Post Title</h4>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>
                            <a href="#">Read More</a>
                        </div>
                    </div>

                </div>
            </div>

            <!-- sidebar -->
            <div class="col-md-3 col-12 sidebar">
					<div class="widget widget-search">
						<form action="#" method="get" accept-charset="utf-8">
							<input type="text" name="widget-search" placeholder="Search">
						</form>
					</div>
					<div class="widget widget-categories">
						<div class="widget-title">
							<h3>Categories</h3>
						</div>
						<ul class="cat-list">
							<li>
								<a href="#"><i class="fas fa-chevron-right"></i> Accessories<span>(03)</span></a>
							</li>
							<li>
								<a href="#"><i class="fas fa-chevron-right"></i> Cameras<span>(19)</span></a>
							</li>
							<li>
								<a href="#"><i class="fas fa-chevron-right"></i> Computers<span>(56)</span></a>
							</li>
							<li>
								<a href="#"><i class="fas fa-chevron-right"></i> Laptops<span>(03)</span></a>
							</li>
							<li>
								<a href="#"><i class="fas fa-chevron-right"></i> Networking<span>(03)</span></a>
							</li>
							<li>
								<a href="#"><i class="fas fa-chevron-right"></i> Old Products<span>(89)</span></a>
							</li>
							<li>
								<a href="#"><i class="fas fa-chevron-right"></i> Smartphones<span>(90)</span></a>
							</li>
							<li>
								<a href="#"><i class="fas fa-chevron-right"></i> Software<span>(23)</span></a>
							</li>
						</ul>
					</div>
					<div class="widget widget-tags">
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
					</div>
				</div>
            

        </div>

    </div>
</section>