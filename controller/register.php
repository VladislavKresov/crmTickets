<?php
require_once dirname(__DIR__) . "/includes/connection.php";

if (isset($_POST["register"]))
{

    if (!empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['password']))
    {
        $email = htmlspecialchars($_POST['email']);
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);
        $pdo = Get_PDO();
        $statement = $pdo->prepare("SELECT * FROM usertbl WHERE username='" . $username . "'");
        $statement->execute();
        $numrows = $statement->rowCount();
        if ($numrows == 0)
        {
            $sql = "INSERT INTO usertbl
                    (email, username,password)            
	                VALUES('$email', '$username', '$password')";

            $statement = $pdo->prepare($sql);
            $result = $statement->execute();
            if ($result)
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