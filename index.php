<?php

ini_set('file_uploads', 'On');
ini_set('post_max_size', '100M');

ini_set('display_errors', true);
error_reporting(E_ALL);

session_start();

include_once 'db.php';
include_once 'functions.php';

$request = explode("/", $_SERVER['REQUEST_URI'])[1];
$request = explode("?", $request)[0];

$pages = scandir('pages');

if (in_array(stripslashes($request) . ".php", $pages)) {
    include_once "pages/{$request}.php";
} else {
    include_once "pages/home.php";
}