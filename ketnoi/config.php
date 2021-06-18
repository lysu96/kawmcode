<?php 
// $conn = mysqli_connect("localhost", "root", "", "data_usd") or die("Database Error");
// mysqli_set_charset($conn,'utf8');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "data_usd";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_set_charset($conn,'utf8');

 ?>