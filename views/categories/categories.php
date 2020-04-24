<?php
//require 'mvc/autoloader.php';
$category = new \controller\category\CategoryController();
$response = $category->listCategoryController();
$categoryListing = $response['result'] ? $response['data'] : array();
?>

<link rel="stylesheet" href="./views/categories/categories.style.css" />
<link rel="stylesheet" href="./views/categories-images/categories-images.css" />

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 my-5 text-center">
            <h1 class="text-center">Top Categories</h1>
        </div>
        <div class="col-md-9">
            <section class="cards-wrapper row">
                <?php
                $index = 0;
                foreach ($categoryListing as $key => $value) {
                    $date = date('d/M/Y', strtotime(json_decode($value['created'], true)['created_on']));
                    echo '<div class="card-grid-space col-md-6 col-sm-6 col-12 col-lg-4 mb-4">
                        <a class="card d-flex align-items-center justify-content-center" href="./categories/'.str_replace(' ','-', strtolower($value['name'])).'"
                   
                            style="--bg-img: url(../../' . $value['image_sm'] . '">
                            <div>
                                <h1>' . $value['name'] . '</h1>
                                <!-- <div class="date">' . $date . '</div> -->
                                <div class="tags">
                                    <div class="tag">' . $value['name'] . '</div>
                                </div>
                            </div>
                        </a>
                    </div>';
                ?>
                <?php $index++;
                } ?>

                <!-- <div class="num">' . ($index + 1) . '</div> -->
                <!-- <div class="card-grid-space col-md-2 col-lg-4 col-12">
                    <div class="num">06</div>
                    <a class="card" href="https://codetheweb.blog/2017/10/14/links-images-about-file-paths/"
                        style="--bg-img: url('https://images1-focus-opensocial.googleusercontent.com/gadgets/proxy?container=focus&resize_w=1500&url=https://codetheweb.blog/assets/img/posts/links-images-about-file-paths/cover.jpg')">
                        <div>
                            <h1>Links, images and about file paths</h1>
                            <p>Learn how to use links and images along with file paths…</p>
                            <div class="date">14 Oct 2017</div>
                            <div class="tags">
                                <div class="tag">HTML</div>
                            </div>
                        </div>
                    </a>
                </div> -->

            </section>
        </div>

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