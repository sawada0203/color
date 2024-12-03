document.addEventListener("DOMContentLoaded", function () {
    const confirmButton = document.getElementById("confirmButton");

    confirmButton.addEventListener("click", function () {
        // คำนวณผลรวมของค่าที่ถูกเลือกจากแต่ละแท็บ
        const selectedRadiosCOPD = document.querySelectorAll("input[type='radio'][name='RadioCOPD']:checked");
        const selectedRadiosAsthma = document.querySelectorAll("input[type='radio'][name='RadioAsthma']:checked");
        const selectedRadiosHT = document.querySelectorAll("input[type='radio'][name='RadioHT']:checked");
        const selectedRadiosDM = document.querySelectorAll("input[type='radio'][name='RadioDM']:checked");
        const selectedRadiosStroke = document.querySelectorAll("input[type='radio'][name='RadioStroke']:checked");
        const selectedRadiosCKD = document.querySelectorAll("input[type='radio'][name='RadioCKD']:checked");
        const selectedRadiosAF = document.querySelectorAll("input[type='radio'][name='RadioAF']:checked");
        const selectedRadiosTB = document.querySelectorAll("input[type='radio'][name='RadioTB']:checked");
        const selectedRadiosHIV = document.querySelectorAll("input[type='radio'][name='RadioHIV']:checked");
        const selectedRadiosEpilepsy = document.querySelectorAll("input[type='radio'][name='RadioEp']:checked");
        const selectedRadiosPD = document.querySelectorAll("input[type='radio'][name='RadioPD']:checked");
        const selectedRadiosHaemato = document.querySelectorAll("input[type='radio'][name='RadioHA']:checked");
        const selectedRadiosCA = document.querySelectorAll("input[type='radio'][name='RadioCA']:checked");
        const selectedRadiosAlz = document.querySelectorAll("input[type='radio'][name='RadioAlz']:checked");
        const selectedRadiosPK = document.querySelectorAll("input[type='radio'][name='RadioPK']:checked");
        const selectedRadiosDEM = document.querySelectorAll("input[type='radio'][name='RadioDEM']:checked");
        /*const selectedRadiosRefer = document.querySelectorAll("input[type='radio'][name='Refer']:checked");
        const selectedRadiosStaff = document.querySelectorAll("input[type='radio'][name='Staff']:checked");
        const selectedRadiosAPM_MED_ICU = document.querySelectorAll("input[type='radio'][name='APM_MED_ICU']:checked");
        const selectedRadiosConsult = document.querySelectorAll("input[type='radio'][name='Consult']:checked");
        const selectedRadiosIncome = document.querySelectorAll("input[type='radio'][name='Income']:checked");
        const selectedRadiosGout = document.querySelectorAll("input[type='radio'][name='RadioGout']:checked");
        const selectedRadiosStroke_non_IMC = document.querySelectorAll("input[type='radio'][name='RadioStroke_non_IMC']:checked");
        const selectedRadiosMonk_StaffMed = document.querySelectorAll("input[type='radio'][name='RadioMonk_StaffMed']:checked");*/

        let totalCOPD = calculateTotal(selectedRadiosCOPD);
        let totalAsthma = calculateTotal(selectedRadiosAsthma);
        let totalHT = calculateTotal(selectedRadiosHT);
        let totalDM = calculateTotal(selectedRadiosDM);
        let totalStroke = calculateTotal(selectedRadiosStroke);
        let totalCKD = calculateTotal(selectedRadiosCKD);
        let totalAF = calculateTotal(selectedRadiosAF);
        let totalTB = calculateTotal(selectedRadiosTB);
        let totalHIV = calculateTotal(selectedRadiosHIV);
        let totalEpilepsy = calculateTotal(selectedRadiosEpilepsy);
        let totalPD = calculateTotal(selectedRadiosPD);
        let totalHaemato = calculateTotal(selectedRadiosHaemato);
        let totalCA = calculateTotal(selectedRadiosCA);
        let totalAlz = calculateTotal(selectedRadiosAlz);
        let totalPK = calculateTotal(selectedRadiosPK);
        let totalDEM = calculateTotal(selectedRadiosDEM);
        /*let totalRefer = calculateTotal(selectedRadiosRefer);
        let totalStaff = calculateTotal(selectedRadiosStaff);
        let totalAPM_MED_ICU = calculateTotal(selectedRadiosAPM_MED_ICU);
        let totalConsult = calculateTotal(selectedRadiosConsult);
        let totalIncome = calculateTotal(selectedRadiosIncome);
        let totalGout = calculateTotal(selectedRadiosGout);
        let totalStroke_non_IMC = calculateTotal(selectedRadiosStroke_non_IMC);
        let totalMonk_StaffMed = calculateTotal(selectedRadiosMonk_StaffMed);*/

        let result = totalCOPD + totalAsthma + totalHT + totalDM + totalStroke + totalCKD + totalAF +
            totalTB + totalHIV + totalEpilepsy + totalPD + totalHaemato + totalCA + totalAlz + totalPK + totalDEM/*+ totalRefer + totalStaff +
            totalAPM_MED_ICU + totalConsult + totalIncome + totalGout + totalStroke_non_IMC + totalMonk_StaffMed*/;

        let allresult = totalCOPD + totalAsthma + totalStroke + totalCKD + totalAF +
            totalTB + totalHIV + totalEpilepsy + totalPD + totalHaemato + totalCA;

        let allresult2 = totalCOPD + totalAsthma + totalHT + totalDM + totalStroke + totalCKD + totalAF +
            totalTB + totalHIV + totalEpilepsy + totalPD + totalHaemato + totalCA;

        let colorValue;

        /*if (result <= 10) {
            colorValue = 'green';
        } else if (result <= 20) {
            colorValue = 'yellow';
        } else {
            colorValue = 'red';
        }*/

        /////////////////////////////////////////////////

        if (totalAlz && allresult2) {
            colorValue = 'red';

        } else if (totalPK && allresult2) {
            colorValue = 'red';

        } else if (totalDEM && allresult2) {
            colorValue = 'red';
            
        } else if (totalDM && totalHT && allresult) {
            colorValue = 'red';

        } else if (totalDM && totalHT && !allresult) {
            colorValue = 'yellow';

        } else if (totalDM) {
            if (totalDM === 1) {
                colorValue = 'green';
            } else if (totalDM === 2) {
                colorValue = 'yellow';
            } else {
                colorValue = 'red';
            }
        } else if (totalHT) {
            if (totalHT === 1) {
                colorValue = 'green';
            } else if (totalHT === 2) {
                colorValue = 'yellow';
            } else {
                colorValue = 'red';
            }
        } else if (totalCOPD) {
            if (totalCOPD === 1) {
                colorValue = 'green';
            } else if (totalCOPD === 2) {
                colorValue = 'yellow';
            } else {
                colorValue = 'red';
            }
        } else if (totalAsthma) {
            if (totalAsthma === 1) {
                colorValue = 'green';
            } else if (totalAsthma === 2) {
                colorValue = 'yellow';
            } else {
                colorValue = 'red';
            }
        } else if (totalStroke) {
            if (totalStroke === 1) {
                colorValue = 'green';
            } else if (totalStroke === 2) {
                colorValue = 'yellow';
            } else {
                colorValue = 'red';
            }
        } else if (totalCKD) {
            if (totalCKD === 1) {
                colorValue = 'green';
            } else if (totalCKD === 2) {
                colorValue = 'yellow';
            } else {
                colorValue = 'red';
            }
        } else if (totalAF) {
            if (totalAF === 1) {
                colorValue = 'green';
            } else if (totalAF === 2) {
                colorValue = 'yellow';
            } else {
                colorValue = 'red';
            }
        } else if (totalTB) {
            if (totalTB === 1) {
                colorValue = 'green';
            } else if (totalTB === 2) {
                colorValue = 'yellow';
            } else {
                colorValue = 'red';
            }
        } else if (totalHIV) {
            if (totalHIV === 1) {
                colorValue = 'green';
            } else if (totalHIV === 2) {
                colorValue = 'yellow';
            } else {
                colorValue = 'red';
            }
        } else if (totalHIV) {
            if (totalHIV === 1) {
                colorValue = 'green';
            } else if (totalHIV === 2) {
                colorValue = 'yellow';
            } else {
                colorValue = 'red';
            }
        } else if (totalEpilepsy) {
            if (totalEpilepsy === 1) {
                colorValue = 'green';
            } else if (totalEpilepsy === 2) {
                colorValue = 'yellow';
            } else {
                colorValue = 'red';
            }
        } else if (totalPD) {
            if (totalPD === 1) {
                colorValue = 'green';
            } else if (totalPD === 2) {
                colorValue = 'yellow';
            } else {
                colorValue = 'red';
            }
        } else if (totalHaemato) {
            if (totalHaemato === 1) {
                colorValue = 'green';
            } else if (totalHaemato === 2) {
                colorValue = 'yellow';
            } else {
                colorValue = 'red';
            }
        } else if (totalHaemato) {
            if (totalHaemato === 1) {
                colorValue = 'green';
            } else if (totalHaemato === 2) {
                colorValue = 'yellow';
            } else {
                colorValue = 'red';
            }
        } else if (totalCA) {
            if (totalCA === 1) {
                colorValue = 'green';
            } else if (totalCA === 2) {
                colorValue = 'yellow';
            } else {
                colorValue = 'red';
            }
        } else if (totalAlz) {
            if (totalAlz === 1) {
                colorValue = 'red';
            } else if (totalAlz === 2) {
                colorValue = 'red';
            } else {
                colorValue = 'red';
            }
        } else if (totalPK) {
            if (totalPK === 1) {
                colorValue = 'red';
            } else if (totalPK === 2) {
                colorValue = 'red';
            } else {
                colorValue = 'red';
            }
        } else if (totalDEM) {
            if (totalDEM === 1) {
                colorValue = 'red';
            } else if (totalDEM === 2) {
                colorValue = 'red';
            } else {
                colorValue = 'red';
            }
        }

        /////////////////////////////////////////////////


        // ส่งค่า colorValue ไปยัง main.php ผ่าน AJAX
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'View/main.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {

                // แปลงค่าสีเป็นภาษาไทย
                var colorValueTH;

                if (colorValue === 'green') {
                    colorValueTH = 'เขียว';
                } else if (colorValue === 'yellow') {
                    colorValueTH = 'เหลือง';
                } else {
                    colorValueTH = 'แดง';
                }

                // ตั้งค่าค่าที่ได้ใน <p id="colorV"></p>
                document.getElementById('colorV').textContent = colorValueTH;
                document.getElementById('totalsoreAll').value = result;
            }
        };
        xhr.send('color=' + colorValue); // ส่งค่า colorValue ไปยัง main.php


        // แสดงค่าสีบนหน้า index.php
        var colorBlock = document.getElementById('colorBlockAI');
        colorBlock.querySelector('.color-block').style.backgroundColor = colorValue;

        // แสดงผลรวมในแถบข้อความ
        //alert("ผลรวมคะแนนได้: " + result);
    });
});

function calculateTotal(selectedRadios) {
    let total = 0;
    selectedRadios.forEach(radio => {
        total += parseInt(radio.value);
    });
    return total;
}