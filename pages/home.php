<?php
include_once 'includes/header.php'; ?>
<?php
$posts = getPosts();
?>
<div class="body">
    <?php foreach ($posts as $post) {
        $author = getAuthorById($post['author_id']);
        ?>
    <div class="post">
        <a href="/single/<?= $post['id'] ?>">
            <img src="<?= $post['image'] ?>" alt="" class="post-image">
            <h2 class="title"><?= $post['title'] ?></h2>
            <p>by <?= $author['username'] ?></p>
        </a>
    </div>
    <?php } ?>
</div>

</body>
</html>
