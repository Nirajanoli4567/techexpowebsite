<?php
include('../login/connect.php');
$fetchdata = "SELECT * FROM  mission";
$fetchqueryrun = mysqli_query($conn, $fetchdata);
if (mysqli_num_rows($fetchqueryrun) > 0) {
    foreach ($fetchqueryrun as $row) {
    }
}
