<?php
define('SERVER', 'localhost:3306');
define('USERNAME', 'root');
define('PASSWORD', '');
define('DATABASE', 'parking_lot');

function connect()
{
    $mysqli = new mysqli(SERVER, USERNAME, PASSWORD, DATABASE);
    if ($mysqli->connect_errno != 0) {
        return false;
    } else {
        return $mysqli;
    }
}

$conn = connect();
