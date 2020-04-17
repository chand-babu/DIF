<?php
require 'mvc/autoloader.php';

$gallery = new \controller\gallery\GalleryController();

$responseGallery = $gallery->getGalleryController('GAL30056923099030c3d062d996571e3f3b');

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
                    <img class="w-100 h-100" src=".'.json_decode($value['imageName'], true)[1].'" />
                </div>';
            }
        ?>
    </div>


</div>