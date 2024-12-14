<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$servername = "localhost";
$username = "root";
$password = "";
$database = "sensor_db";
// Create connection
$koneksi = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$koneksi) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";
//mysqli_close($conn);
?>
