<?php
$host = "localhost";
$username = "root"; //"id21301899_littledata";
$password = ""; //"Kaley123@";
$db = "sensor_data"; //"id21301899_littledata";

$conn = mysqli_connect($host, $username, $password, $db);

if (!$conn) {
    die("connection error");
}
