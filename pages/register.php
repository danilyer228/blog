<?php
include_once 'includes/header.php';
?>
<div class="user">
    <header class="user__header">
        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3219/logo.svg" alt="" />
        <h1 class="user__title">Sign up</h1>
    </header>

    <form class="form" method="post" action="/handler">
        <div class="form__group">
            <input type="text" placeholder="Username" name="login" class="form__input" />
        </div>
        <div class="form__group">
            <input type="password" placeholder="Password" name="password" class="form__input" />
        </div>
        <input type="hidden" name="cmd" value="register">
        <input class="btn" type="submit">
    </form>
</div>

<script>
    const button = document.querySelector('.btn')
    const form   = document.querySelector('.form')

    button.addEventListener('click', function() {
        form.classList.add('form--no')
    });
</script>
</body>
