<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="../css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <title>Document</title>
</head>

<body>
    <?php
    include('../superadmin/navbar.php');
    ?>
    <!-- now making the form submission in php -->
    <?php
    include("../login/connect.php");

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $class = $_POST['class'];
        $parents = $_POST['parentsname'];
        $address = $_POST['address'];
        $image = $_FILES['image']['name'];

        $sqll = "INSERT INTO addstudent(name,class,parentsname,address,photo) VALUES ('$name','$class','$parents','$address','$image')";

        $connectionstudent = mysqli_query($conn, $sqll);
        if ($connectionstudent) {
            move_uploaded_file($_FILES["image"]["tmp_name"], "../studentsphoto/" . $_FILES['image']['name']);
            $_SESSION['status'] = "image uploaded";
            header('location:addstudents.php');
        } else {
            $_SESSION['status'] = "Cannot upload the image";
            header('location:addstudents.php');
        }
    }
    ?>
    <div class="modal fade" id="addStudents" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addStudentsLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addStudentsLabel">Add Students Here</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="addstudents.php" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <label for="Name" class="mb-2 fw-bold">Name </label>
                            <input type="text" name="name" class="form-control" placeholder="Enter the name here" required>

                        </div>
                        <div class="form-group mb-3">
                            <label for="class" class="mb-2 fw-bold">Class</label>
                            <input type="number" name="class" class="form-control" placeholder="Enter the class here" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="name" class="mb-2 fw-bold"> Parents Name</label>
                            <input type="text" name="parentsname" class="form-control" placeholder="Enter the parents name here" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="address" class="mb-2 fw-bold">Address</label>
                            <input type="text" name="address" class="form-control" placeholder="Enter the address here" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="photo" class="mb-2 fw-bold"> Photo</label>
                            <input type="file" name="image" class="form-control" placeholder="Upload the photo here" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" name="submit" class="btn btn-primary">Save Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <main class="mt-5 pt-5">
        <div class="container-fluid">
            <div id="carouselExampleCaptions" class="carousel slide">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="..." class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>First slide label</h5>
                            <p>Some representative placeholder content for the first slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="..." class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Second slide label</h5>
                            <p>Some representative placeholder content for the second slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="..." class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Third slide label</h5>
                            <p>Some representative placeholder content for the third slide.</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

    </main>
</body>
<script src="../js/jquery.dataTables.min.js"></script>
<script src="../js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>

</html>