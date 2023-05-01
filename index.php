<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Parking-Lot</title>
    <link rel="icon" type="image/x-icon" href="./assets/img/vehicle.png">

    <?php
    require("head.php");
    require("functions.php");
    include "./connectdb.php";

    ?>

    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">
</head>

<body>
    <?php
    $page = 'index';
    require("nav.php");

    if (isset($_POST["Booking"]) && isset($_POST["floor"]) && isset($_POST["slot"]) && isset($_POST["plate"])) {
        $floor = $_POST["floor"];
        $slot = $_POST["slot"];
        $plate = $_POST["plate"];

    }

    ?>

    <section class="py-2" style="height:100%">
        <div class="container py-5">
            <div class="row mb-3">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <p class="fw-bold text-success mb-2" style="font-family: Kanit;">จำที่จอดรถ</p>
                    <h2 class="fw-bold">Register Car's Parking by Plate</h2>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 col-xl-4">
                    <div>
                        <form class="p-3 p-xl-4" method="post" action="./index.php">
                            <div class="mb-3">
                                <select class="form-control" name="floor" id="name-1">
                                    <option value="" disabled selected>Select floor</option>
                                    <option value="1">Floor 1</option>
                                    <option value="2">Floor 2</option>
                                    <option value="3">Floor 3</option>
                                    <option value="4">Floor 4</option>
                                    <option value="5">Floor 5</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <select class="form-control" name="slot" id="name-1">
                                    <option value="" disabled selected>
                                        <b>Select Slot</b>
                                    </option>
                                    <option value="aa">Slot AA</option>
                                    <option value="ab">Slot AB</option>
                                    <option value="ba">Slot BA</option>
                                    <option value="bb">Slot BB</option>
                                    <option value="ca">Slot CA</option>
                                    <option value="cb">Slot CB</option>
                                    <option value="ca">Slot DA</option>
                                    <option value="cb">Slot DB</option>
                                    <option value="ca">Slot EA</option>
                                    <option value="cb">Slot EB</option>
                                </select>
                            </div>
                            <div class="mb-3"><input class="form-control" type="text" id="name-1" name="plate" placeholder="License Plate"></div>
                            <div>
                                <input class="btn btn-primary shadow d-block w-100" type="submit" name="Booking" value="Register">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php

    if (isset($_POST["Booking"]) && $message = addPlate($floor, $slot, $plate, $conn)) {
        if (isset($plate)) {
            echo '
            <div class="container py-2">
                <div class="row mb-1">
                    <div class="col-md-8 col-xl-6 text-center mx-auto">
                        <p class="fw-bold text-success mb-1" style="font-family: Kanit;"> ' . $message . ' </p>
                    </div>
                </div>
            </div>
            
            ';
        }
    }

    ?>

    <div class="footer">
        <?php
            require("foot.php");
        ?>
    </div>

    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bold-and-bright.js"></script>
</body>

</html>