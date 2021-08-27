<?php
session_start();
require_once(dirname(__DIR__)."/includes/connection.php");
if(isset($_SESSION["session_username"]))
{
    // вывод "Session is set"; // в целях проверки
    header("Location: intropage.php");
}

if(isset($_POST["login"]))
{
    if(!empty($_POST['username']) && !empty($_POST['password']))
    {
        $username=htmlspecialchars($_POST['username']);
        $password=htmlspecialchars($_POST['password']);
        $pdo = Get_PDO();
        $statement = $pdo->prepare("SELECT * FROM usertbl WHERE username='".$username."' AND password='".$password."'");
        $statement->execute();
        $numrows = $statement->rowCount();
        if($numrows!=0)
        {
            session_start();
            $_SESSION['session_username']=$username;
            header("Location: /");
        }
        else
        {
            echo  "Invalid username or password!";
        }
    }
    else
    {
        $message = "All fields are required!";
    }
}
?>