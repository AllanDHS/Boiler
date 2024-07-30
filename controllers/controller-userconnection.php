<?php
session_start();
require_once '../config.php';
require_once '../helpers/database.php';
require_once '../helpers/form.php';
require_once '../models/users.php';

$errors = [];

if (isset($_SESSION['user'])) {
    header('Location: controller-mainpage.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = $_POST['login'];
    $password = $_POST['password'];

    if (Users::IfLoginExist($login)) {
        if (Users::checkPassword($login, $password)) {
            $_SESSION['login'] = $login;
            header('Location: controller-mainpage.php');
            exit();
        } else {
            $errors['password'] = 'Mauvais mot de passe';
        }
    } else {
        $errors['login'] = 'Mauvais login';
    }
}

include '../views/userconnection.php';
?>
