<?php
include("kcon.php");

if (isset($_POST['value2'])) {
    $HN = $_POST['value2'];

    $sql2 = "SELECT * from vn_color
    WHERE hn = '" . $HN . "' and icdname != 'Z480'
    ORDER BY vstdate DESC";

    $result2 = $conn->query($sql2);

    if ($result2 != '') {
      $dates = [];
      while ($row2 = $result2->fetch_assoc()) {
          $dates[] = $row2;
      }
      header('Content-Type: application/json; charset=utf-8');
      echo json_encode($dates);
  } else {
      echo json_encode(["hn" => "ไม่พบข้อมูล"]);
  }
}
// ปิดการเชื่อมต่อฐานข้อมูล
$conn->close();

?>