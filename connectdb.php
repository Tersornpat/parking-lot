<?php
$servername = "104.248.150.246:3306";
$username = "sornpat";
$password = "1234";
$dbname = "car";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>