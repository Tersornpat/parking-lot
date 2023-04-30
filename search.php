<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Services - Brand</title>

    <?php
    require("head.php");
    ?>


    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <?php
    $page = 'Search';
    require("nav.php");

    // if(isset()){

    // }
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
                    <input class="btn btn-primary shadow" type="submit" value="Search">
                </div>
            </form>
            <div class="row row-cols-1 row-cols-md-2 mx-auto" style="max-width: 900px;">
                <table class="table">
                    <tbody>
                        <tr>
                            <td scope="row">1</td>
                            <td>Mark</td>
                        </tr>
                        <tr>
                            <td scope="row">2</td>
                            <td>Jacob</td>
                        </tr>
                        <tr>
                            <td scope="row">3</td>
                            <td>Larry</td>
                        </tr>
                    </tbody>
                </table>
                <!-- <div class="col mb-5"><img class="rounded img-fluid shadow" src="assets/img/products/1.jpg"></div>
                <div class="col d-md-flex align-items-md-end align-items-lg-center mb-5">
                    <div>
                        <h5 class="fw-bold">Lorem ipsum dolor sit&nbsp;</h5>
                        <p class="text-muted mb-4">Erat netus est hendrerit, nullam et quis ad cras porttitor iaculis. Bibendum vulputate cras aenean.</p>
                        <button class="btn btn-primary shadow" type="button">Learn more</button>
                    </div>
                </div> -->
            </div>
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