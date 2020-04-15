<?php
require 'mvc/autoloader.php';
$category = new \controller\category\CategoryController();
$response = $category->listCategoryController();
$categoryListing = $response['result'] ? $response['data'] : array();
?>
<link rel="stylesheet" href="./views/categories/categories.style.css" />
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <section class="cards-wrapper row">
                <div class="col-12 my-5 text-center">
                    <h1 class="text-center">Top Categories</h1>
                </div>
                <?php
                $index = 0;
                    foreach ($categoryListing as $key => $value) {
                        $date = date('d/M/Y',strtotime(json_decode($value['created'], true)['created_on']));
                        echo '<div class="card-grid-space col-md-2 col-lg-4 col-12 col-xl-4">
                        <div class="num">'.($index +1).'</div>
                        <a class="card" href="./galleries"
                            style="--bg-img: url(../../'. $value['image_sm'] .'">
                            <div>
                                <h1>'.$value['name'].'</h1>
                                <p>The syntax of a language is how it works. How to actually write it. Learn HTML syntax…</p>
                                <div class="date">'.$date.'</div>
                                <div class="tags">
                                    <div class="tag">'.$value['name'].'</div>
                                </div>
                            </div>
                        </a>
                    </div>';
                ?>
                <?php $index++; } ?>
            
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

        <div class="col-md-3 col-12 border-left p-5">
            Side nav will come here
        </div>

    </div>
</div>