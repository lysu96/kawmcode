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
// tạo bản
function Taoban()
{
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "Api_coban";

// Tạo kết nối
	$conn = new mysqli($servername, $username, $password, $dbname);
	mysqli_set_charset($conn,'utf8');
// Kiểm tra kết nối
	if ($conn->connect_error) {
		die("Kết nối thất bại: " . $conn->connect_error);
	}

// sql để tạo bảng user
	$sql1 = "CREATE TABLE user (
	id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	img VARCHAR(30) COLLATE utf8_unicode_ci NOT NULL,
	username VARCHAR(30) COLLATE utf8_unicode_ci NOT NULL,
	password text,
	email VARCHAR(50),
	CONSTRAINT username UNIQUE (username)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";

// sql để tạo bảng tbl_usd
	$sql2 = "CREATE TABLE tbl_usd (
  id int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  Country VARCHAR(30) COLLATE utf8_unicode_ci NOT NULL,
  USD float COLLATE utf8_unicode_ci NOT NULL,
  Convertusd float COLLATE utf8_unicode_ci NOT NULL,
  CONSTRAINT Country UNIQUE (Country)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";

// sql để tạo bảng namesheet
	$sql3 = "CREATE TABLE namesheet (
	id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(20) COLLATE utf8_unicode_ci NOT NULL,
	CONSTRAINT name UNIQUE (name)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";

if ($conn->query($sql1) === TRUE && $conn->query($sql2) === TRUE && $conn->query($sql3) === TRUE) {
	// thêm dữ liệu bảng user
	$sqlvl1 = "INSERT INTO user (img, username, password, email) VALUES 
				('a.jpg', 'user1', md5('12345'), 'user1@example.com'),
				('b.jpg', 'user2', md5('123'), 'user2@example.com');";


	// thêm dữ liệu bảng tbl_usd
	$sqlvl2 = "INSERT INTO tbl_usd (Country, USD, Convertusd) VALUES
				('Vietnam', 1, 23000);";

	$sqlv3 = "INSERT INTO namesheet (name) VALUES ('NhapDL'),('DL'),('Key');";

	if ($conn->query($sqlvl1) === TRUE && $conn->query($sqlvl2) === TRUE && $conn->query($sqlv3) === TRUE) {
		echo "Bản ghi mới đã được tạo thành công<br/>";
	} else {
		echo "<br/>Lỗi nhập dữ liệu: <br/" . $sqlvl1 ."<br/>" . $sqlvl2 . "<br>" . $conn->error;
	}
	
} else {
	echo "Lỗi tạo bảng: " . $conn->error;
}

}

// sao lưu
// $sql = "
// BACKUP DATABASE testDB
// TO DISK = '../Backup/Api_coban.sql'
// WITH DIFFERENTIAL;";
// $conn->query($sql) === TRUE;

// Xóa csdl
$sql = "DROP DATABASE IF EXISTS Api_coban";
$conn->query($sql) === TRUE;


// Tạo cơ sở dữ liệu
$sql = "CREATE DATABASE Api_coban";
if ($conn->query($sql) === TRUE) {
  echo "Cơ sở dữ liệu được tạo thành công<br/>";
  if (Taoban()) {
  	echo "<span style=\"color: green\">Cài đặt thất bại.!</span>";
  }else {
  	echo "<span style=\"color: green\">Cài đặt thành công.!</span>";
  }
} else {
  echo "Lỗi khi tạo cơ sở dữ liệu:" . $conn->error;
}

// st thời gian
$sql = "SET SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO'";
$conn->query($sql) === TRUE;

$sql = "SET AUTOCOMMIT = 0;";
$conn->query($sql) === TRUE;

$sql = "START TRANSACTION;";
$conn->query($sql) === TRUE;

$sql = "SET time_zone = '+00:00';";
$conn->query($sql) === TRUE;

$sql = "ALTER TABLE namesheet
  ADD PRIMARY KEY (id),
  ADD UNIQUE KEY name (name);";
$conn->query($sql) === TRUE;

$sql = "ALTER TABLE tbl_usd
  ADD PRIMARY KEY (id),
  ADD UNIQUE KEY Country (Country);";
$conn->query($sql) === TRUE;

$sql = "ALTER TABLE user
  ADD PRIMARY KEY (id),
  ADD UNIQUE KEY username (username);";
$conn->query($sql) === TRUE;

// Khóa Duy nhất

// $sql = "ALTER TABLE namesheet
// ADD CONSTRAINT name UNIQUE (name);";
// $conn->query($sql) === TRUE;

// $sql = "ALTER TABLE tbl_usd
// ADD CONSTRAINT Country UNIQUE (Country);";
// $conn->query($sql) === TRUE;

// $sql = "ALTER TABLE user
// ADD CONSTRAINT username UNIQUE (username);";

$conn->close();
?>