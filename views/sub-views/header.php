<?php 
    require 'mvc/autoloader.php';
    $uriArrayMeta = explode('/', $_SERVER['REQUEST_URI']);
    $postMeta = str_replace('-', ' ', $uriArrayMeta[count($uriArrayMeta) - 1]);
    if ($uriArrayMeta[count($uriArrayMeta) - 2] === 'image'){
        $galleryMeta = new \model\gallery\GalleryModel();
        $responseGalleryMeta = $galleryMeta->getGalleryImageModel(strtok($postMeta, '?'));
        $galleryListingMeta = $responseGalleryMeta['result'] ? $responseGalleryMeta['data'] : array();
        $imgSrcMeta = 'http://version2.dailyimagefunda.com'.json_decode($galleryListingMeta[0]['imageName'], true)[1];
        //$imgAltMeta = $galleryListingMeta[0]['imageAlt'];
        $imgTitleMeta = $galleryListingMeta[0]['imageTitle'];
        $imgDescMeta = $galleryListingMeta[0]['imageDesc'];
    } else {
        $imgSrcMeta = '';
        //$imgAltMeta = $galleryListingMeta[0]['imageAlt'];
        $imgTitleMeta = '';
        $imgDescMeta = '';
    }
    
    //echo $gallery;
    //echo '<pre>';print_r($galleryListingMeta);echo '</pre>';
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta property="og:url" content="http://version2.dailyimagefunda.com<?php echo strtok($_SERVER['REQUEST_URI'], '?'); ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?php echo $imgTitleMeta; ?>" />
    <meta property="og:description" content="<?php echo strip_tags($imgDescMeta); ?>" />
    <meta property="og:image" content="<?php echo $imgSrcMeta; ?>" />

    <title>Daily Image Funda</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo URL_BASE .'assets/library/bootstrap/css/bootstrap.min.css';?>">
    <link rel="stylesheet" href="<?php echo URL_BASE .'assets/library/slick/slick/slick.css';?>">
    <link rel="stylesheet" href="<?php echo URL_BASE .'assets/library/slick/slick/slick-theme.css';?>">
    <link rel="stylesheet" href="<?php echo URL_BASE .'assets/library/fontawesome/css/fontawesome.min.css';?>">
    <link rel="stylesheet" href="<?php echo URL_BASE .'assets/library/fontawesome/css/brands.min.css';?>">
    <link rel="stylesheet" href="<?php echo URL_BASE .'assets/library/fontawesome/css/solid.min.css';?>">
    <!-- <link href="assets/library/scheletrone/jquery.skeleton.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="<?php echo URL_BASE .'assets/css/main.css';?>">
    <link rel="stylesheet" href="<?php echo URL_BASE .'views/sub-views/navigation.style.css';?>" />
    <link rel="stylesheet" href="<?php echo URL_BASE .'views/landing/landing.css';?>" />
    <link rel="stylesheet" href="<?php echo URL_BASE .'views/categories/categories.style.css';?>" />
    <link rel="stylesheet" href="<?php echo URL_BASE .'views/sub-views/footer-bar.css';?>" />
    <link rel="stylesheet" href="<?php echo URL_BASE .'views/categories-images/categories-images.css';?>" />
    <link rel="stylesheet" href="<?php echo URL_BASE .'views/sub-categories/sub-categories.css';?>" />
    <link rel="stylesheet" href="<?php echo URL_BASE .'views/image-share-download/image-share-download.css';?>">
    <link rel="stylesheet" href="<?php echo URL_BASE .'views/search-results/search-results.css';?>" />
</head>
<body>
<?php
includeView('sub-views/navigation.php');
?>
