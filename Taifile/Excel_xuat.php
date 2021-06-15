<?php 
require_once '../ketnoi/config.php';

// Bước 1: Import thư viện phpexcel
require_once 'PHPExcel/Classes/PHPExcel.php';
// Bước 2: 
// Lấy dữ liệu từ database
$data = array(
    array(
        'TheHalfheart@gmail.com', 'Nguyễn Văn Cường'
    ),
    array(
        'freetuts.net@gmail.com', 'Nguyễn Văn Cường'
    ),
    array(
        'mrcuong.winter@gmail.com', 'Nguyễn Văn Cường'
    ),
    array(
        'ok_drt@yahoo.com', 'Nguyễn Văn Cường'
    )
);
 
 
// Bước 3: Khởi tạo đối tượng mới và xử lý
$PHPExcel = new PHPExcel();
 
// Bước 4: Chọn sheet - sheet bắt đầu từ 0
$PHPExcel->setActiveSheetIndex(0);
 
// Bước 5: Tạo tiêu đề cho sheet hiện tại
$PHPExcel->getActiveSheet()->setTitle('Email List');
 
// Bước 6: Tạo tiêu đề cho từng cell excel, 
// Các cell của từng row bắt đầu từ A1 B1 C1 ...
$PHPExcel->getActiveSheet()->setCellValue('A1', 'STT');
$PHPExcel->getActiveSheet()->setCellValue('B1', 'Email');
$PHPExcel->getActiveSheet()->setCellValue('C1', 'Fullname');
 
// Bước 7: Lặp data và gán vào file
// Vì row đầu tiên là tiêu đề rồi nên những row tiếp theo bắt đầu từ 2
$rowNumber = 2;
foreach ($data as $index => $item) 
{
    // A1, A2, A3, ...
    $PHPExcel->getActiveSheet()->setCellValue('A' . $rowNumber, ($index + 1));
     
    // B1, B2, B3, ...
    $PHPExcel->getActiveSheet()->setCellValue('B' . $rowNumber, $item[0]);
 
    // C1, C2, C3, ...
    $PHPExcel->getActiveSheet()->setCellValue('C' . $rowNumber, $item[1]);
     
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
        <input type="submit" name="nhapExcel" value="Nhập file">
        <input type="submit" name="xuatExcel" value="Nhập Execel">
    </form>
 </body>
 </html>