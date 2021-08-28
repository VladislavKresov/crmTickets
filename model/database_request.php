<?php
require_once dirname(__DIR__) . '\includes/connection.php';

class DBRequests
{
    private static $sql_insert = "INSERT INTO tasks (username, email, content, progress) VALUES (:username, :email, :content, :progress)";
    private static $sql_select = "SELECT * FROM tasks ORDER BY 'id' DESC";

    public static function InsertTicket($ticket)
    {
        //$pdo = new PDO(self::$pdo_dsn, self::$pdo_login, self::$pdo_password);
        $statement = Get_PDO()->prepare(self::$sql_insert);
        $statement->bindParam(":username", $ticket['username']);
        $statement->bindParam(":email", $ticket['email']);
        $statement->bindParam(":content", $ticket['content']);
        $statement->bindParam(":progress", $ticket['progress']);
        $statement->execute();
    }

    public static function SelectTickets()
    {
        $statement = Get_PDO()->prepare(self::$sql_select);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function SelectTicketByID($id)
    {
        $statement = Get_PDO()->prepare("SELECT * FROM tasks WHERE id = ".$id);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC)[0];
    }

    public static function ReplaceTicket($ticket)
    {
        $sql = 'UPDATE tasks SET username = "'.$ticket['username'].'", email = "'.$ticket['email'].'", content = "'.$ticket['content'].'", progress = "'.$ticket['progress'].'" WHERE id = "'.$ticket['id'].'"';
        $statement = Get_PDO()->prepare($sql);
        $statement->execute();
    }

    public static function DeleteTicketByID($id)
    {
        $sql = "DELETE FROM `tasks` WHERE `id` = ?";
        $statement = Get_PDO()->prepare($sql);
        $statement->execute([$id]);
    }
}
