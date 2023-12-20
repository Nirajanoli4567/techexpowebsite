<?php
$host = "localhost";
$username = "root";
$password = "";
$db = "sensor_data";

$conn = mysqli_connect($host, $username, $password, $db);

if (isset($_POST['click_view_btn'])) {
    $id = $_POST['user_id'];
    $fetchdata = "SELECT * FROM addstaff WHERE id='$id'";
    $fetchqueryrun = mysqli_query($conn, $fetchdata);

    if (mysqli_num_rows($fetchqueryrun) > 0) {
        foreach ($fetchqueryrun as $row) {
?> <div class="table-responsive">
                <table class="table  table-bordered table-sm d-sm-table table-info">
                    <tr class="border-collapse">
                        <td style="width: 20px;" rowspan="11" colspan="3" class="bg-white"><img src="../uploads/<?php echo $row['image']; ?>" alt="adminlist" height="150px" width="150px" class="rounded-circle" style="border: 2px solid #000; padding: 5px; margin-top:65px;margin-left:18px;"></td>
                    </tr>

                    <tr>
                        <td class="bg-warning">
                            <span>Id:</span><?php echo $row['id'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>Name:</span>
                            <?php echo $row['name'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>Date Of Birth:</span>
                            <?php echo $row['DOB'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>Gender:</span>
                            <?php echo $row['gender'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td> <span>Address:</span><?php echo $row['address'] ?></td>
                    </tr>
                    <tr>
                        <td><span>Number:</span><?php echo $row['number'] ?></td>
                    </tr>
                    <tr>
                        <td><span>Village:</span><?php echo $row['village'] ?></td>
                    </tr>
                    <tr>
                        <td><span>Email:</span><?php echo $row['email'] ?></td>
                    </tr>
                    <tr>
                        <td><span>Province:</span><?php echo $row['province'] ?></td>
                    </tr>
                    <tr>
                        <td><span>Date of Registration:</span><?php echo $row['registrationdate'] ?></td>
                    </tr>



                    </tr>
                </table>
            </div>
        <?php


        }
    }

    // edit data 

}
if (isset($_POST['click_vieww_btn'])) {
    $id = $_POST['user_id'];
    $fetchdata = "SELECT * FROM addadminn WHERE id='$id'";
    $fetchqueryrun = mysqli_query($conn, $fetchdata);

    if (mysqli_num_rows($fetchqueryrun) > 0) {
        foreach ($fetchqueryrun as $row) {
        ?> <div class="table-responsive">
                <table class="table  table-bordered table-sm d-sm-table table-info">
                    <tr class="border-collapse">
                        <td style="width: 20px;" rowspan="11" colspan="3" class="bg-white"><img src="../uploads/<?php echo $row['image']; ?>" alt="adminlist" height="150px" width="150px" class="rounded-circle" style="border: 2px solid #000; padding: 5px; margin-top:65px;margin-left:18px;"></td>
                    </tr>

                    <tr>
                        <td class="bg-warning">
                            <span>Id:</span><?php echo $row['id'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>Name:</span>
                            <?php echo $row['name'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>Date Of Birth:</span>
                            <?php echo $row['DOB'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>Gender:</span>
                            <?php echo $row['gender'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td> <span>Address:</span><?php echo $row['address'] ?></td>
                    </tr>
                    <tr>
                        <td><span>Number:</span><?php echo $row['number'] ?></td>
                    </tr>
                    <tr>
                        <td><span>Village:</span><?php echo $row['village'] ?></td>
                    </tr>
                    <tr>
                        <td><span>Email:</span><?php echo $row['email'] ?></td>
                    </tr>
                    <tr>
                        <td><span>Province:</span><?php echo $row['province'] ?></td>
                    </tr>
                    <tr>
                        <td><span>Date of Registration:</span><?php echo $row['registrationdate'] ?></td>
                    </tr>



                    </tr>
                </table>
            </div>
        <?php


        }
    }

    // edit data 

}

if (isset($_POST['click_edit_btn'])) {
    $id = $_POST['user_id'];

    $editdata = "SELECT * FROM addadminn WHERE id='$id'";
    $editqueryrun = mysqli_query($conn, $editdata);
    $result_array = [];
    if (mysqli_num_rows($editqueryrun) > 0) {
        foreach ($editqueryrun as $row) {
            array_push($result_array, $row);
        }
        header('Content-type: application/json');
        echo json_encode($result_array);
    }
}
if (isset($_POST['click_editt_btn'])) {
    $id = $_POST['user_id'];

    $editdata = "SELECT * FROM addstaff WHERE id='$id'";
    $editqueryrun = mysqli_query($conn, $editdata);
    $result_array = [];
    if (mysqli_num_rows($editqueryrun) > 0) {
        foreach ($editqueryrun as $row) {
            array_push($result_array, $row);
        }
        header('Content-type: application/json');
        echo json_encode($result_array);
    }
}

// Set @num := 0;
// Update addadmin SET id = @num := (@num+1);
// ALTER TABLE addstudent AUTO_INCREMENT =1;

// std view btn 
if (isset($_POST['click_viewstd_btn'])) {
    $std_id = $_POST['std_id'];
    $fetchdata = "SELECT * FROM mission WHERE id='$std_id'";
    $fetchqueryrun = mysqli_query($conn, $fetchdata);

    if (mysqli_num_rows($fetchqueryrun) > 0) {
        foreach ($fetchqueryrun as $row) {
        ?> <div class="table-responsive">
                <table class="table  table-bordered table-sm d-sm-table table-info">
                    <tr class="border-collapse">
                        <td style="width: 20px;" rowspan="6" colspan="3" class="bg-white"><img src="../uploads/<?php echo $row['photo']; ?>" alt="adminlist" height="150px" width="150px" class="rounded-circle" style="border: 2px solid #000; padding: 5px; margin-bottom:35px;margin-left:18px;margin-top:35px;"></td>
                    </tr>

                    <tr>
                        <td class="bg-warning">
                            <span>Id:</span><?php echo $row['id'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>Mission Title:</span>
                            <?php echo $row['title'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>Mission Details:</span>
                            <?php echo $row['details'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>Arival Time:</span>
                            <?php echo $row['time'] ?>
                        </td>
                    </tr>





                </table>
            </div>
<?php


        }
    }
}



// edit data std
if (isset($_POST['click_edit_btnn'])) {
    $id = $_POST['user_idd'];

    $editdataa = "SELECT * FROM mission WHERE id='$id'";
    $editqueryrunn = mysqli_query($conn, $editdataa);
    $result_array = [];
    if (mysqli_num_rows($editqueryrunn) > 0) {
        foreach ($editqueryrunn as $row) {
            array_push($result_array, $row);
        }
        header('Content-type: application/json');
        echo json_encode($result_array);
    }
}


//database update




if (isset($_POST['click_edit_btnn'])) {
    $id = $_POST['user_id'];

    $editdata = "SELECT * FROM addadmin WHERE id='$id'";
    $editqueryrun = mysqli_query($conn, $editdata);
    $result_array = [];
    if (mysqli_num_rows($editqueryrun) > 0) {
        foreach ($editqueryrun as $row) {
            array_push($result_array, $row);
        }
        header('Content-type: application/json');
        echo json_encode($result_array);
    }
}
