<?php
include_once dirname(__DIR__) . '/model/database_request.php';
$ticket = $_POST['ticket'];
if(isset($ticket))
{
    var_dump($ticket);
    DBRequests::ReplaceTicket($ticket);
}
header('Location: /');
?>

