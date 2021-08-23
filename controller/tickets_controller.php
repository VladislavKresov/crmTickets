<?php
include dirname(__DIR__) . '\model\database_request.php';

function GetTickets()
{
    return DBRequests::SelectTickets();
}

function AddTicket($ticket)
{
    $ticket['progress'] = '0';
    DBRequests::InsertTicket($ticket);
    header('Location: /');
}

function SwitchTicketStatus($cb, $id)
{
    var_dump($cb);
    if($cb.is(":checked"))
    {
        var_dump($id);
    }
}

if(array_key_exists('addticket',$_POST))
{
    AddTicket($_POST);
}