<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>This is Navigate</title>
</head>
<body>
    <?php
        session_start();
        include "./connectdb.php";

    $plate = $_GET["plate"];

    $serchPlate = "SELECT * FROM parking WHERE plate = '$plate';";
    $result = $conn->query($serchPlate);
    $conn->close();

    $row = $result->fetch_assoc();

    echo $row["plate"]."   ".$row["floor"]."   ".$row["slot"]."   ".$row["start_date"];

    ?>

</body>
</html>