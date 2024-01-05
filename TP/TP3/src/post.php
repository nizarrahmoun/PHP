<?php
// post.php

require 'model.php';

if (isset($_GET['id']) && ctype_digit($_GET['id'])) {
    $post = getPost($_GET['id']);
    $comments = getComments($_GET['id']);

    if ($post) {
        include 'templates/post.php';
    } else {
        echo "Post introuvable.";
    }
} else {
    header('Location: index.php');
    exit;
}
