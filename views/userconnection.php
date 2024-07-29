<?php include 'components/header.php'; ?>


<div class="form">
    <h1>Connection</h1>
    <form action="#" method="post">
        <input type="text" name="login" placeholder="Login" id="login" required>
        <span class="error"><?= $errors['login'] ?? '' ?></span>
        <input type="password" name="password" placeholder="Password" id="password" required>
        <span class="error"><?= $errors['password'] ?? '' ?></span>
        <button type="submit">Connection</button>
    </form>
</div>