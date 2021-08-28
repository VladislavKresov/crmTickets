<?php
require_once(dirname(__DIR__)."/includes/connection.php");
class User{

    public static function isAdmin($username)
    {
        $pdo = Get_PDO();
        $sql = "SELECT is_admin FROM usertbl WHERE username='".$username."'";

        $statement = $pdo->prepare($sql);
        $statement->execute();
        return (bool)$statement->fetch()['is_admin'];
    }

    public static function email($username)
    {
        $pdo = Get_PDO();
        $sql = "SELECT email FROM usertbl WHERE username='".$username."'";

        $statement = $pdo->prepare($sql);
        $statement->execute();
        return $statement->fetch()['email'];
    }

    public static function createNewUser($email, $username, $password, $is_admin)
    {
        $sql = "INSERT INTO usertbl
                    (email, username,password, is_admin)            
	                VALUES('$email', '$username', '$password', '$is_admin')";

        $pdo = Get_PDO();
        $statement = $pdo->prepare($sql);
        $result = $statement->execute();
        return $result;
    }

    public static function checkUsernameAndPassword($username, $password)
    {
        $pdo = Get_PDO();
        $statement = $pdo->prepare("SELECT * FROM usertbl WHERE username='".$username."' AND password='".$password."'");
        $statement->execute();
        $numrows = $statement->rowCount();
        return $numrows!=0;
    }

    public static function isUsernameAvailable($username)
    {
        $pdo = Get_PDO();
        $statement = $pdo->prepare("SELECT * FROM usertbl WHERE username='" . $username . "'");
        $statement->execute();
        $numrows = $statement->rowCount();
        return $numrows==0;
    }
}