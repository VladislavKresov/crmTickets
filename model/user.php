<?php
class User{
    public $UserName;
    public $Email;

    public function __construct($username, $email)
    {
        $this->UserName = $username;
        $this->Email = $email;
    }
}