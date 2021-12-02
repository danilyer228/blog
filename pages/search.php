<?php
include_once 'includes/header.php'; ?>
<div class="body">
    <form action="" method="get">
        <p>
            Поиск по статьям: <input name="query" type="text">
        </p>
        <input type="submit">
    </form>
    <?php
    if (isset($_GET['query'])) {
        $posts = getPostsBySearch($_GET['query']);
        foreach ($posts as $post) {
            $author = getAuthorById($post['author_id']);
            ?>
            <div class="post">
                <a href="/single/<?= $post['id'] ?>">
                    <img src="<?= $post['image'] ?>" alt="" class="post-image">
                    <h2 class="title"><?= $post['title'] ?></h2>
                    <p>by <?= $author['username'] ?></p>
                </a>
            </div>
        <?php }
    }?>
</div>

</body>
</html>
