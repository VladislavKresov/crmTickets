<?php
include dirname(__DIR__) . '\model\database_request.php';
DBRequests::DeleteTicketByID($_GET['id']);
header('Location: /');