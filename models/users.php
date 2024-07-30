<?php


class Users {
    public static function IfLoginExist($login) {
        $db = Database::createInstancePDO();
        $query = $db->prepare("SELECT * FROM user WHERE login = :login");
        $query->execute(['login' => $login]);
        return $query->fetch() !== false;
    }

    public static function checkPassword($login, $password) {
        $db = Database::createInstancePDO();
        $query = $db->prepare("SELECT password FROM user WHERE login = :login");
        $query->execute(['login' => $login]);
        $user = $query->fetch();
        if ($user) {
            // Supposons que les mots de passe sont hachés avec password_hash()
            return password_verify($password, $user['password']);
        }
        return false;
    }
}

