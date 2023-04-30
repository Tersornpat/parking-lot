<nav class="navbar navbar-light navbar-expand-md sticky-top navbar-shrink py-3" id="mainNav">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="./">
            <span>
                Parking-Lot
            </span>
        </a>
        <button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1">
            <span class="visually-hidden">Toggle navigation</span>
            <span class="navbar-toggler-icon"> </span>
        </button>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="navbar-nav mx-auto">
                <?php
                if ($page == 'Search') {
                    echo '<li class="nav-item"><a class="nav-link" href="index.php">Booking</a></li>';
                    echo '<li class="nav-item"><a class="nav-link active" href="search.php">Search</a></li>';
                } else if ($page == 'index') {
                    echo '<li class="nav-item"><a class="nav-link active" href="index.php">Booking</a></li>';
                    echo '<li class="nav-item"><a class="nav-link" href="search.php">Search</a></li>';
                }

                // session_start();
                ?>


            </ul><a class="btn btn-primary shadow" role="button" href="index.php">Booking</a>
        </div>
    </div>
</nav>