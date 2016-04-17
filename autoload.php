<?php

function autoloadModel($className) {
    $filename = $_SERVER['DOCUMENT_ROOT'] . "/myfamily/application/models/" . $className . ".php";
    if (is_readable($filename)) {
        include_once $filename;
    }
}

function autoloadController($className) {
    $filename = $_SERVER['DOCUMENT_ROOT'] . "/myfamily/application/controllers/" . $className . ".php";
    if (is_readable($filename)) {
        include_once $filename;
    }
}

function autoloadDAO($className) {
    $filename = $_SERVER['DOCUMENT_ROOT'] . "/myfamily/application/daos/" . $className . ".php";
    if (is_readable($filename)) {
        include_once $filename;
    }
}

function autoloadCONST($className) {
    $filename = $_SERVER['DOCUMENT_ROOT'] . "/myfamily/application/consts/" . $className . ".php";
    if (is_readable($filename)) {
        include_once $filename;
    }
}

spl_autoload_register("autoloadModel");
spl_autoload_register("autoloadController");
spl_autoload_register("autoloadDAO");
spl_autoload_register("autoloadCONST");
