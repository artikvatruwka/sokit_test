<?php
require_once "mysql_credentials.php";

class MySQL
{
    public static function connection(){
        return new mysqli(HOST,USER,PASSWORD,DATABASE);
    }
}