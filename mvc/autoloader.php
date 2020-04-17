<?php
session_start();
date_default_timezone_set("Asia/Calcutta");
$host = $_SERVER['HTTP_HOST'];
if ($host == 'localhost') {
    define("BASE_PATH", "http://localhost/projects/DIF/");
    define("DATABASE", "dailyimagefunda");
    define("USER", "root");
    define("PASSWORD", "");
} else {
    define("BASE_PATH", "http://version2.dailyimagefunda.com/");
    define("DATABASE", "fivotcti_image_funda_v2");
    define("USER", "fivotcti_dif_v2");
    define("PASSWORD", "div2funda@123");
}

define("HOST", 'localhost');

spl_autoload_register(function ($class_name) {
    $path = str_replace('\\', DIRECTORY_SEPARATOR, $class_name);
    require_once $path . '.php';
});


