<?php

var_dump($_POST);

// J'appelle mon fichier de configuration
require_once '../config.php';

// J'appelle mes Helpers
require_once '../helpers/database.php';
require_once '../helpers/form.php';

// J'appelle mon fichier de fonctions
require_once '../models/users.php';

$errors = []; // Je crée un tableau d'erreurs

// Je verifie les requetes POST$
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = $_POST['login'];
    $password = $_POST['password'];

    // je verifie que le login existe dans la base de données à l'aide de la méthode checkLogin()
    if (Users::IfLoginExist($login)) {
        // je verifie que le mot de passe correspond au mdp associé au login à l'aide de la méthode checkPassword()
        if (Users::checkPassword($login, $password)) {
            // Si tout est ok, je créé une session et je redirige vers le page d'accueil
            session_start();
            $_SESSION['login'] = $login;
            header('Location: ../controllers/controller-mainpage.php');
        } else {
            $errors['password'] = 'Mauvais mot de passe';
        }
    } else {
        $errors['login'] = 'Mauvais login';
    }
}










// j'inclus la vue respective
include '../views/userconnection.php';
