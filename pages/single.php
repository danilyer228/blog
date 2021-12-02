<?php
include_once 'includes/header.php';

$id = explode("/", $_SERVER['REQUEST_URI'])[2];
$post = getSinglePostById($id);
?>

<div class="body">
    <h1 class="post-title"><?= $post['title'] ?></h1>
    <img src="<?= $post['image'] ?>" alt="">
    <div class="post-content">
        <?= $post['content'] ?>
    </div>
</div>
