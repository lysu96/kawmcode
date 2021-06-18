<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Api_coban";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT id, img, username, password, email FROM user WHERE 1";
$result = $conn->query($sql);
$json = [];
$i = 1;
if ($result->num_rows > 0) {
// output data of each row
	while($row = $result->fetch_assoc()) {
		$json[$i] = [
			'id' => $row["id"],
			'img' => $row["img"],
			'username' => $row["username"],
			'email' => $row["email"],
			'password' => $row["password"]
		];
		$i = $i + 1;
	}
} else {
	echo "0 results";
}
$conn->close();
$data = ['data' => $json];
header('Content-Type: application/json');
echo json_encode($data);
?>