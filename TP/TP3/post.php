<?php

 
require('src/model.php');
$posts = getPosts();
require('templates/homepage.php');

if (isset($_GET['id']) && $_GET['id'] > 0) {
    $identifier = $_GET['id'];
} else {
    echo '';
    die;
}

$comments = getComments($identifier);
require('templates/post.php');