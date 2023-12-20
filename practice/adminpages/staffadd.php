<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="../css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <!-- <link href="https://nepalidatepicker.sajanmaharjan.com.np/nepali.datepicker/css/nepali.datepicker.v4.0.1.min.css" rel="stylesheet" type="text/css" /> -->

    <title>Addadmin</title>
</head>
<style>
    input::placeholder {
        font-size: 14px;
        /* Adjust the font size as needed */
    }

    select.form-select {
        font-size: 14px;

    }


    select.form-select option {
        font-size: 14px;
        /* Adjust the font size as needed */
    }
</style>

<body>


    <?php
    include('navbar.php');
    include('../login/connect.php');

    session_start();

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];

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

        // echo $name;
        // Inserting data into the database
        $sqlllll = "INSERT INTO addstaff(name,DOB,gender,address,number,province,village,email,image,registrationdate,username,password) VALUES ('$name','$birth','$gender','$address','$contact','$province','$village','$email','$targetFile','$date', '$username','$Password')";

        $resulttttt = mysqli_query($conn, $sqlllll);

        if ($resulttttt) {
            $_SESSION['statuss'] = "Details saved successfully.";
            header('location:staffadd.php');
        } else {
            $_SESSION['statuss'] = "Cannot upload the image or save details.";
            header('location:staffadd.php');
        }
    }


    ?>

    <!-- modal -->
    <!-- Button trigger modal -->


    <!-- Modal -->

    <main class="mt-5 pt-5">
        <div class="row  ms-3 me-3" style="width: auto;">

            <div class="card">
                <div class="card-header fs-5 ">
                    Add Staffs
                </div>
                <div class="card-body">
                    <div class="card-body  ">
                        <span class="text-info " style=" font-weight:700; font-size:16px; "> Staff's Information:</span>
                        <div class="card-body border-1" style="border:1px solid lightgray; font-size:14px;">
                            <form class="row g-3" method="POST" enctype="multipart/form-data" action="staffadd.php">
                                <div class="col-md-4">
                                    <label for="name" class="form-label">Staff's name:</label>
                                    <input type="text" class="form-control" id="stdname" placeholder="Enter your name here.." name="name" required>
                                </div>

                                <div class="col-md-4">
                                    <label for="dateofbirth" class="form-label">Date Of Birth:</label>
                                    <input type="text" class="form-control" id="nepali-datepicker-dobb" placeholder="yyyy-mm-dd" name="DOB" required>

                                </div>
                                <div class="col-md-4">
                                    <label for="gender" class="form-label">Gender:</label>
                                    <select id="gender" class="form-select" required name="gender">
                                        <option selected>Male</option>
                                        <option>Female</option>
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label for="address" class="form-label">Address:</label>
                                    <input type="text" class="form-control" id="address" placeholder="Enter your address here.." name="address" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="contact" class="form-label">Contact no:</label>
                                    <input type="number" class="form-control" id="number" placeholder="Enter the number here.." name="contact" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="province" class="form-label">Province:</label>
                                    <select id="province" class="form-select" name="province">
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
                                    <input type="text" autocomplete="off" class="form-control" id="city" name="village" placeholder="Enter your city/village here.." name="city" required>
                                </div>


                                <div class="col-md-4">
                                    <label for="email" class="form-label">Email:</label>
                                    <input type="email" class="form-control" id="email" placeholder="Enter your email name here.." name="email" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="photo" class="mb-2 fw-bold"> Photo</label>
                                    <input type="file" name="image" class="form-control" placeholder="Upload the photo here" required>
                                </div>

                                <div class="col-md-4">
                                    <label for="registrationdate" class="form-label">Registration Date:</label>
                                    <input type="date" class="form-control" id="nepali-datepicker-registrationn" name="dateofregister" placeholder="Enter today's date here.." name="registrationdate" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="registrationdate" class="form-label">username:</label>
                                    <input type="text" class="form-control" id="nepali-datepicker-registrationn" name="username" placeholder="Enter today's date here.." name="registrationdate" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="registrationdate" class="form-label">Password:</label>
                                    <input type="password" class="form-control" id="nepali-datepicker-registrationn" name="Password" placeholder="Enter today's date here.." name="registrationdate" required>
                                </div>

                                <div class="col-12 d-flex justify-content-end">

                                    <button type="submit" name="submit" class="btn btn-primary">Save Details</button>

                                    <button type="reset" class="btn btn-secondary bg-success ms-2">Reset</button>

                                </div>
                            </form>
                        </div>
                    </div>

                </div>


            </div>
        </div>



        <!-- displayingbox -->
        <div class="modal fade mt-5" id="editadmins" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addStudentsLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="addStudentsLabel">Add Students Here</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form class="row g-3" method="POST" enctype="multipart/form-data" action="addadmin.php">

                        <div class="modal-body">
                            <div class="col-md-4">
                                <label for="name" class="form-label">Admin's name:</label>
                                <input type="text" class="form-control" id="stdname" placeholder="Enter your name here.." name="name" required>
                            </div>

                            <div class="col-md-4">
                                <label for="dateofbirth" class="form-label">Date Of Birth:</label>
                                <input type="text" class="form-control" id="nepali-datepicker-dobb" placeholder="yyyy-mm-dd" name="DOB" required>

                            </div>
                            <div class="col-md-4">
                                <label for="gender" class="form-label">Gender:</label>
                                <select id="gender" class="form-select" required name="gender">
                                    <option selected>Male</option>
                                    <option>Female</option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label for="address" class="form-label">Address:</label>
                                <input type="text" class="form-control" id="address" placeholder="Enter your address here.." name="address" required>
                            </div>
                            <div class="col-md-4">
                                <label for="contact" class="form-label">Contact no:</label>
                                <input type="number" class="form-control" id="number" placeholder="Enter the number here.." name="contact" required>
                            </div>
                            <div class="col-md-4">
                                <label for="province" class="form-label">Province:</label>
                                <select id="province" class="form-select" name="province">
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
                                <input type="text" class="form-control" id="city" name="village" placeholder="Enter your city/village here.." name="city" required>
                            </div>


                            <div class="col-md-4">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter your email name here.." name="email" required>
                            </div>
                            <div class="col-md-4">
                                <label for="photo" class="mb-2 fw-bold"> Photo</label>
                                <input type="file" name="image" class="form-control" placeholder="Upload the photo here" required>
                            </div>

                            <div class="col-md-4">
                                <label for="registrationdate" class="form-label">Registration Date:</label>
                                <input type="text" class="form-control" id="nepali-datepicker-registrationn" name="dateofregister" placeholder="Enter today's date here.." name="registrationdate" required>
                            </div>
                            <div class="col-md-4">
                                <label for="registrationdate" class="form-label">username:</label>
                                <input type="text" class="form-control" id="nepali-datepicker-registrationn" name="username" placeholder="Enter today's date here.." name="registrationdate" required>
                            </div>
                            <div class="col-md-4">
                                <label for="registrationdate" class="form-label">Password:</label>
                                <input type="password" class="form-control" id="nepali-datepicker-registrationn" name="Password" placeholder="Enter today's date here.." name="registrationdate" required>
                            </div>

                            <div class="col-12 d-flex justify-content-end">

                                <button type="submit" name="submit" class="btn btn-primary">Save Details</button>

                                <button type="reset" class="btn btn-secondary bg-success ms-2">Reset</button>

                            </div>
                        </div>
                    </form>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" name="submit" class="btn btn-primary">Save Data</button>
                </div>

            </div>
        </div>
        </div>
        <!-- displayingbox -->

    </main>
</body>
<!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://nepalidatepicker.sajanmaharjan.com.np/nepali.datepicker/js/nepali.datepicker.v4.0.1.min.js" type="text/javascript"></script> -->
<script type="text/javascript">
    $(document).ready(function() {
        // For Date Of Birth
        var dobInput = $('#nepali-datepicker-dobb');
        dobInput.nepaliDatePicker();

        // For Registration Date
        var registrationInput = $('#nepali-datepicker-registrationn');
        registrationInput.nepaliDatePicker();
    });
</script>
<!-- <script src="../js/jquery.dataTables.min.js"></script> -->
<script src="../js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $(".data-table").each(function(_, table) {
            $(table).DataTable();
        });
    });
</script>

</html>