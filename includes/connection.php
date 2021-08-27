<?php
require("constants.php");

function Get_PDO()
{
    return new PDO(DB_NAME, DB_USER, DB_PASS);;
}

?>