<?php 
$servername = "localhost";
$username = "root";
$password = "";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password);
// set tiếng việt
mysqli_set_charset($conn,'utf8');
// Kiểm tra kết nối
if ($conn->connect_error) {
  die("Kết nối thất bại: " . $conn->connect_error);
}

// Xóa csdl
$sql = "DROP DATABASE IF EXISTS Api_coban";
$conn->query($sql) === TRUE;

 ?>