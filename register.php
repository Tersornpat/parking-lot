<?php
    session_start();
    include "./connectdb.php";

$floor = $_GET["floor"];
$slot = $_GET["slot"];
$plate = $_GET["plate"];

try{
    $registerCar = "INSERT INTO parking Value('$plate','$floor','$slot');";
    $result = $conn->query($registerCar);
    $conn->close();

    echo "alert('Register Successfully!')";
    header("Location: ./register.html");
}catch(Exception $e) {
    echo "alert('Register Failed!')";
    header("Location: ./register.html");
}
?>