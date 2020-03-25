<?php
session_start();
$host = $_SERVER['HTTP_HOST'];
if ($host == 'localhost') {
    define("BASE_PATH", "http://localhost/projects/dailyimagefunda/");
    define("DATABASE", "dailyimagefunda");
    define("USER", "root");
    define("PASSWORD", "");
} else {
    define("BASE_PATH", "");
    define("DATABASE", "");
    define("USER", "");
    define("PASSWORD", "");
}

define("HOST", "localhost");

spl_autoload_register(function ($class_name) {
    $path = str_replace('\\', DIRECTORY_SEPARATOR, $class_name);
    require_once $path . '.php';
});

