<?php
include dirname(__DIR__) . '\model\Tickets.php';
Tickets::DeleteTicketByID($_GET['id']);
header('Location: /');