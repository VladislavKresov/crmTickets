<?php
require_once dirname(__DIR__) . "/model/User.php";

if (isset($_POST["register"]))
{

    if (!empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['password']))
    {
        $email = htmlspecialchars($_POST['email']);
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);

        if (User::isUsernameAvailable($username))
        {
            if (User::createNewUser($email, $username, $password))
            {
                $message = "Account Successfully Created";
                header("/view/login.php");
            }
            else
            {
                $message = "Failed to insert data information!";
            }
        }
        else
        {
            $message = "That username already exists! Please try another one!";
        }
    }
    else
    {
        $message = "All fields are required!";
    }
}

if (!empty($message))
{
    echo "<p class='error'>" . "MESSAGE: " . $message . "</p>";
}
?>