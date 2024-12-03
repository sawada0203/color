<?php
include("kcon.php");
date_default_timezone_set('Asia/Bangkok');

// ตรวจสอบว่ามีข้อมูลถูกส่งมาผ่าน POST request หรือไม่
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // รับข้อมูลจากแบบฟอร์ม

    //ข้อมูล
    $VN = $_POST["VN"];
    $HN = $_POST["HN"];

    $timestamp = $_POST['timestamp'];
    $date = date('Y-m-d H:i:s', $timestamp);

    $lastvisit = $_POST['lastvisit'];

    $Note = $_POST['Note'];

    $colorAI = $_POST["colorAI"];
    $colorUser = $_POST["selectedColor"];

    $user_name = $_POST["user_name"];
    $d_code = $_POST["doctorcode"];
    $hos_guid = $_POST["hos_guid"];

    if ($colorUser == 'เขียว') {
        $total = 2;
    } else if ($colorUser == 'เหลือง') {
        $total = 3;
    } else if ($colorUser == 'แดง') {
        $total = 5;
    } else {
    }

    $totalall = $_POST['totalsoreAll'];

    ////DM
    $icd10_DM = array();
    if (isset($_POST['RadioDM'])) {
        $RadioDM = $_POST['RadioDM'];
    } else {
    }
    $noteMildDM = $_POST['noteMildDM'];
    $noteModerateDM = $_POST['noteModerateDM'];
    $noteSevereDM = $_POST['noteSevereDM'];
    $noteDM = $_POST['noteDM'];
    $DM = 1;
    // เช็คและเพิ่มข้อมูลใน $icd10_DM ถ้ามีค่าไม่ว่าง
    if (!empty($noteMildDM)) {
        $icd10_DM[] = $noteMildDM;
    }

    if (!empty($noteModerateDM)) {
        $icd10_DM[] = $noteModerateDM;
    }

    if (!empty($noteSevereDM)) {
        $icd10_DM[] = $noteSevereDM;
    } else {
    }
    $cc_icd10_DM = implode(', ', $icd10_DM);

    ////HT
    $icd10_HT = array();
    // ตรวจสอบว่า "RadioHT" มีอยู่ใน $_POST
    if (isset($_POST['RadioHT'])) {
        $RadioHT = $_POST['RadioHT'];
    } else {
    }
    $noteMildHT = $_POST['noteMildHT'];
    $noteModerateHT = $_POST['noteModerateHT'];
    $noteSevereHT = $_POST['noteSevereHT'];
    $noteHT = $_POST['noteHT'];
    $HT = 2;
    // เช็คและเพิ่มข้อมูลใน $icd10_HT ถ้ามีค่าไม่ว่าง
    if (!empty($noteMildHT)) {
        $icd10_HT[] = $noteMildHT;
    }

    if (!empty($noteModerateHT)) {
        $icd10_HT[] = $noteModerateHT;
    }

    if (!empty($noteSevereHT)) {
        $icd10_HT[] = $noteSevereHT;
    } else {
    }
    $cc_icd10_HT = implode(', ', $icd10_HT);

    ////Asthma
    $icd10_Asthma = array();
    if (isset($_POST['RadioAsthma'])) {
        $RadioAsthma = $_POST['RadioAsthma'];
    } else {
    }
    $noteMildasthma = $_POST['noteMildasthma'];
    $noteModerateasthma = $_POST['noteModerateasthma'];
    $noteSevereasthma = $_POST['noteSevereasthma'];
    $noteasthma = $_POST['noteasthma'];
    $Asthma = 3;
    // เช็คและเพิ่มข้อมูลใน $icd10_Asthma ถ้ามีค่าไม่ว่าง
    if (!empty($noteMildasthma)) {
        $icd10_Asthma[] = $noteMildasthma;
    }

    if (!empty($noteModerateasthma)) {
        $icd10_Asthma[] = $noteModerateasthma;
    }

    if (!empty($noteSevereasthma)) {
        $icd10_Asthma[] = $noteSevereasthma;
    } else {
    }
    $cc_icd10_Asthma = implode(', ', $icd10_Asthma);

    ////COPD
    $icd10_COPD = array();
    if (isset($_POST['RadioCOPD'])) {
        $RadioCOPD = $_POST['RadioCOPD'];
    } else {
    }
    $noteMildCOPD = $_POST['noteMildCOPD'];
    $noteModerateCOPD = $_POST['noteModerateCOPD'];
    $noteSevereCOPD = $_POST['noteSevereCOPD'];
    $noteCOPD = $_POST['noteCOPD'];
    $COPD = 4;
    // เช็คและเพิ่มข้อมูลใน $icd10_COPD ถ้ามีค่าไม่ว่าง
    if (!empty($noteMildCOPD)) {
        $icd10_COPD[] = $noteMildCOPD;
    }

    if (!empty($noteModerateCOPD)) {
        $icd10_COPD[] = $noteModerateCOPD;
    }

    if (!empty($noteSevereCOPD)) {
        $icd10_COPD[] = $noteSevereCOPD;
    } else {
    }
    $cc_icd10_COPD = implode(', ', $icd10_COPD);

    ////TB
    $icd10_TB = array();
    if (isset($_POST['RadioTB'])) {
        $RadioTB = $_POST['RadioTB'];
    } else {
    }
    $noteMildTB = $_POST['noteMildTB'];
    $noteModerateTB = $_POST['noteModerateTB'];
    $noteSevereTB = $_POST['noteSevereTB'];
    $noteTB = $_POST['noteTB'];
    $TB = 5;
    // เช็คและเพิ่มข้อมูลใน $icd10_TB ถ้ามีค่าไม่ว่าง
    if (!empty($noteMildTB)) {
        $icd10_TB[] = $noteMildTB;
    }

    if (!empty($noteModerateTB)) {
        $icd10_TB[] = $noteModerateTB;
    }

    if (!empty($noteSevereTB)) {
        $icd10_TB[] = $noteSevereTB;
    } else {
    }
    $cc_icd10_TB = implode(', ', $icd10_TB);

    ////Stroke
    $icd10_Stroke = array();
    if (isset($_POST['RadioStroke'])) {
        $RadioStroke = $_POST['RadioStroke'];
    } else {
    }
    $noteMildStroke = $_POST['noteMildStroke'];
    $noteModerateStroke = $_POST['noteModerateStroke'];
    $noteSevereStroke = $_POST['noteSevereStroke'];
    $noteStroke = $_POST['noteStroke'];
    $Stroke = 6;
    // เช็คและเพิ่มข้อมูลใน $icd10_Stroke ถ้ามีค่าไม่ว่าง
    if (!empty($noteMildStroke)) {
        $icd10_Stroke[] = $noteMildStroke;
    }

    if (!empty($noteModerateStroke)) {
        $icd10_Stroke[] = $noteModerateStroke;
    }

    if (!empty($noteSevereStroke)) {
        $icd10_Stroke[] = $noteSevereStroke;
    } else {
    }
    $cc_icd10_Stroke = implode(', ', $icd10_Stroke);

    ////CKD
    $icd10_CKD = array();
    if (isset($_POST['RadioCKD'])) {
        $RadioCKD = $_POST['RadioCKD'];
    } else {
    }
    $noteMildCKD = $_POST['noteMildCKD'];
    $noteModerateCKD = $_POST['noteModerateCKD'];
    $noteSevereCKD = $_POST['noteSevereCKD'];
    $noteCKD = $_POST['noteCKD'];
    $CKD = 7;
    // เช็คและเพิ่มข้อมูลใน $icd10_CKD ถ้ามีค่าไม่ว่าง
    if (!empty($noteMildCKD)) {
        $icd10_CKD[] = $noteMildCKD;
    }

    if (!empty($noteModerateCKD)) {
        $icd10_CKD[] = $noteModerateCKD;
    }

    if (!empty($noteSevereCKD)) {
        $icd10_CKD[] = $noteSevereCKD;
    } else {
    }
    $cc_icd10_CKD = implode(', ', $icd10_CKD);

    ////AF
    $icd10_AF = array();
    if (isset($_POST['RadioAF'])) {
        $RadioAF = $_POST['RadioAF'];
    } else {
    }
    $noteMildAF = $_POST['noteMildAF'];
    $noteModerateAF = $_POST['noteModerateAF'];
    $noteSevereAF = $_POST['noteSevereAF'];
    $noteAF = $_POST['noteAF'];
    $AF = 8;
    // เช็คและเพิ่มข้อมูลใน $icd10_AF ถ้ามีค่าไม่ว่าง
    if (!empty($noteMildAF)) {
        $icd10_AF[] = $noteMildAF;
    }

    if (!empty($noteModerateAF)) {
        $icd10_AF[] = $noteModerateAF;
    }

    if (!empty($noteSevereAF)) {
        $icd10_AF[] = $noteSevereAF;
    } else {
    }
    $cc_icd10_AF = implode(', ', $icd10_AF);

    ////HIV
    $icd10_HIV = array();
    if (isset($_POST['RadioHIV'])) {
        $RadioHIV = $_POST['RadioHIV'];
    } else {
    }
    $noteMildHIV = $_POST['noteMildHIV'];
    $noteModerateHIV = $_POST['noteModerateHIV'];
    $noteSevereHIV = $_POST['noteSevereHIV'];
    $noteHIV = $_POST['noteHIV'];
    $HIV = 9;
    // เช็คและเพิ่มข้อมูลใน $icd10_HIV ถ้ามีค่าไม่ว่าง
    if (!empty($noteMildHIV)) {
        $icd10_HIV[] = $noteMildHIV;
    }

    if (!empty($noteModerateHIV)) {
        $icd10_HIV[] = $noteModerateHIV;
    }

    if (!empty($noteSevereHIV)) {
        $icd10_HIV[] = $noteSevereHIV;
    } else {
    }
    $cc_icd10_HIV = implode(', ', $icd10_HIV);

    ////Ep
    $icd10_Ep = array();
    if (isset($_POST['RadioEp'])) {
        $RadioEp = $_POST['RadioEp'];
    } else {
    }
    $noteMildEp = $_POST['noteMildEp'];
    $noteModerateEp = $_POST['noteModerateEp'];
    $noteSevereEp = $_POST['noteSevereEp'];
    $noteEp = $_POST['noteEp'];
    $Ep = 10;
    // เช็คและเพิ่มข้อมูลใน $icd10_Ep ถ้ามีค่าไม่ว่าง
    if (!empty($noteMildEp)) {
        $icd10_Ep[] = $noteMildEp;
    }

    if (!empty($noteModerateEp)) {
        $icd10_Ep[] = $noteModerateEp;
    }

    if (!empty($noteSevereEp)) {
        $icd10_Ep[] = $noteSevereEp;
    } else {
    }
    $cc_icd10_Ep = implode(', ', $icd10_Ep);

    ////PD
    $icd10_PD = array();
    if (isset($_POST['RadioPD'])) {
        $RadioPD = $_POST['RadioPD'];
    } else {
    }
    $noteMildPD = $_POST['noteMildPD'];
    $noteModeratePD = $_POST['noteModeratePD'];
    $noteSeverePD = $_POST['noteSeverePD'];
    $notePD = $_POST['notePD'];
    $PD = 11;
    // เช็คและเพิ่มข้อมูลใน $icd10_PD ถ้ามีค่าไม่ว่าง
    if (!empty($noteMildPD)) {
        $icd10_PD[] = $noteMildPD;
    }

    if (!empty($noteModeratePD)) {
        $icd10_PD[] = $noteModeratePD;
    }

    if (!empty($noteSeverePD)) {
        $icd10_PD[] = $noteSeverePD;
    } else {
    }
    $cc_icd10_PD = implode(', ', $icd10_PD);

    /*Gout
    $icd10_Gout = array();
    if (isset($_POST['RadioGout'])) {
        $RadioGout = $_POST['RadioGout'];
    } else {
    }
    $noteMildGout = $_POST['noteMildGout'];
    $noteModerateGout = $_POST['noteModerateGout'];
    $noteSevereGout = $_POST['noteSevereGout'];
    $noteGout = $_POST['noteGout'];
    $Gout = 12;
    // เช็คและเพิ่มข้อมูลใน $icd10_Gout ถ้ามีค่าไม่ว่าง
    if (!empty($noteMildGout)) {
        $icd10_Gout[] = $noteMildGout;
    }

    if (!empty($noteModerateGout)) {
        $icd10_Gout[] = $noteModerateGout;
    }

    if (!empty($noteSevereGout)) {
        $icd10_Gout[] = $noteSevereGout;
    } else {
    }
    $cc_icd10_Gout = implode(', ', $icd10_Gout);*/

    ////HA
    $icd10_HA = array();
    if (isset($_POST['RadioHA'])) {
        $RadioHA = $_POST['RadioHA'];
    } else {
    }
    $noteMildHA = $_POST['noteMildHA'];
    $noteModerateHA = $_POST['noteModerateHA'];
    $noteSevereHA = $_POST['noteSevereHA'];
    $noteHA = $_POST['noteHA'];
    $HA = 13;
    // เช็คและเพิ่มข้อมูลใน $icd10_HA ถ้ามีค่าไม่ว่าง
    if (!empty($noteMildHA)) {
        $icd10_HA[] = $noteMildHA;
    }

    if (!empty($noteModerateHA)) {
        $icd10_HA[] = $noteModerateHA;
    }

    if (!empty($noteSevereHA)) {
        $icd10_HA[] = $noteSevereHA;
    } else {
    }
    $cc_icd10_HA = implode(', ', $icd10_HA);

    ////CA
    $icd10_CA = array();
    if (isset($_POST['RadioCA'])) {
        $RadioCA = $_POST['RadioCA'];
    } else {
    }
    $noteMildCA = $_POST['noteMildCA'];
    $noteModerateCA = $_POST['noteModerateCA'];
    $noteSevereCA = $_POST['noteSevereCA'];
    $noteCA = $_POST['noteCA'];
    $CA = 14;
    // เช็คและเพิ่มข้อมูลใน $icd10_CA ถ้ามีค่าไม่ว่าง
    if (!empty($noteMildCA)) {
        $icd10_CA[] = $noteMildCA;
    }

    if (!empty($noteModerateCA)) {
        $icd10_CA[] = $noteModerateCA;
    }

    if (!empty($noteSevereCA)) {
        $icd10_CA[] = $noteSevereCA;
    } else {
    }
    $cc_icd10_CA = implode(', ', $icd10_CA);

    ////Alz
    $icd10_Alz = array();
    if (isset($_POST['RadioAlz'])) {
        $RadioAlz = $_POST['RadioAlz'];
    } else {
    }
    $noteMildAlz = $_POST['noteMildAlz'];
    $noteModerateAlz = $_POST['noteModerateAlz'];
    $noteSevereAlz = $_POST['noteSevereAlz'];
    $noteAlz = $_POST['noteAlz'];
    $Alz = 15;
    // เช็คและเพิ่มข้อมูลใน $icd10_Alz ถ้ามีค่าไม่ว่าง
    if (!empty($noteMildAlz)) {
        $icd10_Alz[] = $noteMildAlz;
    }

    if (!empty($noteModerateAlz)) {
        $icd10_Alz[] = $noteModerateAlz;
    }

    if (!empty($noteSevereAlz)) {
        $icd10_Alz[] = $noteSevereAlz;
    } else {
    }
    $cc_icd10_Alz = implode(', ', $icd10_Alz);

    ////PK
    $icd10_PK = array();
    if (isset($_POST['RadioPK'])) {
        $RadioPK = $_POST['RadioPK'];
    } else {
    }
    $noteMildPK = $_POST['noteMildPK'];
    $noteModeratePK = $_POST['noteModeratePK'];
    $noteSeverePK = $_POST['noteSeverePK'];
    $notePK = $_POST['notePK'];
    $PK = 16;
    // เช็คและเพิ่มข้อมูลใน $icd10_PK ถ้ามีค่าไม่ว่าง
    if (!empty($noteMildPK)) {
        $icd10_PK[] = $noteMildPK;
    }

    if (!empty($noteModeratePK)) {
        $icd10_PK[] = $noteModeratePK;
    }

    if (!empty($noteSeverePK)) {
        $icd10_PK[] = $noteSeverePK;
    } else {
    }
    $cc_icd10_PK = implode(', ', $icd10_PK);

    ////DEM
    $icd10_DEM = array();
    if (isset($_POST['RadioDEM'])) {
        $RadioDEM = $_POST['RadioDEM'];
    } else {
    }
    $noteMildDEM = $_POST['noteMildDEM'];
    $noteModerateDEM = $_POST['noteModerateDEM'];
    $noteSevereDEM = $_POST['noteSevereDEM'];
    $noteDEM = $_POST['noteDEM'];
    $DEM = 17;
    // เช็คและเพิ่มข้อมูลใน $icd10_DEM ถ้ามีค่าไม่ว่าง
    if (!empty($noteMildDEM)) {
        $icd10_DEM[] = $noteMildDEM;
    }

    if (!empty($noteModerateDEM)) {
        $icd10_DEM[] = $noteModerateDEM;
    }

    if (!empty($noteSevereDEM)) {
        $icd10_DEM[] = $noteSevereDEM;
    } else {
    }
    $cc_icd10_DEM = implode(', ', $icd10_DEM);
    
    /*Stroke_non_IMC
    $RadioStroke_non_IMC = isset($_POST['RadioStroke_non_IMC']);
    $noteMildStroke_non_IMC = $_POST['noteMildStroke_non_IMC'];
    $noteModerateStroke_non_IMC = $_POST['noteModerateStroke_non_IMC'];
    $noteSevereStroke_non_IMC = $_POST['noteSevereStroke_non_IMC'];
    $noteStroke_non_IMC = $_POST['noteStroke_non_IMC'];

    ////Monk_StaffMed
    $RadioMonk_StaffMed = isset($_POST['RadioMonk_StaffMed']);
    $noteMildMonk_StaffMed = $_POST['noteMildMonk_StaffMed'];
    $noteModerateMonk_StaffMed = $_POST['noteModerateMonk_StaffMed'];
    $noteSevereMonk_StaffMed = $_POST['noteSevereMonk_StaffMed'];
    $noteMonk_StaffMed = $_POST['noteMonk_StaffMed'];*/

    // ทำอะไรกับข้อมูลที่รับมา เช่น แสดงผลออกมา
    /*echo "VN:" . $VN;
    echo " ";
    echo "HN:" . $HN;
    echo " ";
    echo "เวลา:" . $date;
    echo " ";
    echo "lastvisit:" . $lastvisit;
    echo " ";
    echo "ค่าที่ส่งมา:" . $RadioDM;
    echo " ";
    echo "ICD10 ที่ถูกส่งมาคือ:" . $cc_icd10_DM;
    echo " ";
    echo "ค่าสีที่ได้คือ:" . $colorAI;
    echo " ";
    echo "คะแนนที่ได้:" . $totalall;
    echo " ";
    echo "ประเภทสี:" . $total;
    echo " ";
    echo "ค่าสีที่เลือก:" . $colorUser;
    echo " ";
    echo "อื่นๆ:" . $noteDM;*/


    /*$sqlinsertrow = "INSERT INTO patient_type (vn, hn, date_time, clinic_type_id, last_visit, score_type, score_type, score, color_type, color, cc, note)
VALUES ('$VN', '$HN', '$date', '$COPD', '$lastvisit', '$RadioCOPD', '$colorAI', '$totalall', '$total', '$colorUser', '$noteMildCOPD', '$noteCOPD')";*/

    if (!empty($RadioDM)) {
        $rowDM = "INSERT INTO patient_type (vn, hn, date_time, clinic_type_id, patient_type_id, last_visit, score_type, score, color_type, color, cc, note, doctor, doctor_name, hos_guid)
    VALUES ('$VN', '$HN', '$date', '$DM', '$RadioDM', '$lastvisit', '$colorAI', '$totalall', '$total', '$colorUser', '$cc_icd10_DM', '$noteDM', '$d_code', '$user_name', '$hos_guid')";
        $conn->query($rowDM);
    }

    if (!empty($RadioHT)) {
        $rowHT = "INSERT INTO patient_type (vn, hn, date_time, clinic_type_id, patient_type_id, last_visit, score_type, score, color_type, color, cc, note, doctor, doctor_name, hos_guid)
    VALUES ('$VN', '$HN', '$date', '$HT', '$RadioHT', '$lastvisit', '$colorAI', '$totalall', '$total', '$colorUser', '$cc_icd10_HT', '$noteHT', '$d_code', '$user_name', '$hos_guid')";
        $conn->query($rowHT);
    }

    if (!empty($RadioAsthma)) {
        $rowAsthma = "INSERT INTO patient_type (vn, hn, date_time, clinic_type_id, patient_type_id, last_visit, score_type, score, color_type, color, cc, note, doctor, doctor_name, hos_guid)
    VALUES ('$VN', '$HN', '$date', '$Asthma', '$RadioAsthma', '$lastvisit', '$colorAI', '$totalall', '$total', '$colorUser', '$cc_icd10_Asthma', '$noteasthma', '$d_code', '$user_name', '$hos_guid')";
        $conn->query($rowAsthma);
    }

    if (!empty($RadioCOPD)) {
        $rowCOPD = "INSERT INTO patient_type (vn, hn, date_time, clinic_type_id, patient_type_id, last_visit, score_type, score, color_type, color, cc, note, doctor, doctor_name, hos_guid)
    VALUES ('$VN', '$HN', '$date', '$COPD', '$RadioCOPD', '$lastvisit', '$colorAI', '$totalall', '$total', '$colorUser', '$cc_icd10_COPD', '$noteCOPD', '$d_code', '$user_name', '$hos_guid')";
        $conn->query($rowCOPD);
    }

    if (!empty($RadioTB)) {
        $rowTB = "INSERT INTO patient_type (vn, hn, date_time, clinic_type_id, patient_type_id, last_visit, score_type, score, color_type, color, cc, note, doctor, doctor_name, hos_guid)
    VALUES ('$VN', '$HN', '$date', '$TB', '$RadioTB', '$lastvisit', '$colorAI', '$totalall', '$total', '$colorUser', '$cc_icd10_TB', '$noteTB', '$d_code', '$user_name', '$hos_guid')";
        $conn->query($rowTB);
    }

    if (!empty($RadioStroke)) {
        $rowStroke = "INSERT INTO patient_type (vn, hn, date_time, clinic_type_id, patient_type_id, last_visit, score_type, score, color_type, color, cc, note, doctor, doctor_name, hos_guid)
    VALUES ('$VN', '$HN', '$date', '$Stroke', '$RadioStroke', '$lastvisit', '$colorAI', '$totalall', '$total', '$colorUser', '$cc_icd10_Stroke', '$noteStroke', '$d_code', '$user_name', '$hos_guid')";
        $conn->query($rowStroke);
    }

    if (!empty($RadioCKD)) {
        $rowCKD = "INSERT INTO patient_type (vn, hn, date_time, clinic_type_id, patient_type_id, last_visit, score_type, score, color_type, color, cc, note, doctor, doctor_name, hos_guid)
    VALUES ('$VN', '$HN', '$date', '$CKD', '$RadioCKD', '$lastvisit', '$colorAI', '$totalall', '$total', '$colorUser', '$cc_icd10_CKD', '$noteCKD', '$d_code', '$user_name', '$hos_guid')";
        $conn->query($rowCKD);
    }

    if (!empty($RadioAF)) {
        $rowAF = "INSERT INTO patient_type (vn, hn, date_time, clinic_type_id, patient_type_id, last_visit, score_type, score, color_type, color, cc, note, doctor, doctor_name, hos_guid)
    VALUES ('$VN', '$HN', '$date', '$AF', '$RadioAF', '$lastvisit', '$colorAI', '$totalall', '$total', '$colorUser', '$cc_icd10_AF', '$noteAF', '$d_code', '$user_name', '$hos_guid')";
        $conn->query($rowAF);
    }

    if (!empty($RadioHIV)) {
        $rowHIV = "INSERT INTO patient_type (vn, hn, date_time, clinic_type_id, patient_type_id, last_visit, score_type, score, color_type, color, cc, note, doctor, doctor_name, hos_guid)
    VALUES ('$VN', '$HN', '$date', '$HIV', '$RadioHIV', '$lastvisit', '$colorAI', '$totalall', '$total', '$colorUser', '$cc_icd10_HIV', '$noteHIV', '$d_code', '$user_name', '$hos_guid')";
        $conn->query($rowHIV);
    }

    if (!empty($RadioEp)) {
        $rowEp = "INSERT INTO patient_type (vn, hn, date_time, clinic_type_id, patient_type_id, last_visit, score_type, score, color_type, color, cc, note, doctor, doctor_name, hos_guid)
    VALUES ('$VN', '$HN', '$date', '$Ep', '$RadioEp', '$lastvisit', '$colorAI', '$totalall', '$total', '$colorUser', '$cc_icd10_Ep', '$noteEp', '$d_code', '$user_name', '$hos_guid')";
        $conn->query($rowEp);
    }

    if (!empty($RadioPD)) {
        $rowPD = "INSERT INTO patient_type (vn, hn, date_time, clinic_type_id, patient_type_id, last_visit, score_type, score, color_type, color, cc, note, doctor, doctor_name, hos_guid)
    VALUES ('$VN', '$HN', '$date', '$PD', '$RadioPD', '$lastvisit', '$colorAI', '$totalall', '$total', '$colorUser', '$cc_icd10_PD', '$notePD', '$d_code', '$user_name', '$hos_guid')";
        $conn->query($rowPD);
    }

    /*if (!empty($RadioGout)) {
        $rowGout = "INSERT INTO patient_type (vn, hn, date_time, clinic_type_id, patient_type_id, last_visit, score_type, score, color_type, color, cc, note)
    VALUES ('$VN', '$HN', '$date', '$Gout', '$RadioGout', '$lastvisit', '$colorAI', '$totalall', '$total', '$colorUser', '$cc_icd10_Gout', '$noteGout')";
        $conn->query($rowGout);
    }*/

    if (!empty($RadioHA)) {
        $rowHA = "INSERT INTO patient_type (vn, hn, date_time, clinic_type_id, patient_type_id, last_visit, score_type, score, color_type, color, cc, note, doctor, doctor_name, hos_guid)
    VALUES ('$VN', '$HN', '$date', '$HA', '$RadioHA', '$lastvisit', '$colorAI', '$totalall', '$total', '$colorUser', '$cc_icd10_HA', '$noteHA', '$d_code', '$user_name', '$hos_guid')";
        $conn->query($rowHA);
    }

    if (!empty($RadioCA)) {
        $rowCA = "INSERT INTO patient_type (vn, hn, date_time, clinic_type_id, patient_type_id, last_visit, score_type, score, color_type, color, cc, note, doctor, doctor_name, hos_guid)
    VALUES ('$VN', '$HN', '$date', '$CA', '$RadioCA', '$lastvisit', '$colorAI', '$totalall', '$total', '$colorUser', '$cc_icd10_CA', '$noteCA', '$d_code', '$user_name', '$hos_guid')";
        $conn->query($rowCA);
    }

    if (!empty($RadioAlz)) {
        $rowAlz = "INSERT INTO patient_type (vn, hn, date_time, clinic_type_id, patient_type_id, last_visit, score_type, score, color_type, color, cc, note, doctor, doctor_name, hos_guid)
    VALUES ('$VN', '$HN', '$date', '$Alz', '$RadioAlz', '$lastvisit', '$colorAI', '$totalall', '$total', '$colorUser', '$cc_icd10_Alz', '$noteAlz', '$d_code', '$user_name', '$hos_guid')";
        $conn->query($rowAlz);
    }

    if (!empty($RadioPK)) {
        $rowPK = "INSERT INTO patient_type (vn, hn, date_time, clinic_type_id, patient_type_id, last_visit, score_type, score, color_type, color, cc, note, doctor, doctor_name, hos_guid)
    VALUES ('$VN', '$HN', '$date', '$PK', '$RadioPK', '$lastvisit', '$colorAI', '$totalall', '$total', '$colorUser', '$cc_icd10_PK', '$notePK', '$d_code', '$user_name', '$hos_guid')";
        $conn->query($rowPK);
    }

    if (!empty($RadioDEM)) {
        $rowDEM = "INSERT INTO patient_type (vn, hn, date_time, clinic_type_id, patient_type_id, last_visit, score_type, score, color_type, color, cc, note, doctor, doctor_name, hos_guid)
    VALUES ('$VN', '$HN', '$date', '$DEM', '$RadioDEM', '$lastvisit', '$colorAI', '$totalall', '$total', '$colorUser', '$cc_icd10_DEM', '$noteDEM', '$d_code', '$user_name', '$hos_guid')";
        $conn->query($rowDEM);
    }

    if (
        empty($RadioDM) && empty($RadioHT) && empty($RadioAsthma) && empty($RadioCOPD) && empty($RadioTB) && empty($RadioStroke) && empty($RadioCKD)
        && empty($RadioAF) && empty($RadioHIV) && empty($RadioEp) && empty($RadioPD) && empty($RadioHA) && empty($RadioCA) && empty($RadioAlz) && empty($RadioPK) && empty($RadioDEM)
    ) {
        $rowEMPTY = "INSERT INTO patient_type (vn, hn, date_time, last_visit, color_type, color, note, doctor, doctor_name, hos_guid)
        VALUES ('$VN', '$HN', '$date', '$lastvisit', '$total', '$colorUser', '$Note', '$d_code', '$user_name', '$hos_guid')";
        $conn->query($rowEMPTY);
    }
}
$conn->close();
