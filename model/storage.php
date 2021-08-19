<?php
class Storage
{
    private static $sql_insert = "INSERT INTO tasks (username, email, content, progress) VALUES (:username, :email, :content, :progress)";
    private static $sql_select = "SELECT * FROM tasks";

    public static function InsertTicket($ticket)
    {
        $pdo = new PDO("mysql:host=localhost;dbname=testproject", "root", "");
        $statement = $pdo->prepare(self::$sql_insert);
        $statement->bindParam(":username", $ticket['username']);
        $statement->bindParam(":email", $ticket['email']);
        $statement->bindParam(":content", $ticket['content']);
        $statement->bindParam(":progress", $ticket['progress']);
        $statement->execute();
    }

    public static function SelectTickets()
    {
        $pdo = new PDO("mysql:host=localhost;dbname=testproject", "root", "");
        $statement = $pdo->prepare(self::$sql_select);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}
