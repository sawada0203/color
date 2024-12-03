<?php
include("kcon.php");

if (isset($_POST['date']) && isset($_POST['value2'])) {
  $selectedDate = $_POST['date'];
  $HN = $_POST['value2'];

  $sql3 = "SELECT * FROM vn_color
    WHERE vstdate = '" . $selectedDate . "' and hn = '" . $HN . "' and icdname != 'Z480' 
    ORDER BY vstdate DESC ";

  $result3 = $conn->query($sql3);

  if ($result3 != '') {
    $dates2 = [];
    while ($row3 = $result3->fetch_assoc()) {
      $dates2[] = $row3;
    }
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($dates2);
  } else {
    echo json_encode(["hn" => "ไม่พบข้อมูล"]);
  }
}
// ปิดการเชื่อมต่อฐานข้อมูล
$conn->close();
