<?php

class User
{

    private int $id;
    private string $login;
    private string $password;

    /**
     * Permet de vérifier si un login existe dans la base de données
     * @param string $login le login a vérifier
     * @return bool true si le login existe, false sinon
     */
    public static function checkIfLoginExist(string $login): bool
    {
        try {
            $pdo = Database::createInstancePDO(); // Création d'une instance PDO
            $sql = "SELECT * FROM `user` WHERE `login`"; // marqueur nominatif :login
            $stmt = $pdo->prepare($sql); // on prepare la requete
            $stmt->bindValue(':login', Form::safeData($login), PDO::PARAM_STR); // on associe le marqueur nominatif à la variable $login
            $stmt->execute(); // on execute la requete

            // A l'aide d'une ternaire, nous vérifions si nous avons un résultat à l'aide de la méthode rowCount()
            // Si le résultat est différent de 0, nous récupérons les données avec la méthode fetch(), sinon nous retournons false
            $stmt->rowCount() != 0 ? $result = true : $result = false;
            return $result;
        } catch (PDOException $e) {
            // echo 'Erreur : ' . $e->getMessage();
            return false;
        }
    }






    /**
     * Permet de vérifier le mdp selon un login donné
     * @param string $login le login a vérifier
     * @param string $password le mdp a vérifier
     * @return bool true si le mdp correspond, false sinon
     */
    public static function checkPassword(string $login, string $password): bool
    {
        try {
            $pdo = Database::createInstancePDO(); // Création d'une instance PDO
            $sql = "SELECT * FROM `user` WHERE `login` = :login"; // marqueur nominatif :login
            $stmt = $pdo->prepare($sql); // on prepare la requete
            $stmt->bindValue(':login', Form::safeData($login), PDO::PARAM_STR); // on associe le marqueur nominatif à la variable $login
            $stmt->execute(); // on execute la requete

            $result = $stmt->fetch(PDO::FETCH_ASSOC); // on recupère le resultat à l'aide d'un fetch
            $passwordVerify = password_verify($password, $result['password']); // on compare le mot de passe saisi avec le mot de passe hashé de la base de données
            if ($passwordVerify) {
                return true; // si password OK
            } else {
                return false; // si paswword différent
            }
        } catch (PDOException $e) {
            // echo 'Erreur : ' . $e->getMessage();
            return false;
        }
    }

    /**
     * Permet de récupérer les informations d'un utilisateur
     * @param string $login le login de l'utilisateur
     * @return array les informations de l'utilisateur
     * @return array|bool Retourne un tableau contenant les informations de l'utilisateur, false si KO
     */
    public static function getInfoUser(string $login): array
    {
        try {
            $pdo = Database::createInstancePDO(); // Création d'une instance PDO
            $sql = "SELECT * FROM `user` WHERE `login`"; // marqueur nominatif :login
            $stmt = $pdo->prepare($sql); // on prepare la requete
            $stmt->bindValue(':login', Form::safeData($login), PDO::PARAM_STR); // on associe le marqueur nominatif à la variable $login
            $stmt->execute(); // on execute la requete

            $result = $stmt->fetch(PDO::FETCH_ASSOC); // on recupère le resultat à l'aide d'un fetch
            return $result; // on retourne le resultat
        } catch (PDOException $e) {
            // echo 'Erreur : ' . $e->getMessage();
            return false;
        }
    }
}
