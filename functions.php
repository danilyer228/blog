<?php

function db() {
    return new PDO('mysql:host=blog-db;dbname=blog', "blog", "blog");
}

function getPosts() {
    $db = db();
    return array_reverse($db->query("SELECT * FROM posts")->fetchAll(PDO::FETCH_ASSOC));
}

function getPostsBySearch($search) {
    $db = db();
    return array_reverse($db->query("SELECT * FROM posts WHERE title LIKE '%{$search}%';")->fetchAll(PDO::FETCH_ASSOC));
}

function getAuthorById($id) {
    $db = db();
    return $db->query("SELECT * FROM users WHERE id = " . $id)->fetchAll(PDO::FETCH_ASSOC)[0];
}

function getSinglePostById($id) {
    $db = db();
    return $db->query("SELECT * FROM posts WHERE id = " . $id)->fetchAll(PDO::FETCH_ASSOC)[0];
}

function register($login, $password) {
    $db = db();
    if(!preg_match("/^[a-zA-Z0-9]+$/",$login))
    {
        $err[] = "Логин может состоять только из букв английского алфавита и цифр";
    }

    if(strlen($login) < 3 or strlen($login) > 30)
    {
        $err[] = "Логин должен быть не меньше 3-х символов и не больше 30";
    }

    $query = $db->query("SELECT id FROM users WHERE username='{$login}'");
    if($query->rowCount() > 0)
    {
        $err[] = "Пользователь с таким логином уже существует в базе данных";
    }

    if(count($err) === 0)
    {
        $password = md5(md5(trim($password)));

        $db->query("INSERT INTO users SET username='".$login."', password='".$password."'");
        $_SESSION['user_id'] = $db->lastInsertId();
        $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
        $_SESSION['is_authorized'] = true;
        header("Location: /");
    }
    else
    {
        print "<b>При регистрации произошли следующие ошибки:</b><br>";
        foreach($err AS $error)
        {
            print $error."<br>";
        }
    }

}

function login($login, $password) {
    $db = db();
    $password = md5(md5(trim($password)));
    $query = "SELECT * FROM users WHERE username='$login' AND password='$password'";
    $res = $db->query($query);
    if ($res->rowCount() > 0) {
        $_SESSION['user_id'] = $res->fetchAll(PDO::FETCH_ASSOC)[0]['id'];
        $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
        $_SESSION['is_authorized'] = true;
    }
    header("Location: /");
}

function logout() {
    $_SESSION = [];
    session_destroy();
    header("Location: /");
}

function addPost($title, $content) {
    $db = db();

    $uploaddir = $_SERVER["DOCUMENT_ROOT"] . '/uploads/';
    $uploadfile = $uploaddir . $_FILES['img']['name'];

    move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile);
    $filepath = str_replace('/application', '', $uploadfile);
    $author_id = $_SESSION['user_id'];
    $content = $db->quote($content);
    $db->query("INSERT INTO posts (author_id, title, content, image)
        VALUES ('{$author_id}', '{$title}', {$content}, '{$filepath}')");
    header('Location: /single/' . $db->lastInsertId());
}

