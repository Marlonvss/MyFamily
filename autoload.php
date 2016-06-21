<?php

$Path1 = './';
$Path2 = $Path1 . '../';
$Path3 = $Path2 . '../';

function autoloadModel($className) {
    global $Path1, $Path2, $Path3;
    $filename = "back/models/" . $className . ".php";
    if (is_readable($Path1 . $filename)) {
        include_once $Path1 . $filename;
    }
    if (is_readable($Path2 . $filename)) {
        include_once $Path2 . $filename;
    }
    if (is_readable($Path3 . $filename)) {
        include_once $Path3 . $filename;
    }
}

function autoloadController($className) {
    global $Path1, $Path2, $Path3;
    $filename = "back/controllers/" . $className . ".php";
    if (is_readable($Path1 . $filename)) {
        include_once $Path1 . $filename;
    }
    if (is_readable($Path2 . $filename)) {
        include_once $Path2 . $filename;
    }
    if (is_readable($Path3 . $filename)) {
        include_once $Path3 . $filename;
    }
}

function autoloadDAO($className) {
    global $Path1, $Path2, $Path3;
    $filename = "back/daos/" . $className . ".php";
    if (is_readable($Path1 . $filename)) {
        include_once $Path1 . $filename;
    }
    if (is_readable($Path2 . $filename)) {
        include_once $Path2 . $filename;
    }
    if (is_readable($Path3 . $filename)) {
        include_once $Path3 . $filename;
    }
}

function autoloadCONST($className) {
    global $Path1, $Path2, $Path3;
    $filename = "back/consts/" . $className . ".php";
    if (is_readable($Path1 . $filename)) {
        include_once $Path1 . $filename;
    }
    if (is_readable($Path2 . $filename)) {
        include_once $Path2 . $filename;
    }
    if (is_readable($Path3 . $filename)) {
        include_once $Path3 . $filename;
    }
}

spl_autoload_register("autoloadModel");
spl_autoload_register("autoloadController");
spl_autoload_register("autoloadDAO");
spl_autoload_register("autoloadCONST");
