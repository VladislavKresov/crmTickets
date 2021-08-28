<?php
include_once dirname(__DIR__) . '/model/Tickets.php';
$ticket = $_POST['ticket'];
if(isset($ticket))
{
    var_dump($ticket);
    Tickets::ReplaceTicket($ticket);
}
header('Location: /');
?>

