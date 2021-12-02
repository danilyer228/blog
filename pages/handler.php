<?php

require_once "functions.php";

switch ($_POST['cmd']) {
    case 'register':
        register($_POST['login'], $_POST['password']);
        break;
    case 'login':
        login($_POST['login'], $_POST['password']);
        break;
    case 'add_post':
        addPost($_POST['title'], $_POST['content']);
        break;
    default:
        logout();
}

//header('Location: /');
