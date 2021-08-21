<?php
include dirname(__DIR__) . '\model\database_request.php';

function GetTickets()
{
    return Storage::SelectTickets();
}

function AddTicket($ticket)
{
    $ticket['progress'] = '0';
    Storage::InsertTicket($ticket);
}

if(array_key_exists('addticket',$_POST)){
    AddTicket($_POST);
 }