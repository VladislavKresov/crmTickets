<?php
session_start();

include dirname(__DIR__) . '\model\User.php';

if (!isset($_GET['id']) || (isset($_SESSION['session_username']) && !User::isAdmin($_SESSION['session_username']))) {
    header('Location: /');
}

include_once dirname(__DIR__) . '/model/Tickets.php';
$ticket = Tickets::SelectTicketByID($_GET['id']);
?>

<form action="/controller/edit.php" method="post">
    <input name="ticket[id]" hidden="true" value="<?= $ticket['id'] ?>">
    <div>
        <label>Username</label>
        <input type="text" class="form-control" name="ticket[username]" value="<?= $ticket['username']; ?>">
    </div>
    <div>
        <label>Email</label>
        <input class="form-control" name="ticket[email]" type="email" value="<?= $ticket['email']; ?>">
    </div>
    <div>
        <label>Task</label>
        <textarea class="form-control" name="ticket[content]"><?= $ticket['content']; ?></textarea>
    </div>
    <div>
        <label>progress</label>
        <input name="ticket[progress]" value="<?= $ticket['progress']; ?>">
    </div>
    <div>
        <button type="submit" name="addticket" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-secondary" onclick="document.location = '/'">Cancel</button>
    </div>
</form>

