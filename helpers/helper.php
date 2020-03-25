<?php

function includeView($files) {
    $file = __DIR__ . './../views/' . $files;
    include $file;
}

function requireView($files) {
    $file = __DIR__ . './../views/' . $files;
    require $file;
}