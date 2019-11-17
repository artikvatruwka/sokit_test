<?php
require_once "mysql_credentials.php";

class MySQL
{
    ///Returns result from query
    public static function query($query){
        $connection = new mysqli(HOST,USER,PASSWORD,DATABASE)
            or die ("MYSQL CONNECTION FAILED\n:" . mysqli_connect_error($connection) . " $query");
        //$query = $connection->escape_string($query);

        $result = $connection->query($query)
            or die("MYSQL QUERY ERROR:\n" . mysqli_error($connection) . " $query");
        $connection->close();
        return $result;
    }
}