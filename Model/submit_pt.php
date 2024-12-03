<?php
include("kcon.php");
date_default_timezone_set('Asia/Bangkok');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $HN = $_POST["HN"];
    $d_code = $_POST["Doctorcode"];
    $Pt_color = $_POST["ColorSelect"];

    $stmt = $conn->prepare("UPDATE screen_sk SET pt_color = ?, user_edit = ? 
            WHERE hn = ? AND DATE(date) = CURDATE() ORDER BY date DESC LIMIT 1 ");
    
    $stmt->bind_param("sss", $Pt_color, $d_code, $HN);
    
    $execute_result = $stmt->execute();
    if ($execute_result === false) {
        die('Execute failed: ' . htmlspecialchars($stmt->error));
    }
    
    $stmt->close();
}
$conn->close();
