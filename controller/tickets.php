<?php
include dirname(__DIR__).'\model\storage.php';

function GetTickets()
{
    $tickets = Storage::SelectTickets();
    var_dump($tickets);
}

function AddTicket($ticket)
{
    $ticket['progress'] = '0';
    Storage::InsertTicket($ticket);
}

if(array_key_exists('addticket',$_POST)){
    AddTicket($_POST);
 }