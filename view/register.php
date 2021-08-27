<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Registration</title>
    <link href="css/signIn.css" media="screen" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'
          rel='stylesheet' type='text/css'>
</head>
<?php require_once(dirname(__DIR__)."/includes/connection.php"); ?>
<?php require_once(dirname(__DIR__)."/controller/register.php"); ?>
<body>
<div class="container mregister">
    <div id="login">
        <h1>Registration</h1>
        <form action="register.php" id="registerform" method="post" name="registerform">
            <p><label for="user_pass">E-mail<br>
                    <input class="input" id="email" name="email" size="32" type="email" value=""></label></p>
            <p><label for="user_pass">Username<br>
                    <input class="input" id="username" name="username" size="20" type="text" value=""></label></p>
            <p><label for="user_pass">Password<br>
                    <input class="input" id="password" name="password" size="32" type="password" value=""></label></p>
            <p class="submit"><input class="button" id="register" name="register" type="submit" value="Register"></p>
            <p class="regtext">already registered?<a href="login.php">Enter your username</a>!</p>
        </form>
    </div>
</div>
<footer>
</footer>
</body>
</html>