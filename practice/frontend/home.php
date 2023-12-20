<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fire Station</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .carousel-item {
            height: 34rem;
            width: 100%;
            margin-top: 42px;
            overflow: hidden;
        }

        .carousel-item img {
            margin-top: 26px;
            width: 100%;

            height: 100%;
            object-fit: cover;

        }

        .card-img-top {
            height: 16rem;
        }
    </style>
</head>



<body>
    <?php
    include("navbar.php");
    ?>
    <div class="container-fluid w-100">

        <div id="carouselExampleIndicators" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../uploads/logo1.avif" class="d-block w-100 " alt="...">
                </div>
                <div class="carousel-item">
                    <img src="../uploads/logo2.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="../uploads/logo3.webp" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <main style="margin-top:2rem;">
        <div class="container-fluid ">
            <div class="text my-3 align-content-center border ">
                <h5 class="fs-5 fw-bold py-4 text-primary ms-lg-5">Missions</h5>
            </div>
            <div class="row">

                <div class="col-md-3 mb-3">
                    <div class="card" style="width: 18rem;">
                        <img src="../uploads/images-2.jpeg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Missions First</h5>

                            <a href="../login/adminlogin.php" class="btn btn-primary">See Report</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card" style="width: 18rem;">
                        <img src="../uploads/logo3.webp" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Missions Second</h5>

                            <a href="../login/adminlogin.php" class="btn btn-primary">See Report</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card" style="width: 18rem;">
                        <img src="../uploads/logo2.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Missions Third</h5>

                            <a href="../login/adminlogin.php" class="btn btn-primary">See Report</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card" style="width: 18rem;">
                        <img src="../uploads/logo1.avif" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Missions Fourth</h5>

                            <a href="../login/adminlogin.php" class="btn btn-primary">See Report</a>
                        </div>
                    </div>
                </div>


            </div>
    </main>

    <?php
    include("footer.php");
    ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>