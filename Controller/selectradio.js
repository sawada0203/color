document.addEventListener("DOMContentLoaded", function () {

    ////////COPD
    var flexCheckMild_COPD = document.getElementById("flexCheckMild_COPD");
    var flexCheckModerate_COPD = document.getElementById("flexCheckModerate_COPD");
    var flexCheckSevere_COPD = document.getElementById("flexCheckSevere_COPD");

    var btnMild_COPD = document.getElementById("btnMild_COPD");
    var btnModerate_COPD = document.getElementById("btnModerate_COPD");
    var btnSevere_COPD = document.getElementById("btnSevere_COPD");

    var NoteMild_COPD = document.getElementById("NoteMild_COPD");
    var NoteModerate_COPD = document.getElementById("NoteModerate_COPD");
    var NoteSevere_COPD = document.getElementById("NoteSevere_COPD");
    // เพิ่ม Event Listener สำหรับ radio inputs
    flexCheckMild_COPD.addEventListener("change", function () {
        if (flexCheckMild_COPD.checked) {
            // เมื่อ radio input "Mild" ถูกเลือก
            btnMild_COPD.disabled = false; // เปิด checkbox Mild
            NoteMild_COPD.disabled = false; // เปิด textarea Mild
            btnModerate_COPD.disabled = true; // ปิด checkbox Moderate
            NoteModerate_COPD.disabled = true; // ปิด textarea Moderate
            btnSevere_COPD.disabled = true; // ปิด checkbox Severe
            NoteSevere_COPD.disabled = true; // ปิด textarea Severe
        }
    });
    flexCheckModerate_COPD.addEventListener("change", function () {
        if (flexCheckModerate_COPD.checked) {
            // เมื่อ radio input "Moderate" ถูกเลือก
            btnMild_COPD.disabled = true; // ปิด checkbox Mild
            NoteMild_COPD.disabled = true; // ปิด textarea Mild
            btnModerate_COPD.disabled = false; // เปิด checkbox Moderate
            NoteModerate_COPD.disabled = false; // เปิด textarea Moderate
            btnSevere_COPD.disabled = true; // ปิด checkbox Severe
            NoteSevere_COPD.disabled = true; // ปิด textarea Severe
        }
    });

    flexCheckSevere_COPD.addEventListener("change", function () {
        if (flexCheckSevere_COPD.checked) {
            // เมื่อ radio input "Severe" ถูกเลือก
            btnMild_COPD.disabled = true; // ปิด checkbox Mild
            NoteMild_COPD.disabled = true; // ปิด textarea Mild
            btnModerate_COPD.disabled = true; // ปิด checkbox Moderate
            NoteModerate_COPD.disabled = true; // ปิด textarea Moderate
            btnSevere_COPD.disabled = false; // เปิด checkbox Severe
            NoteSevere_COPD.disabled = false; // เปิด textarea Severe
        }
    });

    /////Asthma
    var flexCheckMild_Asthma = document.getElementById("flexCheckMild_Asthma");
    var flexCheckModerate_Asthma = document.getElementById("flexCheckModerate_Asthma");
    var flexCheckSevere_Asthma = document.getElementById("flexCheckSevere_Asthma");

    var btnMild_asthma = document.getElementById("btnMild_asthma");
    var btnModerate_asthma = document.getElementById("btnModerate_asthma");
    var btnSevere_asthma = document.getElementById("btnSevere_asthma");

    var NoteMild_asthma = document.getElementById("NoteMild_asthma");
    var NoteModerate_asthma = document.getElementById("NoteModerate_asthma");
    var NoteSevere_asthma = document.getElementById("NoteSevere_asthma");
    // เพิ่ม Event Listener สำหรับ radio inputs
    flexCheckMild_Asthma.addEventListener("change", function () {
        if (flexCheckMild_Asthma.checked) {
            // เมื่อ radio input "Mild" ถูกเลือก
            btnMild_asthma.disabled = false; // เปิด checkbox Mild
            NoteMild_asthma.disabled = false; // เปิด textarea Mild
            btnModerate_asthma.disabled = true; // ปิด checkbox Moderate
            NoteModerate_asthma.disabled = true; // ปิด textarea Moderate
            btnSevere_asthma.disabled = true; // ปิด checkbox Severe
            NoteSevere_asthma.disabled = true; // ปิด textarea Severe
        }
    });
    flexCheckModerate_Asthma.addEventListener("change", function () {
        if (flexCheckModerate_Asthma.checked) {
            // เมื่อ radio input "Moderate" ถูกเลือก
            btnMild_asthma.disabled = true; // ปิด checkbox Mild
            NoteMild_asthma.disabled = true; // ปิด textarea Mild
            btnModerate_asthma.disabled = false; // เปิด checkbox Moderate
            NoteModerate_asthma.disabled = false; // เปิด textarea Moderate
            btnSevere_asthma.disabled = true; // ปิด checkbox Severe
            NoteSevere_asthma.disabled = true; // ปิด textarea Severe
        }
    });
    flexCheckSevere_Asthma.addEventListener("change", function () {
        if (flexCheckSevere_Asthma.checked) {
            // เมื่อ radio input "Severe" ถูกเลือก
            btnMild_asthma.disabled = true; // ปิด checkbox Mild
            NoteMild_asthma.disabled = true; // ปิด textarea Mild
            btnModerate_asthma.disabled = true; // ปิด checkbox Moderate
            NoteModerate_asthma.disabled = true; // ปิด textarea Moderate
            btnSevere_asthma.disabled = false; // เปิด checkbox Severe
            NoteSevere_asthma.disabled = false; // เปิด textarea Severe
        }
    });

    /////HT
    var flexCheckMild_HT = document.getElementById("flexCheckMild_HT");
    var flexCheckModerate_HT = document.getElementById("flexCheckModerate_HT");
    var flexCheckSevere_HT = document.getElementById("flexCheckSevere_HT");

    var btnMild_HT = document.getElementById("btnMild_HT");
    var btnModerate_HT = document.getElementById("btnModerate_HT");
    var btnSevere_HT1 = document.getElementById("btnSevere_HT1");
    var btnSevere_HT2 = document.getElementById("btnSevere_HT2");
    var btnSevere_HT3 = document.getElementById("btnSevere_HT3");
    var btnSevere_HT4 = document.getElementById("btnSevere_HT4");
    var btnSevere_HT5 = document.getElementById("btnSevere_HT5");
    var btnSevere_HT6 = document.getElementById("btnSevere_HT6");
    var btnSevere_HT7 = document.getElementById("btnSevere_HT7");
    var btnSevere_HT8 = document.getElementById("btnSevere_HT8");
    var btnSevere_HT9 = document.getElementById("btnSevere_HT9");
    var btnSevere_HT10 = document.getElementById("btnSevere_HT10");


    var NoteMild_HT = document.getElementById("NoteMild_HT");
    var NoteModerate_HT = document.getElementById("NoteModerate_HT");
    var NoteSevere_HT = document.getElementById("NoteSevere_HT");

    // เพิ่ม Event Listener สำหรับ radio inputs
    flexCheckMild_HT.addEventListener("change", function () {
        if (flexCheckMild_HT.checked) {
            // เมื่อ radio input "Mild" ถูกเลือก
            btnMild_HT.disabled = false; // เปิด checkbox Mild
            NoteMild_HT.disabled = false; // เปิด textarea Mild
            btnModerate_HT.disabled = true; // ปิด checkbox Moderate
            NoteModerate_HT.disabled = true; // ปิด textarea Moderate
            btnSevere_HT1.disabled = true; // ปิด checkbox Severe
            btnSevere_HT2.disabled = true; // ปิด checkbox Severe
            btnSevere_HT3.disabled = true; // ปิด checkbox Severe
            btnSevere_HT4.disabled = true; // ปิด checkbox Severe
            btnSevere_HT5.disabled = true; // ปิด checkbox Severe
            btnSevere_HT6.disabled = true; // ปิด checkbox Severe
            btnSevere_HT7.disabled = true; // ปิด checkbox Severe
            btnSevere_HT8.disabled = true; // ปิด checkbox Severe
            btnSevere_HT9.disabled = true; // ปิด checkbox Severe
            btnSevere_HT10.disabled = true; // ปิด checkbox Severe
            NoteSevere_HT.disabled = true; // ปิด textarea Severe
        }
    });
    flexCheckModerate_HT.addEventListener("change", function () {
        if (flexCheckModerate_HT.checked) {
            // เมื่อ radio input "Moderate" ถูกเลือก
            btnMild_HT.disabled = true; // ปิด checkbox Mild
            NoteMild_HT.disabled = true; // ปิด textarea Mild
            btnModerate_HT.disabled = false; // เปิด checkbox Moderate
            NoteModerate_HT.disabled = false; // เปิด textarea Moderate
            btnSevere_HT1.disabled = true; // ปิด checkbox Severe
            btnSevere_HT2.disabled = true; // ปิด checkbox Severe
            btnSevere_HT3.disabled = true; // ปิด checkbox Severe
            btnSevere_HT4.disabled = true; // ปิด checkbox Severe
            btnSevere_HT5.disabled = true; // ปิด checkbox Severe
            btnSevere_HT6.disabled = true; // ปิด checkbox Severe
            btnSevere_HT7.disabled = true; // ปิด checkbox Severe
            btnSevere_HT8.disabled = true; // ปิด checkbox Severe
            btnSevere_HT9.disabled = true; // ปิด checkbox Severe
            btnSevere_HT10.disabled = true; // ปิด checkbox Severe
            NoteSevere_HT.disabled = true; // ปิด textarea Severe
        }
    });
    flexCheckSevere_HT.addEventListener("change", function () {
        if (flexCheckSevere_HT.checked) {
            // เมื่อ radio input "Severe" ถูกเลือก
            btnMild_HT.disabled = true; // ปิด checkbox Mild
            NoteMild_HT.disabled = true; // ปิด textarea Mild
            btnModerate_HT.disabled = true; // ปิด checkbox Moderate
            NoteModerate_HT.disabled = true; // ปิด textarea Moderate
            btnSevere_HT1.disabled = false; // เปิด checkbox Severe
            btnSevere_HT2.disabled = false; // เปิด checkbox Severe
            btnSevere_HT3.disabled = false; // เปิด checkbox Severe
            btnSevere_HT4.disabled = false; // เปิด checkbox Severe
            btnSevere_HT5.disabled = false; // เปิด checkbox Severe
            btnSevere_HT6.disabled = false; // เปิด checkbox Severe
            btnSevere_HT7.disabled = false; // เปิด checkbox Severe
            btnSevere_HT8.disabled = false; // เปิด checkbox Severe
            btnSevere_HT9.disabled = false; // เปิด checkbox Severe
            btnSevere_HT10.disabled = false; // เปิด checkbox Severe
            NoteSevere_HT.disabled = false; // เปิด textarea Severe
        }
    });

    /////DM
    var flexCheckMild_DM = document.getElementById("flexCheckMild_DM");
    var flexCheckModerate_DM = document.getElementById("flexCheckModerate_DM");
    var flexCheckSevere_DM = document.getElementById("flexCheckSevere_DM");

    var btnMild_DM1 = document.getElementById("btnMild_DM1");
    var btnMild_DM2 = document.getElementById("btnMild_DM2");
    var btnMild_DM3 = document.getElementById("btnMild_DM3");
    var btnModerate_DM1 = document.getElementById("btnModerate_DM1");
    var btnModerate_DM2 = document.getElementById("btnModerate_DM2");
    var btnModerate_DM3 = document.getElementById("btnModerate_DM3");
    var btnSevere_DM1 = document.getElementById("btnSevere_DM1");
    var btnSevere_DM2 = document.getElementById("btnSevere_DM2");
    var btnSevere_DM3 = document.getElementById("btnSevere_DM3");
    var btnSevere_DM4 = document.getElementById("btnSevere_DM4");
    var btnSevere_DM5 = document.getElementById("btnSevere_DM5");
    var btnSevere_DM6 = document.getElementById("btnSevere_DM6");
    var btnSevere_DM7 = document.getElementById("btnSevere_DM7");
    var btnSevere_DM8 = document.getElementById("btnSevere_DM8");
    var btnSevere_DM9 = document.getElementById("btnSevere_DM9");
    var btnSevere_DM10 = document.getElementById("btnSevere_DM10");


    var NoteMild_DM = document.getElementById("NoteMild_DM");
    var NoteModerate_DM = document.getElementById("NoteModerate_DM");
    var NoteSevere_DM = document.getElementById("NoteSevere_DM");

    // เพิ่ม Event Listener สำหรับ radio inputs
    flexCheckMild_DM.addEventListener("change", function () {
        if (flexCheckMild_DM.checked) {
            // เมื่อ radio input "Mild" ถูกเลือก
            btnMild_DM1.disabled = false; // เปิด checkbox Mild
            btnMild_DM2.disabled = false; // เปิด checkbox Mild
            btnMild_DM3.disabled = false; // เปิด checkbox Mild
            NoteMild_DM.disabled = false; // เปิด textarea Mild
            btnModerate_DM1.disabled = true; // ปิด checkbox Moderate
            btnModerate_DM2.disabled = true; // ปิด checkbox Moderate
            btnModerate_DM3.disabled = true; // ปิด checkbox Moderate
            NoteModerate_DM.disabled = true; // ปิด textarea Moderate
            btnSevere_DM1.disabled = true; // ปิด checkbox Severe
            btnSevere_DM2.disabled = true; // ปิด checkbox Severe
            btnSevere_DM3.disabled = true; // ปิด checkbox Severe
            btnSevere_DM4.disabled = true; // ปิด checkbox Severe
            btnSevere_DM5.disabled = true; // ปิด checkbox Severe
            btnSevere_DM6.disabled = true; // ปิด checkbox Severe
            btnSevere_DM7.disabled = true; // ปิด checkbox Severe
            btnSevere_DM8.disabled = true; // ปิด checkbox Severe
            btnSevere_DM9.disabled = true; // ปิด checkbox Severe
            btnSevere_DM10.disabled = true; // ปิด checkbox Severe
            NoteSevere_DM.disabled = true; // ปิด textarea Severe
        }
    });
    flexCheckModerate_DM.addEventListener("change", function () {
        if (flexCheckModerate_DM.checked) {
            // เมื่อ radio input "Moderate" ถูกเลือก
            btnMild_DM1.disabled = true; // ปิด checkbox Mild
            btnMild_DM2.disabled = true; // ปิด checkbox Mild
            btnMild_DM3.disabled = true; // ปิด checkbox Mild
            NoteMild_DM.disabled = true; // ปิด textarea Mild
            btnModerate_DM1.disabled = false; // เปิด checkbox Moderate
            btnModerate_DM2.disabled = false; // เปิด checkbox Moderate
            btnModerate_DM3.disabled = false; // เปิด checkbox Moderate
            NoteModerate_DM.disabled = false; // เปิด textarea Moderate
            btnSevere_DM1.disabled = true; // ปิด checkbox Severe
            btnSevere_DM2.disabled = true; // ปิด checkbox Severe
            btnSevere_DM3.disabled = true; // ปิด checkbox Severe
            btnSevere_DM4.disabled = true; // ปิด checkbox Severe
            btnSevere_DM5.disabled = true; // ปิด checkbox Severe
            btnSevere_DM6.disabled = true; // ปิด checkbox Severe
            btnSevere_DM7.disabled = true; // ปิด checkbox Severe
            btnSevere_DM8.disabled = true; // ปิด checkbox Severe
            btnSevere_DM9.disabled = true; // ปิด checkbox Severe
            btnSevere_DM10.disabled = true; // ปิด checkbox Severe
            NoteSevere_DM.disabled = true; // ปิด textarea Severe
        }
    });
    flexCheckSevere_DM.addEventListener("change", function () {
        if (flexCheckSevere_DM.checked) {
            // เมื่อ radio input "Severe" ถูกเลือก
            btnMild_DM1.disabled = true; // ปิด checkbox Mild
            btnMild_DM2.disabled = true; // ปิด checkbox Mild
            btnMild_DM3.disabled = true; // ปิด checkbox Mild
            NoteMild_DM.disabled = true; // ปิด textarea Mild
            btnModerate_DM1.disabled = true; // ปิด checkbox Moderate
            btnModerate_DM2.disabled = true; // ปิด checkbox Moderate
            btnModerate_DM3.disabled = true; // ปิด checkbox Moderate
            NoteModerate_DM.disabled = true; // ปิด textarea Moderate
            btnSevere_DM1.disabled = false; // เปิด checkbox Severe
            btnSevere_DM2.disabled = false; // เปิด checkbox Severe
            btnSevere_DM3.disabled = false; // เปิด checkbox Severe
            btnSevere_DM4.disabled = false; // เปิด checkbox Severe
            btnSevere_DM5.disabled = false; // เปิด checkbox Severe
            btnSevere_DM6.disabled = false; // เปิด checkbox Severe
            btnSevere_DM7.disabled = false; // เปิด checkbox Severe
            btnSevere_DM8.disabled = false; // เปิด checkbox Severe
            btnSevere_DM9.disabled = false; // เปิด checkbox Severe
            btnSevere_DM10.disabled = false; // เปิด checkbox Severe
            NoteSevere_DM.disabled = false; // เปิด textarea Severe
        }
    });

    /////Stroke
    var flexCheckMild_Stroke = document.getElementById("flexCheckMild_Stroke");
    var flexCheckModerate_Stroke = document.getElementById("flexCheckModerate_Stroke");
    var flexCheckSevere_Stroke = document.getElementById("flexCheckSevere_Stroke");

    var btnMild_Stroke = document.getElementById("btnMild_Stroke");
    var btnModerate_Stroke = document.getElementById("btnModerate_Stroke");
    var btnSevere_Stroke = document.getElementById("btnSevere_Stroke");

    var NoteMild_Stroke = document.getElementById("NoteMild_Stroke");
    var NoteModerate_Stroke = document.getElementById("NoteModerate_Stroke");
    var NoteSevere_Stroke = document.getElementById("NoteSevere_Stroke");

    // เพิ่ม Event Listener สำหรับ radio inputs
    flexCheckMild_Stroke.addEventListener("change", function () {
        if (flexCheckMild_Stroke.checked) {
            // เมื่อ radio input "Mild" ถูกเลือก
            btnMild_Stroke.disabled = false; // เปิด checkbox Mild
            NoteMild_Stroke.disabled = false; // เปิด textarea Mild
            btnModerate_Stroke.disabled = true; // ปิด checkbox Moderate
            NoteModerate_Stroke.disabled = true; // ปิด textarea Moderate
            btnSevere_Stroke.disabled = true; // ปิด checkbox Severe
            NoteSevere_Stroke.disabled = true; // ปิด textarea Severe
        }
    });
    flexCheckModerate_Stroke.addEventListener("change", function () {
        if (flexCheckModerate_Stroke.checked) {
            // เมื่อ radio input "Moderate" ถูกเลือก
            btnMild_Stroke.disabled = true; // ปิด checkbox Mild
            NoteMild_Stroke.disabled = true; // ปิด textarea Mild
            btnModerate_Stroke.disabled = false; // เปิด checkbox Moderate
            NoteModerate_Stroke.disabled = false; // เปิด textarea Moderate
            btnSevere_Stroke.disabled = true; // ปิด checkbox Severe
            NoteSevere_Stroke.disabled = true; // ปิด textarea Severe
        }
    });
    flexCheckSevere_Stroke.addEventListener("change", function () {
        if (flexCheckSevere_Stroke.checked) {
            // เมื่อ radio input "Severe" ถูกเลือก
            btnMild_Stroke.disabled = true; // ปิด checkbox Mild
            NoteMild_Stroke.disabled = true; // ปิด textarea Mild
            btnModerate_Stroke.disabled = true; // ปิด checkbox Moderate
            NoteModerate_Stroke.disabled = true; // ปิด textarea Moderate
            btnSevere_Stroke.disabled = false; // เปิด checkbox Severe
            NoteSevere_Stroke.disabled = false; // เปิด textarea Severe
        }
    });

    /////CKD
    var flexCheckMild_CKD = document.getElementById("flexCheckMild_CKD");
    var flexCheckModerate_CKD = document.getElementById("flexCheckModerate_CKD");
    var flexCheckSevere_CKD = document.getElementById("flexCheckSevere_CKD");

    var btnMild_CKD1 = document.getElementById("btnMild_CKD1");
    var btnMild_CKD2 = document.getElementById("btnMild_CKD2");
    var btnModerate_CKD1 = document.getElementById("btnModerate_CKD1");
    var btnModerate_CKD2 = document.getElementById("btnModerate_CKD2");
    var btnSevere_CKD1 = document.getElementById("btnSevere_CKD1");
    var btnSevere_CKD2 = document.getElementById("btnSevere_CKD2");

    var NoteMild_CKD = document.getElementById("NoteMild_CKD");
    var NoteModerate_CKD = document.getElementById("NoteModerate_CKD");
    var NoteSevere_CKD = document.getElementById("NoteSevere_CKD");

    // เพิ่ม Event Listener สำหรับ radio inputs
    flexCheckMild_CKD.addEventListener("change", function () {
        if (flexCheckMild_CKD.checked) {
            // เมื่อ radio input "Mild" ถูกเลือก
            btnMild_CKD1.disabled = false; // เปิด checkbox Mild
            btnMild_CKD2.disabled = false; // เปิด checkbox Mild
            NoteMild_CKD.disabled = false; // เปิด textarea Mild
            btnModerate_CKD1.disabled = true; // ปิด checkbox Moderate
            btnModerate_CKD2.disabled = true; // ปิด checkbox Moderate
            NoteModerate_CKD.disabled = true; // ปิด textarea Moderate
            btnSevere_CKD1.disabled = true; // ปิด checkbox Severe
            btnSevere_CKD2.disabled = true; // ปิด checkbox Severe
            NoteSevere_CKD.disabled = true; // ปิด textarea Severe
        }
    });
    flexCheckModerate_CKD.addEventListener("change", function () {
        if (flexCheckModerate_CKD.checked) {
            // เมื่อ radio input "Moderate" ถูกเลือก
            btnMild_CKD1.disabled = true; // ปิด checkbox Mild
            btnMild_CKD2.disabled = true; // ปิด checkbox Mild
            NoteMild_CKD.disabled = true; // ปิด textarea Mild
            btnModerate_CKD1.disabled = false; // เปิด checkbox Moderate
            btnModerate_CKD2.disabled = false; // เปิด checkbox Moderate
            NoteModerate_CKD.disabled = false; // เปิด textarea Moderate
            btnSevere_CKD1.disabled = true; // ปิด checkbox Severe
            btnSevere_CKD2.disabled = true; // ปิด checkbox Severe
            NoteSevere_CKD.disabled = true; // ปิด textarea Severe
        }
    });
    flexCheckSevere_CKD.addEventListener("change", function () {
        if (flexCheckSevere_CKD.checked) {
            // เมื่อ radio input "Severe" ถูกเลือก
            btnMild_CKD1.disabled = true; // ปิด checkbox Mild
            btnMild_CKD2.disabled = true; // ปิด checkbox Mild
            NoteMild_CKD.disabled = true; // ปิด textarea Mild
            btnModerate_CKD1.disabled = true; // ปิด checkbox Moderate
            btnModerate_CKD2.disabled = true; // ปิด checkbox Moderate
            NoteModerate_CKD.disabled = true; // ปิด textarea Moderate
            btnSevere_CKD1.disabled = false; // เปิด checkbox Severe
            btnSevere_CKD2.disabled = false; // เปิด checkbox Severe
            NoteSevere_CKD.disabled = false; // เปิด textarea Severe
        }
    });

    /////AF
    var flexCheckMild_AF = document.getElementById("flexCheckMild_AF");
    var flexCheckModerate_AF = document.getElementById("flexCheckModerate_AF");
    var flexCheckSevere_AF = document.getElementById("flexCheckSevere_AF");

    var btnMild_AF1 = document.getElementById("btnMild_AF1");
    var btnMild_AF2 = document.getElementById("btnMild_AF2");
    var btnMild_AF3 = document.getElementById("btnMild_AF3");
    var btnMild_AF4 = document.getElementById("btnMild_AF4");
    var btnMild_AF5 = document.getElementById("btnMild_AF5");
    var btnMild_AF6 = document.getElementById("btnMild_AF6");
    var btnModerate_AF1 = document.getElementById("btnModerate_AF1");
    var btnModerate_AF2 = document.getElementById("btnModerate_AF2");
    var btnModerate_AF3 = document.getElementById("btnModerate_AF3");
    var btnModerate_AF4 = document.getElementById("btnModerate_AF4");
    var btnModerate_AF5 = document.getElementById("btnModerate_AF5");
    var btnModerate_AF6 = document.getElementById("btnModerate_AF6");
    var btnSevere_AF1 = document.getElementById("btnSevere_AF1");
    var btnSevere_AF2 = document.getElementById("btnSevere_AF2");
    var btnSevere_AF3 = document.getElementById("btnSevere_AF3");
    var btnSevere_AF4 = document.getElementById("btnSevere_AF4");
    var btnSevere_AF5 = document.getElementById("btnSevere_AF5");
    var btnSevere_AF6 = document.getElementById("btnSevere_AF6");

    var NoteMild_AF = document.getElementById("NoteMild_AF");
    var NoteModerate_AF = document.getElementById("NoteModerate_AF");
    var NoteSevere_AF = document.getElementById("NoteSevere_AF");

    // เพิ่ม Event Listener สำหรับ radio inputs
    flexCheckMild_AF.addEventListener("change", function () {
        if (flexCheckMild_AF.checked) {
            // เมื่อ radio input "Mild" ถูกเลือก
            btnMild_AF1.disabled = false; // เปิด checkbox Mild
            btnMild_AF2.disabled = false; // เปิด checkbox Mild
            btnMild_AF3.disabled = false; // เปิด checkbox Mild
            btnMild_AF4.disabled = false; // เปิด checkbox Mild
            btnMild_AF5.disabled = false; // เปิด checkbox Mild
            btnMild_AF6.disabled = false; // เปิด checkbox Mild
            NoteMild_AF.disabled = false; // เปิด textarea Mild
            btnModerate_AF1.disabled = true; // ปิด checkbox Moderate
            btnModerate_AF2.disabled = true; // ปิด checkbox Moderate
            btnModerate_AF3.disabled = true; // ปิด checkbox Moderate
            btnModerate_AF4.disabled = true; // ปิด checkbox Moderate
            btnModerate_AF5.disabled = true; // ปิด checkbox Moderate
            btnModerate_AF6.disabled = true; // ปิด checkbox Moderate
            NoteModerate_AF.disabled = true; // ปิด textarea Moderate
            btnSevere_AF1.disabled = true; // ปิด checkbox Severe
            btnSevere_AF2.disabled = true; // ปิด checkbox Severe
            btnSevere_AF3.disabled = true; // ปิด checkbox Severe
            btnSevere_AF4.disabled = true; // ปิด checkbox Severe
            btnSevere_AF5.disabled = true; // ปิด checkbox Severe
            btnSevere_AF6.disabled = true; // ปิด checkbox Severe
            NoteSevere_AF.disabled = true; // ปิด textarea Severe
        }
    });
    flexCheckModerate_AF.addEventListener("change", function () {
        if (flexCheckModerate_AF.checked) {
            // เมื่อ radio input "Moderate" ถูกเลือก
            btnMild_AF1.disabled = true; // ปิด checkbox Mild
            btnMild_AF2.disabled = true; // ปิด checkbox Mild
            btnMild_AF3.disabled = true; // ปิด checkbox Mild
            btnMild_AF4.disabled = true; // ปิด checkbox Mild
            btnMild_AF5.disabled = true; // ปิด checkbox Mild
            btnMild_AF6.disabled = true; // ปิด checkbox Mild
            NoteMild_AF.disabled = true; // ปิด textarea Mild
            btnModerate_AF1.disabled = false; // เปิด checkbox Moderate
            btnModerate_AF2.disabled = false; // เปิด checkbox Moderate
            btnModerate_AF3.disabled = false; // เปิด checkbox Moderate
            btnModerate_AF4.disabled = false; // เปิด checkbox Moderate
            btnModerate_AF5.disabled = false; // เปิด checkbox Moderate
            btnModerate_AF6.disabled = false; // เปิด checkbox Moderate
            NoteModerate_AF.disabled = false; // เปิด textarea Moderate
            btnSevere_AF1.disabled = true; // ปิด checkbox Severe
            btnSevere_AF2.disabled = true; // ปิด checkbox Severe
            btnSevere_AF3.disabled = true; // ปิด checkbox Severe
            btnSevere_AF4.disabled = true; // ปิด checkbox Severe
            btnSevere_AF5.disabled = true; // ปิด checkbox Severe
            btnSevere_AF6.disabled = true; // ปิด checkbox Severe
            NoteSevere_AF.disabled = true; // ปิด textarea Severe
        }
    });
    flexCheckSevere_AF.addEventListener("change", function () {
        if (flexCheckSevere_AF.checked) {
            // เมื่อ radio input "Severe" ถูกเลือก
            btnMild_AF1.disabled = true; // ปิด checkbox Mild
            btnMild_AF2.disabled = true; // ปิด checkbox Mild
            btnMild_AF3.disabled = true; // ปิด checkbox Mild
            btnMild_AF4.disabled = true; // ปิด checkbox Mild
            btnMild_AF5.disabled = true; // ปิด checkbox Mild
            btnMild_AF6.disabled = true; // ปิด checkbox Mild
            NoteMild_AF.disabled = true; // ปิด textarea Mild
            btnModerate_AF1.disabled = true; // ปิด checkbox Moderate
            btnModerate_AF2.disabled = true; // ปิด checkbox Moderate
            btnModerate_AF3.disabled = true; // ปิด checkbox Moderate
            btnModerate_AF4.disabled = true; // ปิด checkbox Moderate
            btnModerate_AF5.disabled = true; // ปิด checkbox Moderate
            btnModerate_AF6.disabled = true; // ปิด checkbox Moderate
            NoteModerate_AF.disabled = true; // ปิด textarea Moderate
            btnSevere_AF1.disabled = false; // เปิด checkbox Severe
            btnSevere_AF2.disabled = false; // เปิด checkbox Severe
            btnSevere_AF3.disabled = false; // เปิด checkbox Severe
            btnSevere_AF4.disabled = false; // เปิด checkbox Severe
            btnSevere_AF5.disabled = false; // เปิด checkbox Severe
            btnSevere_AF6.disabled = false; // เปิด checkbox Severe
            NoteSevere_AF.disabled = false; // เปิด textarea Severe
        }
    });

    /////TB
    var flexCheckMild_TB = document.getElementById("flexCheckMild_TB");
    var flexCheckModerate_TB = document.getElementById("flexCheckModerate_TB");
    var flexCheckSevere_TB = document.getElementById("flexCheckSevere_TB");

    var btnMild_TB = document.getElementById("btnMild_TB");
    var btnModerate_TB1 = document.getElementById("btnModerate_TB1");
    var btnModerate_TB2 = document.getElementById("btnModerate_TB2");
    var btnSevere_TB1 = document.getElementById("btnSevere_TB1");
    var btnSevere_TB2 = document.getElementById("btnSevere_TB2");
    var btnSevere_TB3 = document.getElementById("btnSevere_TB3");

    var NoteMild_TB = document.getElementById("NoteMild_TB");
    var NoteModerate_TB = document.getElementById("NoteModerate_TB");
    var NoteSevere_TB = document.getElementById("NoteSevere_TB");

    // เพิ่ม Event Listener สำหรับ radio inputs
    flexCheckMild_TB.addEventListener("change", function () {
        if (flexCheckMild_TB.checked) {
            // เมื่อ radio input "Mild" ถูกเลือก
            btnMild_TB.disabled = false; // เปิด checkbox Mild
            NoteMild_TB.disabled = false; // เปิด textarea Mild
            btnModerate_TB1.disabled = true; // ปิด checkbox Moderate
            btnModerate_TB2.disabled = true; // ปิด checkbox Moderate
            NoteModerate_TB.disabled = true; // ปิด textarea Moderate
            btnSevere_TB1.disabled = true; // ปิด checkbox Severe
            btnSevere_TB2.disabled = true; // ปิด checkbox Severe
            btnSevere_TB3.disabled = true; // ปิด checkbox Severe
            NoteSevere_TB.disabled = true; // ปิด textarea Severe
        }
    });
    flexCheckModerate_TB.addEventListener("change", function () {
        if (flexCheckModerate_TB.checked) {
            // เมื่อ radio input "Moderate" ถูกเลือก
            btnMild_TB.disabled = true; // ปิด checkbox Mild
            NoteMild_TB.disabled = true; // ปิด textarea Mild
            btnModerate_TB1.disabled = false; // เปิด checkbox Moderate
            btnModerate_TB2.disabled = false; // เปิด checkbox Moderate
            NoteModerate_TB.disabled = false; // เปิด textarea Moderate
            btnSevere_TB1.disabled = true; // ปิด checkbox Severe
            btnSevere_TB2.disabled = true; // ปิด checkbox Severe
            btnSevere_TB3.disabled = true; // ปิด checkbox Severe
            NoteSevere_TB.disabled = true; // ปิด textarea Severe
        }
    });
    flexCheckSevere_TB.addEventListener("change", function () {
        if (flexCheckSevere_TB.checked) {
            // เมื่อ radio input "Severe" ถูกเลือก
            btnMild_TB.disabled = true; // ปิด checkbox Mild
            NoteMild_TB.disabled = true; // ปิด textarea Mild
            btnModerate_TB1.disabled = true; // ปิด checkbox Moderate
            btnModerate_TB2.disabled = true; // ปิด checkbox Moderate
            NoteModerate_TB.disabled = true; // ปิด textarea Moderate
            btnSevere_TB1.disabled = false; // เปิด checkbox Severe
            btnSevere_TB2.disabled = false; // เปิด checkbox Severe
            btnSevere_TB3.disabled = false; // เปิด checkbox Severe
            NoteSevere_TB.disabled = false; // เปิด textarea Severe
        }
    });

    /////HIV
    var flexCheckMild_HIV = document.getElementById("flexCheckMild_HIV");
    var flexCheckModerate_HIV = document.getElementById("flexCheckModerate_HIV");
    var flexCheckSevere_HIV = document.getElementById("flexCheckSevere_HIV");

    var btnMild_HIV = document.getElementById("btnMild_HIV");
    var btnModerate_HIV = document.getElementById("btnModerate_HIV");
    var btnSevere_HIV = document.getElementById("btnSevere_HIV");

    var NoteMild_HIV = document.getElementById("NoteMild_HIV");
    var NoteModerate_HIV = document.getElementById("NoteModerate_HIV");
    var NoteSevere_HIV = document.getElementById("NoteSevere_HIV");

    // เพิ่ม Event Listener สำหรับ radio inputs
    flexCheckMild_HIV.addEventListener("change", function () {
        if (flexCheckMild_HIV.checked) {
            // เมื่อ radio input "Mild" ถูกเลือก
            btnMild_HIV.disabled = false; // เปิด checkbox Mild
            NoteMild_HIV.disabled = false; // เปิด textarea Mild
            btnModerate_HIV.disabled = true; // ปิด checkbox Moderate
            NoteModerate_HIV.disabled = true; // ปิด textarea Moderate
            btnSevere_HIV.disabled = true; // ปิด checkbox Severe
            NoteSevere_HIV.disabled = true; // ปิด textarea Severe
        }
    });
    flexCheckModerate_HIV.addEventListener("change", function () {
        if (flexCheckModerate_HIV.checked) {
            // เมื่อ radio input "Moderate" ถูกเลือก
            btnMild_HIV.disabled = true; // ปิด checkbox Mild
            NoteMild_HIV.disabled = true; // ปิด textarea Mild
            btnModerate_HIV.disabled = false; // เปิด checkbox Moderate
            NoteModerate_HIV.disabled = false; // เปิด textarea Moderate
            btnSevere_HIV.disabled = true; // ปิด checkbox Severe
            NoteSevere_HIV.disabled = true; // ปิด textarea Severe
        }
    });
    flexCheckSevere_HIV.addEventListener("change", function () {
        if (flexCheckSevere_HIV.checked) {
            // เมื่อ radio input "Severe" ถูกเลือก
            btnMild_HIV.disabled = true; // ปิด checkbox Mild
            NoteMild_HIV.disabled = true; // ปิด textarea Mild
            btnModerate_HIV.disabled = true; // ปิด checkbox Moderate
            NoteModerate_HIV.disabled = true; // ปิด textarea Moderate
            btnSevere_HIV.disabled = false; // เปิด checkbox Severe
            NoteSevere_HIV.disabled = false; // เปิด textarea Severe
        }
    });

    /////Epilepsy
    var flexCheckMild_Ep = document.getElementById("flexCheckMild_Epilepsy");
    var flexCheckModerate_Ep = document.getElementById("flexCheckModerate_Epilepsy");
    var flexCheckSevere_Ep = document.getElementById("flexCheckSevere_Epilepsy");

    var btnMild_Ep = document.getElementById("btnMild_Ep");
    var btnModerate_Ep = document.getElementById("btnModerate_Ep");
    var btnSevere_Ep = document.getElementById("btnSevere_Ep");

    var NoteMild_Ep = document.getElementById("NoteMild_Ep");
    var NoteModerate_Ep = document.getElementById("NoteModerate_Ep");
    var NoteSevere_Ep = document.getElementById("NoteSevere_Ep");

    // เพิ่ม Event Listener สำหรับ radio inputs
    flexCheckMild_Ep.addEventListener("change", function () {
        if (flexCheckMild_Ep.checked) {
            // เมื่อ radio input "Mild" ถูกเลือก
            btnMild_Ep.disabled = false; // เปิด checkbox Mild
            NoteMild_Ep.disabled = false; // เปิด textarea Mild
            btnModerate_Ep.disabled = true; // ปิด checkbox Moderate
            NoteModerate_Ep.disabled = true; // ปิด textarea Moderate
            btnSevere_Ep.disabled = true; // ปิด checkbox Severe
            NoteSevere_Ep.disabled = true; // ปิด textarea Severe
        }
    });
    flexCheckModerate_Ep.addEventListener("change", function () {
        if (flexCheckModerate_Ep.checked) {
            // เมื่อ radio input "Moderate" ถูกเลือก
            btnMild_Ep.disabled = true; // ปิด checkbox Mild
            NoteMild_Ep.disabled = true; // ปิด textarea Mild
            btnModerate_Ep.disabled = false; // เปิด checkbox Moderate
            NoteModerate_Ep.disabled = false; // เปิด textarea Moderate
            btnSevere_Ep.disabled = true; // ปิด checkbox Severe
            NoteSevere_Ep.disabled = true; // ปิด textarea Severe
        }
    });
    flexCheckSevere_Ep.addEventListener("change", function () {
        if (flexCheckSevere_Ep.checked) {
            // เมื่อ radio input "Severe" ถูกเลือก
            btnMild_Ep.disabled = true; // ปิด checkbox Mild
            NoteMild_Ep.disabled = true; // ปิด textarea Mild
            btnModerate_Ep.disabled = true; // ปิด checkbox Moderate
            NoteModerate_Ep.disabled = true; // ปิด textarea Moderate
            btnSevere_Ep.disabled = false; // เปิด checkbox Severe
            NoteSevere_Ep.disabled = false; // เปิด textarea Severe
        }
    });

    /////PD
    var flexCheckMild_PD = document.getElementById("flexCheckMild_PD");
    var flexCheckModerate_PD = document.getElementById("flexCheckModerate_PD");
    var flexCheckSevere_PD = document.getElementById("flexCheckSevere_PD");

    var btnMild_PD = document.getElementById("btnMild_PD");
    var btnModerate_PD = document.getElementById("btnModerate_PD");
    var btnSevere_PD = document.getElementById("btnSevere_PD");

    var NoteMild_PD = document.getElementById("NoteMild_PD");
    var NoteModerate_PD = document.getElementById("NoteModerate_PD");
    var NoteSevere_PD = document.getElementById("NoteSevere_PD");

    // เพิ่ม Event Listener สำหรับ radio inputs
    flexCheckMild_PD.addEventListener("change", function () {
        if (flexCheckMild_PD.checked) {
            // เมื่อ radio input "Mild" ถูกเลือก
            btnMild_PD.disabled = false; // เปิด checkbox Mild
            NoteMild_PD.disabled = false; // เปิด textarea Mild
            btnModerate_PD.disabled = true; // ปิด checkbox Moderate
            NoteModerate_PD.disabled = true; // ปิด textarea Moderate
            btnSevere_PD.disabled = true; // ปิด checkbox Severe
            NoteSevere_PD.disabled = true; // ปิด textarea Severe
        }
    });
    flexCheckModerate_PD.addEventListener("change", function () {
        if (flexCheckModerate_PD.checked) {
            // เมื่อ radio input "Moderate" ถูกเลือก
            btnMild_PD.disabled = true; // ปิด checkbox Mild
            NoteMild_PD.disabled = true; // ปิด textarea Mild
            btnModerate_PD.disabled = false; // เปิด checkbox Moderate
            NoteModerate_PD.disabled = false; // เปิด textarea Moderate
            btnSevere_PD.disabled = true; // ปิด checkbox Severe
            NoteSevere_PD.disabled = true; // ปิด textarea Severe
        }
    });
    flexCheckSevere_PD.addEventListener("change", function () {
        if (flexCheckSevere_PD.checked) {
            // เมื่อ radio input "Severe" ถูกเลือก
            btnMild_PD.disabled = true; // ปิด checkbox Mild
            NoteMild_PD.disabled = true; // ปิด textarea Mild
            btnModerate_PD.disabled = true; // ปิด checkbox Moderate
            NoteModerate_PD.disabled = true; // ปิด textarea Moderate
            btnSevere_PD.disabled = false; // เปิด checkbox Severe
            NoteSevere_PD.disabled = false; // เปิด textarea Severe
        }
    });

    /////Haemato
    var flexCheckMild_HA = document.getElementById("flexCheckMild_Haemato");
    var flexCheckModerate_HA = document.getElementById("flexCheckModerate_Haemato");
    var flexCheckSevere_HA = document.getElementById("flexCheckSevere_Haemato");

    var btnMild_HA = document.getElementById("btnMild_HA");
    var btnModerate_HA = document.getElementById("btnModerate_HA");
    var btnSevere_HA = document.getElementById("btnSevere_HA");

    var NoteMild_HA = document.getElementById("NoteMild_HA");
    var NoteModerate_HA = document.getElementById("NoteModerate_HA");
    var NoteSevere_HA = document.getElementById("NoteSevere_HA");

    // เพิ่ม Event Listener สำหรับ radio inputs
    flexCheckMild_HA.addEventListener("change", function () {
        if (flexCheckMild_HA.checked) {
            // เมื่อ radio input "Mild" ถูกเลือก
            btnMild_HA.disabled = false; // เปิด checkbox Mild
            NoteMild_HA.disabled = false; // เปิด textarea Mild
            btnModerate_HA.disabled = true; // ปิด checkbox Moderate
            NoteModerate_HA.disabled = true; // ปิด textarea Moderate
            btnSevere_HA.disabled = true; // ปิด checkbox Severe
            NoteSevere_HA.disabled = true; // ปิด textarea Severe
        }
    });
    flexCheckModerate_HA.addEventListener("change", function () {
        if (flexCheckModerate_HA.checked) {
            // เมื่อ radio input "Moderate" ถูกเลือก
            btnMild_HA.disabled = true; // ปิด checkbox Mild
            NoteMild_HA.disabled = true; // ปิด textarea Mild
            btnModerate_HA.disabled = false; // เปิด checkbox Moderate
            NoteModerate_HA.disabled = false; // เปิด textarea Moderate
            btnSevere_HA.disabled = true; // ปิด checkbox Severe
            NoteSevere_HA.disabled = true; // ปิด textarea Severe
        }
    });
    flexCheckSevere_HA.addEventListener("change", function () {
        if (flexCheckSevere_HA.checked) {
            // เมื่อ radio input "Severe" ถูกเลือก
            btnMild_HA.disabled = true; // ปิด checkbox Mild
            NoteMild_HA.disabled = true; // ปิด textarea Mild
            btnModerate_HA.disabled = true; // ปิด checkbox Moderate
            NoteModerate_HA.disabled = true; // ปิด textarea Moderate
            btnSevere_HA.disabled = false; // เปิด checkbox Severe
            NoteSevere_HA.disabled = false; // เปิด textarea Severe
        }
    });

    /////CA
    var flexCheckMild_CA = document.getElementById("flexCheckMild_CA");
    var flexCheckModerate_CA = document.getElementById("flexCheckModerate_CA");
    var flexCheckSevere_CA = document.getElementById("flexCheckSevere_CA");

    var btnMild_CA1 = document.getElementById("btnMild_CA1");
    var btnMild_CA2 = document.getElementById("btnMild_CA2");
    var btnModerate_CA1 = document.getElementById("btnModerate_CA1");
    var btnModerate_CA2 = document.getElementById("btnModerate_CA2");
    var btnSevere_CA1 = document.getElementById("btnSevere_CA1");
    var btnSevere_CA2 = document.getElementById("btnSevere_CA2");

    var NoteMild_CA = document.getElementById("NoteMild_CA");
    var NoteModerate_CA = document.getElementById("NoteModerate_CA");
    var NoteSevere_CA = document.getElementById("NoteSevere_CA");

    // เพิ่ม Event Listener สำหรับ radio inputs
    flexCheckMild_CA.addEventListener("change", function () {
        if (flexCheckMild_CA.checked) {
            // เมื่อ radio input "Mild" ถูกเลือก
            btnMild_CA1.disabled = false; // เปิด checkbox Mild
            btnMild_CA2.disabled = false; // เปิด checkbox Mild
            NoteMild_CA.disabled = false; // เปิด textarea Mild
            btnModerate_CA1.disabled = true; // ปิด checkbox Moderate
            btnModerate_CA2.disabled = true; // ปิด checkbox Moderate
            NoteModerate_CA.disabled = true; // ปิด textarea Moderate
            btnSevere_CA1.disabled = true; // ปิด checkbox Severe
            btnSevere_CA2.disabled = true; // ปิด checkbox Severe
            NoteSevere_CA.disabled = true; // ปิด textarea Severe
        }
    });
    flexCheckModerate_CA.addEventListener("change", function () {
        if (flexCheckModerate_CA.checked) {
            // เมื่อ radio input "Moderate" ถูกเลือก
            btnMild_CA1.disabled = true; // ปิด checkbox Mild
            btnMild_CA2.disabled = true; // ปิด checkbox Mild
            NoteMild_CA.disabled = true; // ปิด textarea Mild
            btnModerate_CA1.disabled = false; // เปิด checkbox Moderate
            btnModerate_CA2.disabled = false; // เปิด checkbox Moderate
            NoteModerate_CA.disabled = false; // เปิด textarea Moderate
            btnSevere_CA1.disabled = true; // ปิด checkbox Severe
            btnSevere_CA2.disabled = true; // ปิด checkbox Severe
            NoteSevere_CA.disabled = true; // ปิด textarea Severe
        }
    });
    flexCheckSevere_CA.addEventListener("change", function () {
        if (flexCheckSevere_CA.checked) {
            // เมื่อ radio input "Severe" ถูกเลือก
            btnMild_CA1.disabled = true; // ปิด checkbox Mild
            btnMild_CA2.disabled = true; // ปิด checkbox Mild
            NoteMild_CA.disabled = true; // ปิด textarea Mild
            btnModerate_CA1.disabled = true; // ปิด checkbox Moderate
            btnModerate_CA2.disabled = true; // ปิด checkbox Moderate
            NoteModerate_CA.disabled = true; // ปิด textarea Moderate
            btnSevere_CA1.disabled = false; // เปิด checkbox Severe
            btnSevere_CA2.disabled = false; // เปิด checkbox Severe
            NoteSevere_CA.disabled = false; // เปิด textarea Severe
        }
    });

    /////Alz
    var flexCheckMild_Alz = document.getElementById("flexCheckMild_Alz");
    var flexCheckModerate_Alz = document.getElementById("flexCheckModerate_Alz");
    var flexCheckSevere_Alz = document.getElementById("flexCheckSevere_Alz");

    var btnSevere_Alz1 = document.getElementById("btnSevere_Alz1");

    var NoteMild_Alz = document.getElementById("NoteMild_Alz");
    var NoteModerate_Alz = document.getElementById("NoteModerate_Alz");
    var NoteSevere_Alz = document.getElementById("NoteSevere_Alz");

    // เพิ่ม Event Listener สำหรับ radio inputs
    flexCheckMild_Alz.addEventListener("change", function () {
        if (flexCheckMild_Alz.checked) {
            // เมื่อ radio input "Mild" ถูกเลือก
            NoteMild_Alz.disabled = false; // เปิด textarea Mild
            NoteModerate_Alz.disabled = true; // ปิด textarea Moderate
            btnSevere_Alz1.disabled = true; // ปิด checkbox Severe
            NoteSevere_Alz.disabled = true; // ปิด textarea Severe
        }
    });
    flexCheckModerate_Alz.addEventListener("change", function () {
        if (flexCheckModerate_Alz.checked) {
            // เมื่อ radio input "Moderate" ถูกเลือก
            NoteMild_Alz.disabled = true; // ปิด textarea Mild
            NoteModerate_Alz.disabled = false; // เปิด textarea Moderate
            btnSevere_Alz1.disabled = true; // ปิด checkbox Severe
            NoteSevere_Alz.disabled = true; // ปิด textarea Severe
        }
    });
    flexCheckSevere_Alz.addEventListener("change", function () {
        if (flexCheckSevere_Alz.checked) {
            // เมื่อ radio input "Severe" ถูกเลือก
            NoteMild_Alz.disabled = true; // ปิด textarea Mild
            NoteModerate_Alz.disabled = true; // ปิด textarea Moderate
            btnSevere_Alz1.disabled = false; // เปิด checkbox Severe
            NoteSevere_Alz.disabled = false; // เปิด textarea Severe
        }
    });

    /////PK
    var flexCheckMild_PK = document.getElementById("flexCheckMild_PK");
    var flexCheckModerate_PK = document.getElementById("flexCheckModerate_PK");
    var flexCheckSevere_PK = document.getElementById("flexCheckSevere_PK");

    var btnSevere_PK1 = document.getElementById("btnSevere_PK1");

    var NoteMild_PK = document.getElementById("NoteMild_PK");
    var NoteModerate_PK = document.getElementById("NoteModerate_PK");
    var NoteSevere_PK = document.getElementById("NoteSevere_PK");

    // เพิ่ม Event Listener สำหรับ radio inputs
    flexCheckMild_PK.addEventListener("change", function () {
        if (flexCheckMild_PK.checked) {
            // เมื่อ radio input "Mild" ถูกเลือก
            NoteMild_PK.disabled = false; // เปิด textarea Mild
            NoteModerate_PK.disabled = true; // ปิด textarea Moderate
            btnSevere_PK1.disabled = true; // ปิด checkbox Severe
            NoteSevere_PK.disabled = true; // ปิด textarea Severe
        }
    });
    flexCheckModerate_PK.addEventListener("change", function () {
        if (flexCheckModerate_PK.checked) {
            // เมื่อ radio input "Moderate" ถูกเลือก
            NoteMild_PK.disabled = true; // ปิด textarea Mild
            NoteModerate_PK.disabled = false; // เปิด textarea Moderate
            btnSevere_PK1.disabled = true; // ปิด checkbox Severe
            NoteSevere_PK.disabled = true; // ปิด textarea Severe
        }
    });
    flexCheckSevere_PK.addEventListener("change", function () {
        if (flexCheckSevere_PK.checked) {
            // เมื่อ radio input "Severe" ถูกเลือก
            NoteMild_PK.disabled = true; // ปิด textarea Mild
            NoteModerate_PK.disabled = true; // ปิด textarea Moderate
            btnSevere_PK1.disabled = false; // เปิด checkbox Severe
            NoteSevere_PK.disabled = false; // เปิด textarea Severe
        }
    });

    /////DEM
    var flexCheckMild_DEM = document.getElementById("flexCheckMild_DEM");
    var flexCheckModerate_DEM = document.getElementById("flexCheckModerate_DEM");
    var flexCheckSevere_DEM = document.getElementById("flexCheckSevere_DEM");

    var btnSevere_DEM1 = document.getElementById("btnSevere_DEM1");

    var NoteMild_DEM = document.getElementById("NoteMild_DEM");
    var NoteModerate_DEM = document.getElementById("NoteModerate_DEM");
    var NoteSevere_DEM = document.getElementById("NoteSevere_DEM");

    // เพิ่ม Event Listener สำหรับ radio inputs
    flexCheckMild_DEM.addEventListener("change", function () {
        if (flexCheckMild_DEM.checked) {
            // เมื่อ radio input "Mild" ถูกเลือก
            NoteMild_DEM.disabled = false; // เปิด textarea Mild
            NoteModerate_DEM.disabled = true; // ปิด textarea Moderate
            btnSevere_DEM1.disabled = true; // ปิด checkbox Severe
            NoteSevere_DEM.disabled = true; // ปิด textarea Severe
        }
    });
    flexCheckModerate_DEM.addEventListener("change", function () {
        if (flexCheckModerate_DEM.checked) {
            // เมื่อ radio input "Moderate" ถูกเลือก
            NoteMild_DEM.disabled = true; // ปิด textarea Mild
            NoteModerate_DEM.disabled = false; // เปิด textarea Moderate
            btnSevere_DEM1.disabled = true; // ปิด checkbox Severe
            NoteSevere_DEM.disabled = true; // ปิด textarea Severe
        }
    });
    flexCheckSevere_DEM.addEventListener("change", function () {
        if (flexCheckSevere_DEM.checked) {
            // เมื่อ radio input "Severe" ถูกเลือก
            NoteMild_DEM.disabled = true; // ปิด textarea Mild
            NoteModerate_DEM.disabled = true; // ปิด textarea Moderate
            btnSevere_DEM1.disabled = false; // เปิด checkbox Severe
            NoteSevere_DEM.disabled = false; // เปิด textarea Severe
        }
    });

    /*Gout
    var flexCheckMild_Gout = document.getElementById("flexCheckMild_Gout");
    var flexCheckModerate_Gout = document.getElementById("flexCheckModerate_Gout");
    var flexCheckSevere_Gout = document.getElementById("flexCheckSevere_Gout");

    var btnMild_Gout = document.getElementById("btnMild_Gout");
    var btnModerate_Gout = document.getElementById("btnModerate_Gout");
    var btnSevere_Gout = document.getElementById("btnSevere_Gout");

    var NoteMild_Gout = document.getElementById("NoteMild_Gout");
    var NoteModerate_Gout = document.getElementById("NoteModerate_Gout");
    var NoteSevere_Gout = document.getElementById("NoteSevere_Gout");

    // เพิ่ม Event Listener สำหรับ radio inputs
    flexCheckMild_Gout.addEventListener("change", function () {
        if (flexCheckMild_Gout.checked) {
            // เมื่อ radio input "Mild" ถูกเลือก
            btnMild_Gout.disabled = false; // เปิด checkbox Mild
            NoteMild_Gout.disabled = false; // เปิด textarea Mild
            btnModerate_Gout.disabled = true; // ปิด checkbox Moderate
            NoteModerate_Gout.disabled = true; // ปิด textarea Moderate
            btnSevere_Gout.disabled = true; // ปิด checkbox Severe
            NoteSevere_Gout.disabled = true; // ปิด textarea Severe
        }
    });
    flexCheckModerate_Gout.addEventListener("change", function () {
        if (flexCheckModerate_Gout.checked) {
            // เมื่อ radio input "Moderate" ถูกเลือก
            btnMild_Gout.disabled = true; // ปิด checkbox Mild
            NoteMild_Gout.disabled = true; // ปิด textarea Mild
            btnModerate_Gout.disabled = false; // เปิด checkbox Moderate
            NoteModerate_Gout.disabled = false; // เปิด textarea Moderate
            btnSevere_Gout.disabled = true; // ปิด checkbox Severe
            NoteSevere_Gout.disabled = true; // ปิด textarea Severe
        }
    });
    flexCheckSevere_Gout.addEventListener("change", function () {
        if (flexCheckSevere_Gout.checked) {
            // เมื่อ radio input "Severe" ถูกเลือก
            btnMild_Gout.disabled = true; // ปิด checkbox Mild
            NoteMild_Gout.disabled = true; // ปิด textarea Mild
            btnModerate_Gout.disabled = true; // ปิด checkbox Moderate
            NoteModerate_Gout.disabled = true; // ปิด textarea Moderate
            btnSevere_Gout.disabled = false; // เปิด checkbox Severe
            NoteSevere_Gout.disabled = false; // เปิด textarea Severe
        }
    });*/

    /*////Stroke_non_IMC
    var flexCheckMild_Stroke_non_IMC = document.getElementById("flexCheckMild_Stroke_non_IMC");
    var flexCheckModerate_Stroke_non_IMC = document.getElementById("flexCheckModerate_Stroke_non_IMC");
    var flexCheckSevere_Stroke_non_IMC = document.getElementById("flexCheckSevere_Stroke_non_IMC");

    var NoteMild_Stroke_non_IMC = document.getElementById("NoteMild_Stroke_non_IMC");
    var NoteModerate_Stroke_non_IMC = document.getElementById("NoteModerate_Stroke_non_IMC");
    var NoteSevere_Stroke_non_IMC = document.getElementById("NoteSevere_Stroke_non_IMC");

    // เพิ่ม Event Listener สำหรับ radio inputs
    flexCheckMild_Stroke_non_IMC.addEventListener("change", function () {
        if (flexCheckMild_Stroke_non_IMC.checked) {
            // เมื่อ radio input "Mild" ถูกเลือก
            NoteMild_Stroke_non_IMC.disabled = false; // เปิด textarea Mild
            NoteModerate_Stroke_non_IMC.disabled = true; // ปิด textarea Moderate
            NoteSevere_Stroke_non_IMC.disabled = true; // ปิด textarea Severe
        }
    });
    flexCheckModerate_Stroke_non_IMC.addEventListener("change", function () {
        if (flexCheckModerate_Stroke_non_IMC.checked) {
            // เมื่อ radio input "Moderate" ถูกเลือก
            NoteMild_Stroke_non_IMC.disabled = true; // ปิด textarea Mild
            NoteModerate_Stroke_non_IMC.disabled = false; // เปิด textarea Moderate
            NoteSevere_Stroke_non_IMC.disabled = true; // ปิด textarea Severe
        }
    });
    flexCheckSevere_Stroke_non_IMC.addEventListener("change", function () {
        if (flexCheckSevere_Stroke_non_IMC.checked) {
            // เมื่อ radio input "Severe" ถูกเลือก
            NoteMild_Stroke_non_IMC.disabled = true; // ปิด textarea Mild
            NoteModerate_Stroke_non_IMC.disabled = true; // ปิด textarea Moderate
            NoteSevere_Stroke_non_IMC.disabled = false; // เปิด textarea Severe
        }
    });*/

    /*////Monk_StaffMed
    var flexCheckMild_Monk_StaffMed = document.getElementById("flexCheckMild_Monk_StaffMed");
    var flexCheckModerate_Monk_StaffMed = document.getElementById("flexCheckModerate_Monk_StaffMed");
    var flexCheckSevere_Monk_StaffMed = document.getElementById("flexCheckSevere_Monk_StaffMed");

    var NoteMild_Monk_StaffMed = document.getElementById("NoteMild_Monk_StaffMed");
    var NoteModerate_Monk_StaffMed = document.getElementById("NoteModerate_Monk_StaffMed");
    var NoteSevere_Monk_StaffMed = document.getElementById("NoteSevere_Monk_StaffMed");

    // เพิ่ม Event Listener สำหรับ radio inputs
    flexCheckMild_Monk_StaffMed.addEventListener("change", function () {
        if (flexCheckMild_Monk_StaffMed.checked) {
            // เมื่อ radio input "Mild" ถูกเลือก
            NoteMild_Monk_StaffMed.disabled = false; // เปิด textarea Mild
            NoteModerate_Monk_StaffMed.disabled = true; // ปิด textarea Moderate
            NoteSevere_Monk_StaffMed.disabled = true; // ปิด textarea Severe
        }
    });
    flexCheckModerate_Monk_StaffMed.addEventListener("change", function () {
        if (flexCheckModerate_Monk_StaffMed.checked) {
            // เมื่อ radio input "Moderate" ถูกเลือก
            NoteMild_Monk_StaffMed.disabled = true; // ปิด textarea Mild
            NoteModerate_Monk_StaffMed.disabled = false; // เปิด textarea Moderate
            NoteSevere_Monk_StaffMed.disabled = true; // ปิด textarea Severe
        }
    });
    flexCheckSevere_Monk_StaffMed.addEventListener("change", function () {
        if (flexCheckSevere_Monk_StaffMed.checked) {
            // เมื่อ radio input "Severe" ถูกเลือก
            NoteMild_Monk_StaffMed.disabled = true; // ปิด textarea Mild
            NoteModerate_Monk_StaffMed.disabled = true; // ปิด textarea Moderate
            NoteSevere_Monk_StaffMed.disabled = false; // เปิด textarea Severe
        }
    });*/

});