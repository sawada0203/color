document.addEventListener("DOMContentLoaded", function () {
    const submitAllFormsButton = document.getElementById('submitAllForms');

    submitAllFormsButton.addEventListener('click', function () {
        // รวมข้อมูลจากแบบฟอร์มทั้งหมด
        const formData = new FormData();

        //ข้อมูลform-main
        const vn = document.getElementById('vn').textContent;
        formData.append('VN', vn);

        const hn = document.getElementById('hn').textContent;
        formData.append('HN', hn);

        const lastvisit = document.getElementById('lastvisit').textContent;
        formData.append('lastvisit', lastvisit)

        const Note = document.getElementById('Note');
        formData.append('Note', Note.value);

        //เวลา
        const currentTimestamp = Math.floor(Date.now() / 1000); // หารด้วย 1000 เพื่อแปลงเป็นวินาที
        formData.append('timestamp', currentTimestamp);

        // main สี
        const colorAI = document.getElementById('colorV').textContent;
        formData.append('colorAI', colorAI);

        //console.log(colorAI);

        // ดึงค่า $CL จาก <span id="selectedColor">
        const selectedColor = document.getElementById('selectedColor').textContent;
        formData.append('selectedColor', selectedColor);

        //console.log(selectedColor);

        // ดึงค่า totalsoreAll จาก <input>
        const totalsoreAll = document.getElementById('totalsoreAll').value;
        formData.append('totalsoreAll', totalsoreAll);

        //console.log(totalsoreAll);

        // ผู้ส่งตรวจ
        const user_name = document.getElementById('user_name').value;
        formData.append('user_name', user_name);

        //console.log(user_name);

        const doctorcode = document.getElementById('doctorcode').value;
        formData.append('doctorcode', doctorcode);

        //console.log(doctorcode);

        const hos_guid = document.getElementById('hos_guid').value;
        formData.append('hos_guid', hos_guid);

        //console.log(hos_guid);

        ////////////////////////////////////////////// รวมข้อมูลจากแบบฟอร์ม COPD
        const copdForm = document.getElementById('form-copd');
        const copdInputs = copdForm.querySelectorAll('textarea');
        copdInputs.forEach(input => {
            formData.append(input.name, input.value);
        });
        // รวมข้อมูล radio input ที่มีค่า value COPD
        const radioCOPD = copdForm.querySelector("input[type='radio'][name='RadioCOPD']:checked");
        if (radioCOPD) {
            const value = radioCOPD.value;
            formData.append('RadioCOPD', value);
        }

        ////////////////////////////////////////////// รวมข้อมูลจากแบบฟอร์ม Asthma
        const asthmaForm = document.getElementById('form-asthma');
        const asthmaInputs = asthmaForm.querySelectorAll('textarea');
        asthmaInputs.forEach(input => {
            formData.append(input.name, input.value);
        });
        // รวมข้อมูล radio input ที่มีค่า value Asthma
        const radioAsthma = asthmaForm.querySelector("input[type='radio'][name='RadioAsthma']:checked");
        if (radioAsthma) {
            const value = radioAsthma.value;
            formData.append('RadioAsthma', value);
        }

        ////////////////////////////////////////////// รวมข้อมูลจากแบบฟอร์ม HT
        const HTForm = document.getElementById('form-HT');
        const HTInputs = HTForm.querySelectorAll('textarea');
        HTInputs.forEach(input => {
            formData.append(input.name, input.value);
        });
        // รวมข้อมูล radio input ที่มีค่า value HT
        const radioHT = HTForm.querySelector("input[type='radio'][name='RadioHT']:checked");
        if (radioHT) {
            const value = radioHT.value;
            formData.append('RadioHT', value);
        }

        ////////////////////////////////////////////// รวมข้อมูลจากแบบฟอร์ม DM
        const DMForm = document.getElementById('form-DM');
        const DMInputs = DMForm.querySelectorAll('textarea');
        DMInputs.forEach(input => {
            formData.append(input.name, input.value);
        });
        // รวมข้อมูล radio input ที่มีค่า value DM
        const radioDM = DMForm.querySelector("input[type='radio'][name='RadioDM']:checked");
        if (radioDM) {
            const value = radioDM.value;
            formData.append('RadioDM', value);
        }

        ////////////////////////////////////////////// รวมข้อมูลจากแบบฟอร์ม Stroke
        const StrokeForm = document.getElementById('form-Stroke');
        const StrokeInputs = StrokeForm.querySelectorAll('textarea');
        StrokeInputs.forEach(input => {
            formData.append(input.name, input.value);
        });
        // รวมข้อมูล radio input ที่มีค่า value Stroke
        const radioStroke = StrokeForm.querySelector("input[type='radio'][name='RadioStroke']:checked");
        if (radioStroke) {
            const value = radioStroke.value;
            formData.append('RadioStroke', value);
        }

        ////////////////////////////////////////////// รวมข้อมูลจากแบบฟอร์ม CKD
        const CKDForm = document.getElementById('form-CKD');
        const CKDInputs = CKDForm.querySelectorAll('textarea');
        CKDInputs.forEach(input => {
            formData.append(input.name, input.value);
        });
        // รวมข้อมูล radio input ที่มีค่า value CKD
        const radioCKD = CKDForm.querySelector("input[type='radio'][name='RadioCKD']:checked");
        if (radioCKD) {
            const value = radioCKD.value;
            formData.append('RadioCKD', value);
        }

        ////////////////////////////////////////////// รวมข้อมูลจากแบบฟอร์ม AF
        const AFForm = document.getElementById('form-AF');
        const AFInputs = AFForm.querySelectorAll('textarea');
        AFInputs.forEach(input => {
            formData.append(input.name, input.value);
        });
        // รวมข้อมูล radio input ที่มีค่า value AF
        const radioAF = AFForm.querySelector("input[type='radio'][name='RadioAF']:checked");
        if (radioAF) {
            const value = radioAF.value;
            formData.append('RadioAF', value);
        }

        ////////////////////////////////////////////// รวมข้อมูลจากแบบฟอร์ม TB
        const TBForm = document.getElementById('form-TB');
        const TBInputs = TBForm.querySelectorAll('textarea');
        TBInputs.forEach(input => {
            formData.append(input.name, input.value);
        });
        // รวมข้อมูล radio input ที่มีค่า value TB
        const radioTB = TBForm.querySelector("input[type='radio'][name='RadioAF']:checked");
        if (radioTB) {
            const value = radioTB.value;
            formData.append('RadioTB', value);
        }

        ////////////////////////////////////////////// รวมข้อมูลจากแบบฟอร์ม HIV
        const HIVForm = document.getElementById('form-HIV');
        const HIVInputs = HIVForm.querySelectorAll('textarea');
        HIVInputs.forEach(input => {
            formData.append(input.name, input.value);
        });
        // รวมข้อมูล radio input ที่มีค่า value HIV
        const radioHIV = HIVForm.querySelector("input[type='radio'][name='RadioHIV']:checked");
        if (radioHIV) {
            const value = radioHIV.value;
            formData.append('RadioHIV', value);
        }

        ////////////////////////////////////////////// รวมข้อมูลจากแบบฟอร์ม Ep
        const EpForm = document.getElementById('form-Ep');
        const EpInputs = EpForm.querySelectorAll('textarea');
        EpInputs.forEach(input => {
            formData.append(input.name, input.value);
        });
        // รวมข้อมูล radio input ที่มีค่า value Ep
        const radioEp = EpForm.querySelector("input[type='radio'][name='RadioEp']:checked");
        if (radioEp) {
            const value = radioEp.value;
            formData.append('RadioEp', value);
        }

        ////////////////////////////////////////////// รวมข้อมูลจากแบบฟอร์ม PD
        const PDForm = document.getElementById('form-PD');
        const PDInputs = PDForm.querySelectorAll('textarea');
        PDInputs.forEach(input => {
            formData.append(input.name, input.value);
        });
        // รวมข้อมูล radio input ที่มีค่า value PD
        const radioPD = PDForm.querySelector("input[type='radio'][name='RadioPD']:checked");
        if (radioPD) {
            const value = radioPD.value;
            formData.append('RadioPD', value);
        }

        ////////////////////////////////////////////// รวมข้อมูลจากแบบฟอร์ม HA
        const HAForm = document.getElementById('form-HA');
        const HAInputs = HAForm.querySelectorAll('textarea');
        HAInputs.forEach(input => {
            formData.append(input.name, input.value);
        });
        // รวมข้อมูล radio input ที่มีค่า value HA
        const radioHA = HAForm.querySelector("input[type='radio'][name='RadioHA']:checked");
        if (radioHA) {
            const value = radioHA.value;
            formData.append('RadioHA', value);
        }

        ////////////////////////////////////////////// รวมข้อมูลจากแบบฟอร์ม CA
        const CAForm = document.getElementById('form-CA');
        const CAInputs = CAForm.querySelectorAll('textarea');
        CAInputs.forEach(input => {
            formData.append(input.name, input.value);
        });
        // รวมข้อมูล radio input ที่มีค่า value CA
        const radioCA = CAForm.querySelector("input[type='radio'][name='RadioCA']:checked");
        if (radioCA) {
            const value = radioCA.value;
            formData.append('RadioCA', value);
        }

        ////////////////////////////////////////////// รวมข้อมูลจากแบบฟอร์ม Alz
        const AlzForm = document.getElementById('form-Alz');
        const AlzInputs = AlzForm.querySelectorAll('textarea');
        AlzInputs.forEach(input => {
            formData.append(input.name, input.value);
        });
        // รวมข้อมูล radio input ที่มีค่า value Alz
        const radioAlz = AlzForm.querySelector("input[type='radio'][name='RadioAlz']:checked");
        if (radioAlz) {
            const value = radioAlz.value;
            formData.append('RadioAlz', value);
        }

        ////////////////////////////////////////////// รวมข้อมูลจากแบบฟอร์ม PK
        const PKForm = document.getElementById('form-PK');
        const PKInputs = PKForm.querySelectorAll('textarea');
        PKInputs.forEach(input => {
            formData.append(input.name, input.value);
        });
        // รวมข้อมูล radio input ที่มีค่า value PK
        const radioPK = PKForm.querySelector("input[type='radio'][name='RadioPK']:checked");
        if (radioPK) {
            const value = radioPK.value;
            formData.append('RadioPK', value);
        }

        ////////////////////////////////////////////// รวมข้อมูลจากแบบฟอร์ม DEM
        const DEMForm = document.getElementById('form-DEM');
        const DEMInputs = DEMForm.querySelectorAll('textarea');
        DEMInputs.forEach(input => {
            formData.append(input.name, input.value);
        });
        // รวมข้อมูล radio input ที่มีค่า value DEM
        const radioDEM = DEMForm.querySelector("input[type='radio'][name='RadioDEM']:checked");
        if (radioDEM) {
            const value = radioDEM.value;
            formData.append('RadioDEM', value);
        }

        /*////////////////////////////////////////////// รวมข้อมูลจากแบบฟอร์ม Gout
        const GoutForm = document.getElementById('form-Gout');
        const GoutInputs = GoutForm.querySelectorAll('textarea');
        GoutInputs.forEach(input => {
            formData.append(input.name, input.value);
        });
        // รวมข้อมูล radio input ที่มีค่า value Gout
        const radioGout = GoutForm.querySelector("input[type='radio'][name='RadioGout']:checked");
        if (radioGout) {
            const value = radioGout.value;
            formData.append('RadioGout', value);
        }*/

        /*///////////////////////////////////////////// รวมข้อมูลจากแบบฟอร์ม Stroke_non_IMC
        const Stroke_non_IMCForm = document.getElementById('form-Stroke_non_IMC');
        const Stroke_non_IMCInputs = Stroke_non_IMCForm.querySelectorAll('textarea');
        Stroke_non_IMCInputs.forEach(input => {
            formData.append(input.name, input.value);
        });
        // รวมข้อมูล radio input ที่มีค่า value Stroke_non_IMC
        const radioStroke_non_IMC = Stroke_non_IMCForm.querySelector("input[type='radio'][name='RadioMonk_StaffMed']:checked");
        if (radioStroke_non_IMC) {
            const value = radioStroke_non_IMC.value;
            formData.append('RadioStroke_non_IMC', value);
        }

        ////////////////////////////////////////////// รวมข้อมูลจากแบบฟอร์ม Monk_StaffMed
        const Monk_StaffMedForm = document.getElementById('form-Monk_StaffMed');
        const Monk_StaffMedInputs = Monk_StaffMedForm.querySelectorAll('textarea');
        Monk_StaffMedInputs.forEach(input => {
            formData.append(input.name, input.value);
        });
        // รวมข้อมูล radio input ที่มีค่า value Monk_StaffMed
        const radioMonk_StaffMed = Monk_StaffMedForm.querySelector("input[type='radio'][name='RadioMonk_StaffMed']:checked");
        if (radioMonk_StaffMed) {
            const value = radioMonk_StaffMed.value;
            formData.append('RadioMonk_StaffMed', value); 
        }*/


        // ส่งข้อมูลไปยังหน้าปลายทาง (เช่นโดยใช้ fetch)
        fetch('Model/submit.php', {
            method: 'POST',
            body: formData
        })
            .then(response => response.text())
            .then(data => {
                //console.log(data);
            })
            .catch(error => {
                console.error('เกิดข้อผิดพลาดในการส่งข้อมูล: ', error);
            });
    });
});

document.getElementById('submitAllForms').addEventListener('click', function () {
    // ทำสิ่งที่คุณต้องการทำก่อนบันทึกข้อมูล

    // แสดงข้อความเสร็จสิ้น
    document.getElementById('successMessage').style.display = 'block';

    // ตั้งเวลาให้แสดงข้อความเป็นเวลา 5 วินาที (5000 มิลลิวินาที)
    setTimeout(function () {
        // ซ่อนข้อความ
        document.getElementById('successMessage').style.display = 'none';

        // รีโหลดหน้าเว็บใหม่
        window.location.reload();
    }, 3000); // 3000 มิลลิวินาที = 3 วินาที
});