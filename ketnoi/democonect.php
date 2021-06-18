<?php 
$servername = '212.16.186.119';
$username = 'aszldrma_chatbot';
$password = 'WeHp[%hAshgO';
$dbname = 'aszldrma_chatbot';

// $servername = '212.16.186.119';
// $username = 'aszldrma_project';
// $password = 'Demo@project';
// $dbname = 'aszldrma_mahoa';

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_set_charset($conn,'utf8');
// Kiểm tra kết nối
if ($conn->connect_error) {
  die("Kết nối thất bại: " . $conn->connect_error);
} else{
	echo "Kết nối thành công";
}

 ?>
