<?php


class Users
{

    private int $id;
    private string $login;
    private string $password;


    /**
     * Permet de verifier si le login existe
     * @param string $login
     * @return bool true si le login existe, false sinon
     */
    public static function IfLoginExist(string $login): bool
    {
        // On récupère l'instance de PDO
        $pdo = Database::createInstancePDO();
        // On prépare la requête
        $stmt = $pdo->prepare("SELECT * FROM user WHERE 'login' = :login");
        // On bind les paramètres
        $stmt->bindParam(':login', $login, PDO::PARAM_STR);
        // On execute la requête
        $stmt->execute();
        // On récupère le résultat
        $result = $stmt->fetch();
        // On retourne le résultat
        return $result ? true : false;
    }



    /**
     * Permet de verifier le mot de passe associé au login
     * @param string $login
     * @param string $password
     * @return bool true si le mot de passe correspond, false sinon
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
}
