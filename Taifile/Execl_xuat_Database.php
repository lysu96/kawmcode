<?php 
// Bước 1: Import thư viện phpexcel
require_once 'PHPExcel/Classes/PHPExcel.php';

function xuatFileExecl()
{
require_once '../ketnoi/config.php';
// Bước 2: 
$sql = "SELECT * FROM user";

// Lấy dữ liệu từ database
$data = $conn->query($sql);

$arr = array();
if (mysqli_num_rows($data)>0) {
    while ($arrs = mysqli_fetch_array($data)) {
        $arr[] = $arrs;
    }
}
echo "<pre>";
print_r($arr);


// Bước 3: Khởi tạo đối tượng mới và xử lý
$PHPExcel = new PHPExcel();
 
// Bước 4: Chọn sheet - sheet bắt đầu từ 0
$PHPExcel->setActiveSheetIndex(0);
 
// Bước 5: Tạo tiêu đề cho sheet hiện tại
$PHPExcel->getActiveSheet()->setTitle('data');
 
// Bước 6: Tạo tiêu đề cho từng cell excel, 
// Các cell của từng row bắt đầu từ A1 B1 C1 ...
$PHPExcel->getActiveSheet()->setCellValue('A1', 'stt');
$PHPExcel->getActiveSheet()->setCellValue('B1', 'img');
$PHPExcel->getActiveSheet()->setCellValue('C1', 'username');
$PHPExcel->getActiveSheet()->setCellValue('B1', 'passwork');
$PHPExcel->getActiveSheet()->setCellValue('C1', 'email');
 
// Bước 7: Lặp data và gán vào file
// Vì row đầu tiên là tiêu đề rồi nên những row tiếp theo bắt đầu từ 2
$rowNumber = 2;
foreach ($arr as $index => $item) 
{
    // A1, A2, A3, ...
    $PHPExcel->getActiveSheet()->setCellValue('A' . $rowNumber, $item['id']);
     
    // B1, B2, B3, ...
    $PHPExcel->getActiveSheet()->setCellValue('B' . $rowNumber, $item['img']);
 
    // C1, C2, C3, ...
    $PHPExcel->getActiveSheet()->setCellValue('C' . $rowNumber, $item['username']);

    // C1, C2, C3, ...
    $PHPExcel->getActiveSheet()->setCellValue('D' . $rowNumber, $item['passwork']);

    // C1, C2, C3, ...
    $PHPExcel->getActiveSheet()->setCellValue('E' . $rowNumber, $item['email']);
     
    // Tăng row lên để khỏi bị lưu đè
    $rowNumber++;
}
 
// Bước 8: Khởi tạo đối tượng Writer
$objWriter = PHPExcel_IOFactory::createWriter($PHPExcel, 'Excel5');
 
// Bước 9: Trả file về cho client download
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="data.xls"');
header('Cache-Control: max-age=0');
if (isset($objWriter)) {
    $objWriter->save('php://output');
}

}


if (isset($_POST['xuatExecl'])) {
    xuatFileExecl();
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
        <input type="submit" name="nhapExcel" value="xuất 1 sheet file">
        <input type="submit" name="xuatExecl" value="xuất nhiều Execel">
    </form>
 </body>
 </html>