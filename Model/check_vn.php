<?php
include("kcon.php");

// ตรวจสอบว่ามีค่า 'value' ที่ถูกส่งมาจาก JavaScript หรือไม่
if (isset($_POST['HN'])) {
    $HN = $_POST['HN'];

    $Datenow = date('Y-m-d');

    // เขียนโค้ด SQL สำหรับดึงข้อมูลที่คุณต้องการ
    $sql5 = "SELECT vn,hn,vstdate,vsttime FROM ovst WHERE hn = '" . $HN . "' and vstdate = '" . $Datenow . "' ORDER BY vstdate DESC limit 1";

    $result5 = $conn->query($sql5);

    if ($result5 != '') {
        $data4 = [];
        while ($row5 = $result5->fetch_assoc()) {
            $data4[] = $row5;
        }
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data4);
    } else {
        echo json_encode(["hn" => "ไม่พบข้อมูล"]);
    }
}
