<?php
require_once "mysql_credentials.php";

class MySQL
{
    ///Returns result from query
    public static function query($query){
        $connection = new mysqli(HOST,USER,PASSWORD)
            or die ("MYSQL CONNECTION FAILED\n:" . mysqli_connect_error());
        $query = $connection->escape_string($query);
        $result = $connection->query($query)
            or die("MYSQL QUERRY ERROR:\n" . mysqli_error());
        $connection->close();
        return $result;
    }
}