 <?php
require_once '../ketnoi/config.php';
require_once 'PHPExcel/Classes/PHPExcel.php';

if (isset($_POST['nhapExcel'])) {
	$file = $_FILES['file']['tmp_name'];
	
	// tạo đối tượng
	$dtExcel = PHPExcel_IOFactory::createReaderForFile($file);

	// load sheet
	$dtExcel->setLoadSheetsOnly('USD');
	$fileExel = $dtExcel->load($file);
	$sheetData = $fileExel->getActiveSheet()->toArray('null', true, true, true);

	echo "<pre>";
	print_r($sheetData);

	// load sheet
	// $dtExcel->setLoadSheetsOnly('USER');
	// $fileExel = $dtExcel->load($file);
	// $sheetData = $fileExel->getActiveSheet()->toArray('null', true, true, true);

	// echo "<pre>";
	// print_r($sheetData);

	// lấy sheet cuối cùng
	$rowHigh = $fileExel->setActiveSheetIndex()->getHighestRow();
	//echo($rowHigh);

	for ($i=6; $i <= $rowHigh; $i++) { 

		$A = $sheetData[$i]['A'];
		$B = $sheetData[$i]['B'];
		$C = $sheetData[$i]['C'];
		$D = $sheetData[$i]['D'];
		$E = $sheetData[$i]['E'];

		// echo $A."<br>";
		// echo $B."<br>";
		// echo $C."<br>";

		$sql = "INSERT INTO tbl_usd (Country, USD, Convertusd) VALUES ('$B', '$C', '$D');";
		if ($conn->query($sql) === TRUE) {
			$tc = "<span style=\"color: green;\">Thêm thành công DL</span>";
		} else{
			$tb = "<span style=\"color: red;\">Thêm thất bại DL</span>";
		}

		// $sql2 = "INSERT INTO user (img, username, password, email) VALUES ('$B', '$C', '$D','$E');";
		// if ($conn->query($sql2) === TRUE) {
		// 	$tc = "<span style=\"color: green;\">Thêm thành công DL</span>";
		// } else{
		// 	$tb = "<span style=\"color: red;\">Thêm thất bại DL</span>";
		// }
	}

	if (isset($tc)) {
		echo($tc);
	}
	if (isset($tb)) {
		echo($tb);
	}
	
}

  ?>

 <!DOCTYPE html>
 <html>
 <head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <title>Xuất Exect</title>
     <link rel="stylesheet" href="">
 </head>
 <body>

    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="file">
        <input type="submit" name="nhapExcel" value="Nhập Execel">
        <input type="submit" name="xuatExcel" value="xuất Execel">
    </form>
 </body>
 </html>