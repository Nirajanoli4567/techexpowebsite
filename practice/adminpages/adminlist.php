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
    include('navbar.php');

    ?>
    <!-- update php  -->
    <?php
    // session_start();
    include('../login/connect.php');
    if (isset($_POST['update_submit'])) {

        $name = $_POST['name'];
        $id = $_POST['edit_id'];

        $birth = $_POST['DOB'];
        $gender = $_POST['gender'];
        $address = $_POST['address'];
        $contact = $_POST['contact'];
        $province = $_POST['province'];
        $village = $_POST['village'];
        $email = $_POST['email'];

        $date = $_POST['dateofregister'];
        $username = $_POST['username'];
        $Password = $_POST['Password'];

        // File upload handling
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
        $sqllll = "UPDATE addadminn SET name='$name', DOB='$birth', gender='$gender', address='$address', number='$contact', province='$province', village='$village', email='$email', image='$targetFile', registrationdate='$date', username='$username', password='$Password' WHERE id='$id'";
        $resultttt = mysqli_query($conn, $sqllll);

        if ($resultttt) {
            $_SESSION['statuss'] = "Details saved successfully.";
            header('location:adminlist.php');
        } else {
            $_SESSION['statuss'] = "Cannot upload the image or save details.";
            header('location:adminlist.php');
        }
    }
    if (isset($_POST['delete_submit'])) {
        $ad_id = $_POST['ad_id'];
        $q = "DELETE FROM addadminn WHERE id='$ad_id'";
        $q_r = mysqli_query($conn, $q);
    }
    ?>
    <!-- view modal -->
    <div class="modal fade" id="studentviewmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header ">
                    <h1 class="modal-title fs-3 " id="exampleModalLabel"> <span style="margin-left: 150px;">Admin Details</span>
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="student_vewing_data">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>

    <!-- view modal -->

    <!-- admin edit modal  -->
    <div class="modal fade" id="studenteditmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg ">
            <div class="modal-content">
                <div class="modal-header ">
                    <h1 class="modal-title fs-3 " id="studenteditmodal"> <span class="text-center"> Update Details</span>
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="student_vewing_data">
                        <form class="row g-3" method="POST" enctype="multipart/form-data" action="adminlist.php">
                            <input type="hidden" name="edit_id" id="edit_id">
                            <div class="col-md-4">
                                <label for="name" class="form-label">Admin's name:</label>
                                <input type="text" class="form-control" id="edit_name" placeholder="Enter your name here.." name="name" required>
                            </div>

                            <div class="col-md-4">
                                <label for="dateofbirth" class="form-label">Date Of Birth:</label>
                                <input type="text" class="form-control" id="edit_nepali-datepicker-dobb" placeholder="yyyy-mm-dd" name="DOB" required>

                            </div>
                            <div class="col-md-4">
                                <label for="gender" class="form-label">Gender:</label>
                                <select id="edit_gender" class="form-select" required name="gender">
                                    <option selected>Male</option>
                                    <option>Female</option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label for="address" class="form-label">Address:</label>
                                <input type="text" class="form-control" id="edit_address" placeholder="Enter your address here.." name="address" required>
                            </div>
                            <div class="col-md-4">
                                <label for="contact" class="form-label">Contact no:</label>
                                <input type="number" class="form-control" id="edit_number" placeholder="Enter the number here.." name="contact" required>
                            </div>
                            <div class="col-md-4">
                                <label for="province" class="form-label">Province:</label>
                                <select id="edit_province" class="form-select" name="province">
                                    <option selected>Province 5</option>
                                    <option value="province 1">Province 1</option>
                                    <option value="province 2">Province 2</option>
                                    <option value="province 3">Province 3</option>
                                    <option value="province 4">Province 4</option>
                                    <option value="province 6">Province 6</option>
                                    <option value="province 7">Province 7</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="inputCity" class="form-label">City/Village:</label>
                                <input type="text" class="form-control" id="edit_city" name="village" placeholder="Enter your city/village here.." name="city" required>
                            </div>


                            <div class="col-md-4">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" class="form-control" id="edit_email" placeholder="Enter your email name here.." name="email" required>
                            </div>
                            <div class="col-md-4">
                                <label for="photo" class="mb-2 fw-bold"> Photo</label>
                                <input type="file" name="image" class="form-control" id="edit_image" placeholder="Upload the photo here" required>
                            </div>

                            <div class="col-md-4">
                                <label for="registrationdate" class="form-label">Registration Date:</label>
                                <input type="text" class="form-control" id="edit_nepali-datepicker-registrationn" name="dateofregister" placeholder="Enter today's date here.." name="registrationdate" required>
                            </div>
                            <div class="col-md-4">
                                <label for="registrationdate" class="form-label">username:</label>
                                <input type="text" class="form-control" id="edit_username" name="username" placeholder="Enter today's date here.." name="registrationdate" required>
                            </div>
                            <div class="col-md-4">
                                <label for="registrationdate" class="form-label">Password:</label>
                                <input type="password" class="form-control" id="edit_password" name="Password" placeholder="Enter today's date here.." name="registrationdate" required>
                            </div>

                            <div class="col-12 d-flex justify-content-end">

                                <button type="submit" name="update_submit" class="btn btn-primary">Update Details</button>

                                <button type="reset" class="btn btn-secondary bg-success ms-2">Reset</button>

                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
    <!-- admin edit modal  -->


    <!-- delete modal -->
    <div class="modal fade" id="studentdeletemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="adminlist.php" method="POST" enctype="multipart/form-data">
                    <div class="modal-header ">
                        <h1 class="modal-title fs-5 " id="studentdeletemodal"> <span>Delete Data</span>
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="delete_id" name="ad_id">
                        <h5>Are you sure?</h5>
                    </div>
                    <div class=" modal-footer">
                        <button type="button" class="btn btn-success" data-bs-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-danger" name="delete_submit">Yes</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- delete modal -->

    <main class="mt-5 pt-5 me-3 ms-6">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="card mt-3 ">
                        <div class="card-header" style="border-bottom: 1px solid blue;">
                            <h5>Admin List</h5>
                            <!-- <button id="printButton" class="btn btn-primary">Print Details</button> -->

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Photo</th>
                                            <th scope="col">Address</th>



                                            <th scope="col">Number</th>
                                            <th scope="col">Operations</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include('../login/connect.php');
                                        $fetchdata = "SELECT * FROM  addadminn";
                                        $fetchqueryrun = mysqli_query($conn, $fetchdata);
                                        if (mysqli_num_rows($fetchqueryrun) > 0) {
                                            foreach ($fetchqueryrun as $row) {
                                                // echo $row['id'];
                                        ?>
                                                <tr>
                                                    <td class="user_id"><?php echo $row['id'] ?></td>

                                                    <td><?php echo $row['name'] ?></td>


                                                    <td><img src="../uploads/<?php echo $row['image']; ?>" alt="adminlist" height="50px" width="50px"></td>
                                                    <td><?php echo $row['address'] ?></td>

                                                    <td><?php echo $row['number'] ?></td>

                                                    <td><a href="#"><i class="bi bi-eye text-success ms-4 view_data fs-5"></i></a>
                                                        <a href="#"><i class="bi bi-pencil-square ms-1 fs-5  edit_btn"></i></a>

                                                        <a href=""><i class="bi bi-trash text-danger ms-1 fs-5 delete-btn"></i></a>
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
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper@1.0.1/index.min.js"></script>
<script src="../js/jquery.dataTables.min.js"></script>
<script src="../js/dataTables.bootstrap5.min.js"></script>


<script>
    $(document).ready(function() {
        $('.table').DataTable();
    });
    $(document).ready(function() {


        $('.view_data').click(function(e) {
            e.preventDefault(); // Prevent the default action of the anchor tag

            // console.log("hello ");
            var user_id = $(this).closest('tr').find('.user_id').text();
            // console.log(user_id);

            $.ajax({
                method: "POST",
                url: "code.php",
                data: {
                    'click_vieww_btn': true,
                    'user_id': user_id,
                },

                success: function(response) {
                    // console.log(response);
                    $('.student_vewing_data').html(response);
                    $('#studentviewmodal').modal('show');
                    $('#studentviewmodal').on('hidden.bs.modal', function() {
                        // Reload the page once after the modal is dismissed
                        location.reload();
                    });
                }
            });
        });
        $('.edit_btn').click(function(e) {
            e.preventDefault(); // Prevent the default action of the anchor tag

            // console.log("hello ");
            var user_id = $(this).closest('tr').find('.user_id').text();
            console.log(user_id);

            $.ajax({
                type: "POST",
                url: "code.php",
                data: {
                    'click_edit_btn': true,
                    'user_id': user_id,
                },

                success: function(response) {
                    // console.log(response);
                    // $('.student_vewing_data').html(response);
                    // $('#studenteditmodal').modal('show');
                    $.each(response, function(key, value) {
                        var imagePath = value['image'];
                        // console.log(value['name']);
                        $('#edit_id').val(value['id']);
                        $('#edit_name').val(value['name']);
                        $('#edit_nepali-datepicker-dobb').val(value['DOB']);
                        $('#edit_gender').val(value['gender']);
                        $('#edit_address').val(value['address']);
                        $('#edit_number').val(value['number']);
                        $('#edit_province').val(value['province']);
                        $('#edit_city').val(value['village']);
                        $('#edit_email').val(value['email']);
                        $('#edit_image').attr('src', '../uploads/' + imagePath);
                        $('#edit_nepali-datepicker-registrationn').val(value['registrationdate']);
                        $('#edit_username').val(value['username']);
                        $('#edit_password').val(value['password']);

                    });
                    $('#studenteditmodal').modal('show');
                    $('#studenteditmodal').on('hidden.bs.modal', function() {
                        // Reload the page once after the modal is dismissed
                        location.reload();
                    });
                }
            });
        });
        $('.delete-btn').click(function(e) {
            e.preventDefault(); // Prevent the default action of the anchor tag

            // console.log("hello ");
            var user_id = $(this).closest('tr').find('.user_id').text();
            console.log(user_id);

            $('#delete_id').val(user_id);
            $('#studentdeletemodal').modal('show');

        });
    });
</script>


<!-- <script>
    // ... (your existing JavaScript)

    $(document).ready(function() {
        // ... (your existing code)

        // Print button click event
        $('#printButton').click(function() {
            printDetails();
        });
    });

    function printDetails() {
        // Clone the table and its content to avoid modifying the original table
        var printContent = $('.table').clone();

        // Remove unnecessary elements from the print view (e.g., buttons, modals)
        printContent.find('button').remove();
        printContent.find('.modal').remove();

        // Remove the "Operations" column from the print view
        printContent.find('th:contains("Operations")').remove();
        printContent.find('td:last-child').remove();

        // Create a new window for printing
        var printWindow = window.open('', '_blank');
        printWindow.document.write('<html><head><title>Print Details</title>');
        printWindow.document.write('<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />');
        printWindow.document.write('</head><body>');
        printWindow.document.write('<div class="container">');
        printWindow.document.write(printContent.prop('outerHTML'));
        printWindow.document.write('</div></body></html>');

        // Close the new window after printing
        printWindow.document.close();
        printWindow.print();
        printWindow.onafterprint = function() {
            printWindow.close();
        };
    }
</script> -->


</html>