<?php

echo $_SERVER['REQUEST_URI'];

function autoloadModel($className) {
    $filename = $_SERVER['DOCUMENT_ROOT'] . "/myfamily/models/" . $className . ".php";
    if (is_readable($filename)) {
        include_once $filename;
    }
}

function autoloadController($className) {
    $filename = $_SERVER['DOCUMENT_ROOT'] . "/myfamily/controllers/" . $className . ".php";
    if (is_readable($filename)) {
        include_once $filename;
    }
}

function autoloadDAO($className) {
    $filename = $_SERVER['DOCUMENT_ROOT'] . "/myfamily/daos/" . $className . ".php";
    if (is_readable($filename)) {
        include_once $filename;
    }
}

spl_autoload_register("autoloadModel");
spl_autoload_register("autoloadController");
spl_autoload_register("autoloadDAO");
