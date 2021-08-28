<?php
session_start();
require_once(dirname(__DIR__)."/model/User.php");

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
        if(User::checkUsernameAndPassword($username, $password))
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