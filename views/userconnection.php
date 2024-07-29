<?php include "components/header.php"; ?>




<div class="bodyForm">
    <div class="conter">
        <h2>Connexion</h2>
        <form action="#" method="post">
            <div class="txt_field">
                <input type="text" name="login" id="login" >
                <span class="error"><?= $errors['login'] ?? '' ?></span>
                <span></span>
                <label>login</label>
            </div>
            <div class="txt_field">
                <input type="password" name="password" id="password" >
                <span class="error"><?= $errors['password'] ?? '' ?></span>
                <span></span>
                <label>Password</label>
            </div>
            <input type="submit" value="Connexion">
            <div class="signup_link">
                <p>Pas encore de compte ?<a href="../controllers/controller-userinscription.php">S'inscrire</a></p>
            </div>
        </form>
    </div>

</div>

























<?php include "components/footer.php"; ?>