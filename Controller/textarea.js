
// สร้างฟังก์ชันเพื่อดึงข้อมูลจาก checkbox และนำข้อมูลไปใส่ใน textarea
function updateTextarea2(checkboxId, textareaId) {
    var checkbox = document.getElementById(checkboxId);
    var textarea = document.getElementById(textareaId);

    if (checkbox.checked) {
        // ถ้า checkbox ถูกเลือกให้ใช้ label และนำมาต่อกัน
        var label = document.querySelector('label[for="' + checkboxId + '"]').textContent;
        textarea.value = (textarea.value ? textarea.value + ', ' : '') + label;
    } else {
        // ถ้า checkbox ไม่ถูกเลือกให้ล้าง textarea
        textarea.value = '';
    }
}

// รายการของ checkbox และ textarea ที่คุณต้องการ
const checkboxList = [
    { checkboxId: "btnMild_COPD", textareaId: "NoteMild_COPD" },
    { checkboxId: "btnModerate_COPD", textareaId: "NoteModerate_COPD" },
    { checkboxId: "btnSevere_COPD", textareaId: "NoteSevere_COPD" },

    { checkboxId: "btnMild_asthma", textareaId: "NoteMild_asthma" },
    { checkboxId: "btnModerate_asthma", textareaId: "NoteModerate_asthma" },
    { checkboxId: "btnSevere_asthma", textareaId: "NoteSevere_asthma" },

    { checkboxId: "btnMild_HT", textareaId: "NoteMild_HT" },
    { checkboxId: "btnModerate_HT", textareaId: "NoteModerate_HT" },
    { checkboxId: "btnSevere_HT1", textareaId: "NoteSevere_HT" },
    { checkboxId: "btnSevere_HT2", textareaId: "NoteSevere_HT" },
    { checkboxId: "btnSevere_HT3", textareaId: "NoteSevere_HT" },
    { checkboxId: "btnSevere_HT4", textareaId: "NoteSevere_HT" },
    { checkboxId: "btnSevere_HT5", textareaId: "NoteSevere_HT" },
    { checkboxId: "btnSevere_HT6", textareaId: "NoteSevere_HT" },
    { checkboxId: "btnSevere_HT7", textareaId: "NoteSevere_HT" },
    { checkboxId: "btnSevere_HT8", textareaId: "NoteSevere_HT" },
    { checkboxId: "btnSevere_HT9", textareaId: "NoteSevere_HT" },
    { checkboxId: "btnSevere_HT10", textareaId: "NoteSevere_HT" },

    { checkboxId: "btnMild_DM1", textareaId: "NoteMild_DM" },
    { checkboxId: "btnMild_DM2", textareaId: "NoteMild_DM" },
    { checkboxId: "btnMild_DM3", textareaId: "NoteMild_DM" },
    { checkboxId: "btnModerate_DM1", textareaId: "NoteModerate_DM" },
    { checkboxId: "btnModerate_DM2", textareaId: "NoteModerate_DM" },
    { checkboxId: "btnModerate_DM3", textareaId: "NoteModerate_DM" },
    { checkboxId: "btnSevere_DM1", textareaId: "NoteSevere_DM" },
    { checkboxId: "btnSevere_DM2", textareaId: "NoteSevere_DM" },
    { checkboxId: "btnSevere_DM3", textareaId: "NoteSevere_DM" },
    { checkboxId: "btnSevere_DM4", textareaId: "NoteSevere_DM" },
    { checkboxId: "btnSevere_DM5", textareaId: "NoteSevere_DM" },
    { checkboxId: "btnSevere_DM6", textareaId: "NoteSevere_DM" },
    { checkboxId: "btnSevere_DM7", textareaId: "NoteSevere_DM" },
    { checkboxId: "btnSevere_DM8", textareaId: "NoteSevere_DM" },
    { checkboxId: "btnSevere_DM9", textareaId: "NoteSevere_DM" },
    { checkboxId: "btnSevere_DM10", textareaId: "NoteSevere_DM" },

    { checkboxId: "btnMild_Stroke", textareaId: "NoteMild_Stroke" },
    { checkboxId: "btnModerate_Stroke", textareaId: "NoteModerate_Stroke" },
    { checkboxId: "btnSevere_Stroke", textareaId: "NoteSevere_Stroke" },

    { checkboxId: "btnMild_CKD1", textareaId: "NoteMild_CKD" },
    { checkboxId: "btnMild_CKD2", textareaId: "NoteMild_CKD" },
    { checkboxId: "btnModerate_CKD1", textareaId: "NoteModerate_CKD" },
    { checkboxId: "btnModerate_CKD2", textareaId: "NoteModerate_CKD" },
    { checkboxId: "btnSevere_CKD1", textareaId: "NoteSevere_CKD" },
    { checkboxId: "btnSevere_CKD2", textareaId: "NoteSevere_CKD" },

    { checkboxId: "btnMild_AF1", textareaId: "NoteMild_AF" },
    { checkboxId: "btnMild_AF2", textareaId: "NoteMild_AF" },
    { checkboxId: "btnMild_AF3", textareaId: "NoteMild_AF" },
    { checkboxId: "btnMild_AF4", textareaId: "NoteMild_AF" },
    { checkboxId: "btnMild_AF5", textareaId: "NoteMild_AF" },
    { checkboxId: "btnMild_AF6", textareaId: "NoteMild_AF" },
    { checkboxId: "btnModerate_AF1", textareaId: "NoteModerate_AF" },
    { checkboxId: "btnModerate_AF2", textareaId: "NoteModerate_AF" },
    { checkboxId: "btnModerate_AF3", textareaId: "NoteModerate_AF" },
    { checkboxId: "btnModerate_AF4", textareaId: "NoteModerate_AF" },
    { checkboxId: "btnModerate_AF5", textareaId: "NoteModerate_AF" },
    { checkboxId: "btnModerate_AF6", textareaId: "NoteModerate_AF" },
    { checkboxId: "btnSevere_AF1", textareaId: "NoteSevere_AF" },
    { checkboxId: "btnSevere_AF2", textareaId: "NoteSevere_AF" },
    { checkboxId: "btnSevere_AF3", textareaId: "NoteSevere_AF" },
    { checkboxId: "btnSevere_AF4", textareaId: "NoteSevere_AF" },
    { checkboxId: "btnSevere_AF5", textareaId: "NoteSevere_AF" },
    { checkboxId: "btnSevere_AF6", textareaId: "NoteSevere_AF" },

    { checkboxId: "btnMild_TB", textareaId: "NoteMild_TB" },
    { checkboxId: "btnModerate_TB1", textareaId: "NoteModerate_TB" },
    { checkboxId: "btnModerate_TB2", textareaId: "NoteModerate_TB" },
    { checkboxId: "btnSevere_TB1", textareaId: "NoteSevere_TB" },
    { checkboxId: "btnSevere_TB2", textareaId: "NoteSevere_TB" },
    { checkboxId: "btnSevere_TB3", textareaId: "NoteSevere_TB" },

    { checkboxId: "btnMild_HIV", textareaId: "NoteMild_HIV" },
    { checkboxId: "btnModerate_HIV", textareaId: "NoteModerate_HIV" },
    { checkboxId: "btnSevere_HIV", textareaId: "NoteSevere_HIV" },

    { checkboxId: "btnMild_Ep", textareaId: "NoteMild_Ep" },
    { checkboxId: "btnModerate_Ep", textareaId: "NoteModerate_Ep" },
    { checkboxId: "btnSevere_Ep", textareaId: "NoteSevere_Ep" },

    { checkboxId: "btnMild_PD", textareaId: "NoteMild_PD" },
    { checkboxId: "btnModerate_PD", textareaId: "NoteModerate_PD" },
    { checkboxId: "btnSevere_PD", textareaId: "NoteSevere_PD" },

    { checkboxId: "btnMild_HA", textareaId: "NoteMild_HA" },
    { checkboxId: "btnModerate_HA", textareaId: "NoteModerate_HA" },
    { checkboxId: "btnSevere_HA", textareaId: "NoteSevere_HA" },

    { checkboxId: "btnMild_CA1", textareaId: "NoteMild_CA" },
    { checkboxId: "btnMild_CA2", textareaId: "NoteMild_CA" },
    { checkboxId: "btnModerate_CA1", textareaId: "NoteModerate_CA" },
    { checkboxId: "btnModerate_CA2", textareaId: "NoteModerate_CA" },
    { checkboxId: "btnSevere_CA1", textareaId: "NoteSevere_CA" },
    { checkboxId: "btnSevere_CA2", textareaId: "NoteSevere_CA" },

    { checkboxId: "btnSevere_Alz1", textareaId: "NoteSevere_Alz" },

    { checkboxId: "btnSevere_PK1", textareaId: "NoteSevere_PK" },

    { checkboxId: "btnSevere_DEM1", textareaId: "NoteSevere_DEM" },

    /*{ checkboxId: "btnMild_Gout", textareaId: "NoteMild_Gout" },
    { checkboxId: "btnModerate_Gout", textareaId: "NoteModerate_Gout" },
    { checkboxId: "btnSevere_Gout", textareaId: "NoteSevere_Gout" },*/
];

// เพิ่ม Event Listener สำหรับ checkbox แต่ละตัวโดยใช้ลูป forEach
checkboxList.forEach(function (checkboxItem) {
    const { checkboxId, textareaId } = checkboxItem;
    const checkbox = document.getElementById(checkboxId);
    checkbox.addEventListener("change", function () {
        updateTextarea2(checkboxId, textareaId);
    });
});



















