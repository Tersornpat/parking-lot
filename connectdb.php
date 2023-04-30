<?php
define('SERVER', '104.248.150.246:3306');
define('USERNAME', 'sornpat');
define('PASSWORD', '1234');
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
