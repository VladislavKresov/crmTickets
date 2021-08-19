<?php
class Ticket
{    
    private $author;
    private $text;
    private $progress;

    public function __construct($author, $text, $progress)
    {
        $this->author = $author;
        $this->text = $text;
        $this->progress = $progress;
    }

    public function GetAuthor()
    {
        return $this->author;
    }

    public function GetText()
    {
        return $this->text;
    }

    public function GetProgress()
    {
        return $this->progress;
    }

    public function SetAuthor($user)
    {
        $this->author = $user;
    }

    public function SetText($text)
    {
        $this->text = $text;
    }

    public function SetProgress($progress)
    {
        $this->progress = $progress;
    }
}