<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Mission Add</title>
</head>
<?php
include("../login/connect.php");
include("navbar.php");

if (isset($_POST['submit'])) {
    $name = $_POST['title'];
    $pass = $_POST['details'];
    $tie = $_POST['tie'];

    $targetDirectory = "../uploads/";
    $targetFile = $targetDirectory . basename($_FILES['image']['name']);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if (isset($_POST['submit'])) {
        $check = getimagesize($_FILES['image']['tmp_name']);
        if ($check !== false) {
            echo "File is an image - " . $check['mime'] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($targetFile)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES['image']['size'] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        // if everything is ok, try to upload file
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            echo "The file " . htmlspecialchars(basename($_FILES["image"]["name"])) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    // Inserting data into the database
    // $sqllll = "INSERT INTO admission(name,birth,gender,address,contactno,province,village,gurdian,photo,class,registrationdate) VALUES ('$name','$birth','$gender','$address','$contact','$province','$village','$gurdian','$targetFile','$class','$date')";
    $sqlllllll = "INSERT INTO mission(title,details,photo,time) VALUES ('$name','$pass','$targetFile','$tie')";

    $connectionadminloginn = mysqli_query($conn, $sqlllllll);

    // $resultttt = mysqli_query($conn, $sqllll);

    if ($connectionadminloginn) {
        $_SESSION['statuss'] = "Details saved successfully.";
        header('location:missions.php');
    } else {
        $_SESSION['statuss'] = "Cannot upload the image or save details.";
        header('location:missions.php');
    }
}


if (isset($_POST['delete_submittt'])) {
    $ad_id = $_POST['add_id'];
    $qq = "DELETE FROM mission WHERE id='$ad_id'";
    $qq_r = mysqli_query($conn, $qq);
}
?>
?>

<body>
    <?php
    include("../login/connect.php");
    include('navbar.php');
    ?>
    <!-- view modal -->
    <div class="modal fade" id="studentviewmodall" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header ">
                    <h1 class="modal-title fs-3 " id="exampleModalLabel"> <span style="margin-left: 150px;"> Mission Details</span>
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="student_vewingg_data">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>

    <!-- view modal -->

    <!-- edit data  -->
    <div class="modal fade mt-5" id="studenteditmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addStudentsLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <form action="missions.php" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <label for="Name" class="mb-2 fw-bold">Mission Name: </label>
                            <input type="text" name="title" id="edit_title" class="form-control" placeholder="Enter the mission title here" required>
                            <input type="hidden" name="title" id="edit_id" class="form-control" placeholder="Enter the mission title here" required>

                        </div>
                        <div class="form-group mb-3">
                            <label for="password" class="mb-2 fw-bold">Mission Details:</label>
                            <input type="text" name="details" id="edit_details" class="form-control" placeholder="Describe  mission  here.." required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="password" class="mb-2 fw-bold">Arrival Time:</label>
                            <input type="text" name="tie" id="edit_time" class="form-control" placeholder="Note Arrival here.." required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="image" class="mb-2 fw-bold">Location Photo:</label>
                            <input type="file" name="image" id="edit_image" class="form-control" placeholder="" required>
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
    <!-- edit data  -->


    <!-- delete data  -->
    <div class="modal fade" id="studentdeletemodalll" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="missions.php" method="POST" enctype="multipart/form-data">
                    <div class="modal-header ">
                        <h1 class="modal-title fs-5 " id="studentdeletemodalll"> <span>Delete Data</span>
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="delete_id" name="add_id">
                        <h5>Are you sure?</h5>
                    </div>
                    <div class=" modal-footer">
                        <button type="button" class="btn btn-success" data-bs-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-danger" name="delete_submittt">Yes</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- delete data  -->
    <div class="modal fade mt-5" id="addStudents" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addStudentsLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addStudentsLabel">Add Mission Here</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="missions.php" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <label for="Name" class="mb-2 fw-bold">Mission Name: </label>
                            <input type="text" name="title" class="form-control" placeholder="Enter the mission title here" required>

                        </div>
                        <div class="form-group mb-3">
                            <label for="password" class="mb-2 fw-bold">Mission Details:</label>
                            <input type="text" name="details" class="form-control" placeholder="Describe  mission  here.." required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="password" class="mb-2 fw-bold">Arrival Time:</label>
                            <input type="text" name="tie" class="form-control" placeholder="Note Arrival here.." required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="image" class="mb-2 fw-bold">Location Photo:</label>
                            <input type="file" name="image" class="form-control" placeholder="" required>
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
    <!-- Button trigger modal -->
    <main class="mt-5 pt-5">
        <div class="card ms-3 me-3" style="width:auto">
            <div class="card-header">
                Add New Mission
            </div>
            <div class="card-body d-flex justify-content-between ">
                <p>To add mission click here</p>
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addStudents">
                    Add New Mission
                </button>
            </div>
        </div>

        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="card mt-3 ">
                        <div class="card-header" style="border-bottom: 1px solid blue;">
                            <h5>Mission List</h5>
                            <!-- <button id="printButton" class="btn btn-primary">Print Details</button> -->

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Photo</th>
                                            <th scope="col">Details</th>
                                            <th scope="col">Operations</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include('../login/connect.php');
                                        $fetchdata = "SELECT * FROM  mission";
                                        $fetchqueryrun = mysqli_query($conn, $fetchdata);
                                        if (mysqli_num_rows($fetchqueryrun) > 0) {
                                            foreach ($fetchqueryrun as $row) {
                                                // echo $row['id'];
                                        ?>
                                                <tr>
                                                    <td class="user_id"><?php echo $row['id'] ?></td>

                                                    <td><?php echo $row['title'] ?></td>


                                                    <td><img src="../uploads/<?php echo $row['photo']; ?>" alt="adminlist" height="50px" width="50px"></td>
                                                    <td><?php echo $row['details'] ?></td>



                                                    <td><a href="#"><i class="bi bi-eye text-success ms-4 view_dataa fs-5"></i></a>
                                                        <a href="#"><i class="bi bi-pencil-square ms-1 fs-5  edit_btnn"></i></a>

                                                        <a href=""><i class="bi bi-trash text-danger ms-1 fs-5 delete-btnn"></i></a>
                                                    </td>

                                                </tr>
                                            <?php

                                            }
                                        } else {
                                            ?>
                                            <tr colspan="6"> No Record Found </tr>
                                        <?php                                    }
                                        ?>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>

</body>
<script src="../js/jquery.dataTables.min.js"></script>
<script src="../js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
<script>
    $(document).ready(function() {


        $('.view_dataa').click(function(e) {
            e.preventDefault(); // Prevent the default action of the anchor tag

            // console.log("hello ");
            var user_id = $(this).closest('tr').find('.user_id').text();
            // console.log(user_id);

            $.ajax({
                method: "POST",
                url: "code.php",
                data: {
                    'click_viewstd_btn': true,
                    'std_id': user_id,
                },

                success: function(response) {
                    // console.log(response);
                    $('.student_vewingg_data').html(response);
                    $('#studentviewmodall').modal('show');
                    $('#studentviewmodall').on('hidden.bs.modal', function() {
                        // Reload the page once after the modal is dismissed
                        location.reload();
                    });
                }
            });
        });
        $('.edit_btnn').click(function(e) {
            e.preventDefault(); // Prevent the default action of the anchor tag

            // console.log("hello ");
            var user_id = $(this).closest('tr').find('.user_id').text();
            console.log(user_id);

            $.ajax({
                type: "POST",
                url: "code.php",
                data: {
                    'click_edit_btn': true,
                    'user_idd': user_id,
                },

                success: function(response) {
                    // console.log(response);
                    // $('.student_vewing_data').html(response);
                    // $('#studenteditmodal').modal('show');
                    $.each(response, function(key, value) {
                        var imagePath = value['photo'];
                        // console.log(value['name']);
                        $('#edit_id').val(value['id']);
                        $('#edit_title').val(value['title']);
                        $('#edit_image').attr('src', '../uploads/' + imagePath);

                        $('#edit_details').val(value['details']);
                        $('#edit_time').val(value['time']);

                    });
                    $('#studenteditmodal').modal('show');
                    $('#studenteditmodal').on('hidden.bs.modal', function() {
                        // Reload the page once after the modal is dismissed
                        location.reload();
                    });
                }
            });
        });
        $('.delete-btnn').click(function(e) {
            e.preventDefault(); // Prevent the default action of the anchor tag

            // console.log("hello ");
            var user_id = $(this).closest('tr').find('.user_id').text();
            console.log(user_id);

            $('#delete_id').val(user_id);
            $('#studentdeletemodalll').modal('show');

        });
    });
</script>

</script>

</html>