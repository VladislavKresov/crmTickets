<?php
session_start();
include dirname(__DIR__) . '\model\User.php';
include dirname(__DIR__) . '\model\Tickets.php';

function GetTickets()
{
    return Tickets::SelectTickets();
}

function AddTicket($content)
{
    $username = $_SESSION['session_username'];
    $ticket['username'] = $username;
    $ticket['email'] = User::email($username);
    $ticket['content'] = $content;
    $ticket['progress'] = '0';
    Tickets::InsertTicket($ticket);
    header('Location: /');
}

if(array_key_exists('addticket',$_POST))
{
    AddTicket($_POST['content']);
}