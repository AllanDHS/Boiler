<?php include 'components/header.php'; ?>

<div class="bg">
    <div class="center">
        <div class="form">
            <h1>Connexion</h1>
            <form action="" method="POST">
                <div class="input">
                    <input type="text" name="login" placeholder="Login" id="login">
                    <span class="error"><?= $errors['login'] ?? '' ?></span>
                    <input type="password" name="password" placeholder="Password" id="password">
                    <span class="error"><?= $errors['password'] ?? '' ?></span>
                </div>
                <button type="submit" id="connect">Connexion</button>

            </form>
        </div>
    </div>
</div>


