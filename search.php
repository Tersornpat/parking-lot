<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Services - Brand</title>

    <?php
    require("head.php");
    require("functions.php");
    include "./connectdb.php";
    ?>


    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <?php
    $page = 'Search';
    require("nav.php");

    $slot = array(
        array("AA", "AB"),
        array("BA", "BB"),
        array("CA", "CB"),
        array("DA", "DB"),
        array("EA", "EB")
    );
    ?>


    <section class="py-2">
        <div class="container py-5">
            <div class="row mb-3">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <p class="fw-bold text-success mb-2" style="font-family: Kanit;">ค้นหารถ</p>
                    <h2 class="fw-bold">Search Parking</h2>
                </div>
            </div>
            <form action="search.php" method="post">
                <div class="row row-cols-5 mb-5 justify-content-center">
                    <input class="form-control" style="width: 300px; margin-right: 20px" type="text" id="name-1" name="plate" placeholder="<?php if (isset($_POST["plate"])) echo $_POST["plate"];
                                                                                                                                            else echo "License Plate"; ?>">
                    <input class="btn btn-primary shadow" type="submit" value="Search" name="Search">
                </div>
            </form>

            <?php

            if (isset($_POST["Search"])) {
                $data = search($_POST["plate"], $conn);
                if ($data != null) {
                    $floor = $data["floor"];
                    $myslot = strtoupper($data["slot"]);

            ?>

                    <div class="row mb-3">
                        <div class="col-md-8 col-xl-6 text-center mx-auto">
                            <p class="fw-bold text-success mb-2" style="font-family: Kanit;"> ชั้น <?php print($floor) ?></p>
                            <h2 class="fw-bold" style="font-family: Kanit;">Plate: <?php print($data["plate"] . ", ชั้น: " . $floor . ", Slot: " . $myslot) ?></h2>
                        </div>
                    </div>
                    <div class="row row-cols-1 row-cols-md-2 mx-auto" style="max-width: 900px;">
                        <table class="table">
                            <tbody>
                        <?php

                        for ($i = 0; $i < 5; $i++) {
                            echo '                        
                            <tr style="text-align: center;">
                                <td scope="row" style="padding: 50px; font-size: 30px; ';

                            if ($slot[$i][0] == $myslot) echo " background-color: #19A7CE; ";
                            echo '">';
                            echo $floor . $slot[$i][0];
                            echo '</td>';


                            echo '<td style="padding: 50px; font-size: 30px;';
                            if ($slot[$i][1] == $myslot) echo " background-color: #19A7CE; ";
                            echo '">';
                            echo $floor . $slot[$i][1]
                                . '</td>

                        </tr>';
                        }
                    }
                }
                        ?>
                            </tbody>
                        </table>
                    </div>'
        </div>
    </section>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <?php
    require("foot.php");
    ?>

    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bold-and-bright.js"></script>
</body>

</html>