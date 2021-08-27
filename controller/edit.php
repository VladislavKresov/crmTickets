<?php
include dirname(__DIR__) . '\model\database_request.php';
$ticket = DBRequests::SelectTicketByID($_GET['id']);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>


</body>
</html>
//DBRequests::ReplaceTicket($_GET['ticket']);
//header('Location: /');