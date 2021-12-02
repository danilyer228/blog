<?php

$server='blog-db';
$username='root';
$password='123456';
$database='blog';
$db = mysqli_connect($server,$username,$password,$database);

if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}