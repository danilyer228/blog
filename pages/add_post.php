<?php

include_once 'includes/header.php';

?>

<div class="body">
    <h1>Add Post</h1>
    <form action="/handler" method="post" enctype="multipart/form-data">
        <p>
            <input type="text" name="title">
        </p>
        <p>
            <textarea name="content" cols="30" rows="10"></textarea>
        </p>
        <input type="file" accept="image/png, image/jpeg" name="img">
        <input type="hidden" name="cmd" value="add_post">
        <input type="submit">
    </form>
</div>

<strong><script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script></strong>
<script>
    tinymce.init({
        selector: "textarea"
    });
</script>
</script>
