<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/style.css">
    <title>My Cool Blog</title>
</head>
<body>
<header class="header">
    <a href="/" class="logo">My Cool Blog</a>
    <div class="header-right">
        <a class="active" href="/">Home</a>
        <a href="/search">Search Posts</a>
        <?php if(array_key_exists('is_authorized', $_SESSION)) { ?>
            <a href="/add_post">Add Post</a>
            <a href="/handler">Exit(<?= getAuthorById($_SESSION['user_id'])['username'] ?>)</a>
        <?php } else { ?>
        <a href="/login">Login</a>
        <a href="/register">Register</a>
        <?php } ?>
    </div>
</header>