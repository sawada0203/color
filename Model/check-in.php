<?php
include("kcon.php");

if (isset($_POST['value3'])) {
  $HN = $_POST['value3'];

  $sql4 = "SELECT * FROM screen_sk
    WHERE hn = '" . $HN . "' AND DATE(date) = DATE(NOW()) ORDER BY s_id DESC LIMIT 0,1";

  $result4 = $conn->query($sql4);

  if ($result4 != '') {
    $dates3 = [];
    while ($row4 = $result4->fetch_assoc()) {
      $dates3[] = $row4;
    }
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($dates3);
  } else {
    echo json_encode(["hn" => "ไม่พบข้อมูล"]);
  }
}
// ปิดการเชื่อมต่อฐานข้อมูล
$conn->close();
