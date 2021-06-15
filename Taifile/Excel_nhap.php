 <?php
require_once '../ketnoi/config.php';
require_once 'PHPExcel/Classes/PHPExcel.php';

if (isset($_POST['nhapExcel'])) {
	$file = $_FILES['file']['tmp_name'];
	
	// tạo đối tượng
	$dtExcel = PHPExcel_IOFactory::createReaderForFile($file);

	// load sheet
	$dtExcel->setLoadSheetsOnly('chatbot');
	$fileExel = $dtExcel->load($file);
	$sheetData = $fileExel->getActiveSheet()->toArray('null', true, true, true);

	echo "<pre>";
	print_r($sheetData);

	// lấy sheet cuối cùng
	$rowHigh = $fileExel->setActiveSheetIndex()->getHighestRow();
	echo($rowHigh);

	// for ($i=2; $i <= $sl; $i++) { 

	// 	$A = $sheetData[$i]['A'];
	// 	$B = $sheetData[$i]['B'];
	// 	$C = $sheetData[$i]['C'];

	// 	echo $A."<br>";
	// 	echo $B."<br>";
	// 	echo $C."<br>";

	// 	// $sql = "INSERT INTO chatbot (queries, replies) VALUES ('$B', '$C')";
	// 	// if ($conn->query($sql) === TRUE) {
	// 	// 	$tc = "<span style=\"color: green;\">Thêm thành công DL</span>";
	// 	// } else{
	// 	// 	$tb = "<span style=\"color: red;\">Thêm thất bại DL</span>";
	// 	// }
	// }

	// if (isset($tc)) {
	// 	echo($tc);
	// }
	// if (isset($tb)) {
	// 	echo($tb);
	// }
	
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