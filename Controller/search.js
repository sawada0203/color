// เมื่อเอกสารโหลดเสร็จ
$(document).ready(function () {
    // รับองค์ประกอบ input
    var searchInput = $("#searchInput");

    //console.log(searchInput);

    // รับค่าจาก input เมื่อปุ่มค้นหาถูกคลิก
    $(".btn-search").click(function () {
        var searchValue = searchInput.val();
        if (searchValue) {
            checkvnData(searchValue);
            //searchAndDisplayData(searchValue); // เรียกฟังก์ชัน searchAndDisplayData และส่งค่า searchValue
            //searchcheckDisplayData(searchValue);
            //searchdateDisplayData(searchValue);
        } else {
            // ค่า searchValue ว่างเปล่า
            // คุณสามารถแจ้งผู้ใช้หรือกระทำเพิมเติมตามความเหมาะสม
        }
    });

    document.getElementById('searchInput').addEventListener('keypress', function (event) {
        if (event.key === 'Enter') {
            event.preventDefault(); // ป้องกันการส่งฟอร์มอัตโนมัติ

            var searchValue = this.value; // กำหนดค่า searchValue จากค่าของ input
            if (searchValue) {
                checkvnData(searchValue);
                //searchAndDisplayData(searchValue);
                //searchcheckDisplayData(searchValue);
                //searchdateDisplayData(searchValue);
            } else {
                // ค่า searchValue ว่างเปล่า
            }

        }
    });
});


function checkvnData(searchValue) {
    $.ajax({
        url: 'Model/check_vn.php',
        type: 'POST',
        data: { HN: searchValue },
        success: function (response) {
            var data4 = response;
            var submitButton = document.getElementById('submitAllForms');
            var myModal = new bootstrap.Modal(document.getElementById('myModal'), {
                keyboard: false
            });

            if (data4 && data4.length > 0 && data4[0].hn.toLowerCase() === searchValue.toLowerCase()) {
                searchAndDisplayData(searchValue);
                searchcheckDisplayData(searchValue);
                searchdateDisplayData(searchValue);
                submitButton.disabled = false; // เปิดปุ่ม
            } else {
                myModal.show();
                submitButton.disabled = true; // ปิดปุ่ม
            }
    },
        error: function (error) {
            console.error('Error fetching data:', error);
        }
        });

    }

// ฟังก์ชันสำหรับค้นหาข้อมูลและแสดงผลใน HTML
function searchAndDisplayData(searchValue) {
    // ส่งค่าไปยัง PHP โดยใช้ AJAX
    $.ajax({
        url: 'Model/search.php',
        type: 'POST',
        data: { value: searchValue },
        success: function (response) {
            // นำข้อมูล JSON ที่ได้จาก PHP ที่เป็น Object
            //console.log('Data from search.php:', response);
            var data = response;

            //แสดงใน HTML
            /* var vstdate = data[0].vstdate;
 
             // แยกส่วนวันที่ออกจากกัน
             var parts = vstdate.split("-");
             var year = parseInt(parts[0], 10);
             var month = parseInt(parts[1], 10);
             var day = parseInt(parts[2], 10);
             
             // แปลงรูปแบบวันที่เป็น "01/01/2566 พ.ศ."
             var buddhistYear = year + 543;
             var formattedDate = day + "/" + month + "/" + buddhistYear;
             
             // ตั้งค่าข้อมูลใน element ที่มี ID "datetime"
             document.getElementById('datetime').innerHTML = formattedDate+' เวลา:'+data[0].vsttime;*/

            document.getElementById('hn').innerHTML = data[0].hn;
            document.getElementById('cid').innerHTML = data[0].cid;
            document.getElementById('vn').innerHTML = data[0].vn;
            document.getElementById('lastvisit').innerHTML = data[0].lastvisit;
            document.getElementById('fullname').innerHTML = data[0].fullname;
            document.getElementById('age').innerHTML = data[0].age;
            document.getElementById('gender').innerHTML = data[0].gender;
            document.getElementById('pmh').innerHTML = data[0].pmh;

            document.getElementById('clinic').innerHTML = data[0].clinic;
            var clinicElements = document.getElementsByTagName('clinic');
            if (data[0].clinic != null && data[0].clinic != undefined && data[0].clinic != '') {
                clinicElements.innerHTML = '-';
            } else {
                clinicElements.innerHTML = data[0].clinic;
            }

            document.getElementById('cc').innerHTML = data[0].cc;
            document.getElementById('icdname').innerHTML = data[0].icdname;
            document.getElementById('BP').innerHTML = data[0].bps + '/' + data[0].bpd;
            /*document.getElementById('hpi').innerHTML = data[0].hpi;*/
            document.getElementById('height').innerHTML = data[0].height + ' เซนติเมตร';
            document.getElementById('bw').innerHTML = data[0].bw + ' กิโลกรัม';
            document.getElementById('informaddr').innerHTML = data[0].informaddr;
            document.getElementById('bmi').innerHTML = data[0].bmi;

            var agentElement = document.getElementById('agent');
            if (data[0].agent !== null && data[0].agent !== undefined && data[0].agent !== '') {
                agentElement.innerHTML = data[0].agent;
                agentElement.style.color = 'red';
            } else {
                agentElement.innerHTML = 'ไม่มี';
            }

            var symptomElement = document.getElementById('symptom');
            if (data[0].symptom !== null && data[0].symptom !== undefined && data[0].symptom !== '') {
                symptomElement.innerHTML = data[0].symptom;
                symptomElement.style.color = 'red';
            } else {
                symptomElement.innerHTML = 'ไม่มี';
            }


            // input ไป html ที่มี id=""
            document.getElementById('all-hn').value = data[0].hn;
            document.getElementById('all-cid').value = data[0].cid;
            document.getElementById('all-fullname').value = data[0].fullname;
            document.getElementById('all-age').value = data[0].age;
            document.getElementById('all-gender').value = data[0].gender;

            var icdnameElements = [
                'all-icdname',
                'all-icdname1',
                'all-icdname2',
                'all-icdname3',
                'all-icdname4',
                'all-icdname5'
            ];

            var icdnameData = [
                data[0].icdname,
                data[0].icdname1,
                data[0].icdname2,
                data[0].icdname3,
                data[0].icdname4,
                data[0].icdname5
            ];

            for (var i = 0; i < icdnameElements.length; i++) {
                var element = document.getElementById(icdnameElements[i]);
                var dataValue = icdnameData[i];

                if (dataValue !== null && dataValue !== undefined && dataValue !== '') {
                    element.value = dataValue;
                } else {
                    element.value = '-';
                }
            }

            var allAgentElement = document.getElementById('all-agent');
            if (data[0].agent !== null && data[0].agent !== undefined && data[0].agent !== '') {
                allAgentElement.innerHTML = data[0].agent;
                allAgentElement.style.color = 'red'; // ตัวสีแดง
            } else {
                allAgentElement.innerHTML = '-';
            }

            var allSymptomElement = document.getElementById('all-symptom');
            if (data[0].symptom !== null && data[0].symptom !== undefined && data[0].symptom !== '') {
                allSymptomElement.innerHTML = data[0].symptom;
                allSymptomElement.style.color = 'red'; // ตัวสีแดง
            } else {
                allSymptomElement.innerHTML = '-';
            }
        },

        error: function (error) {
            console.error('Error fetching data:', error);
        }

    });

}


////ประเมินของผู้ป่วย
function searchcheckDisplayData(searchValue) {

    // สร้างคำขอ AJAX ไปยัง PHP เพื่อดึงวันที่จากฐานข้อมูล
    $.ajax({
        url: "Model/check-in.php",
        method: "POST",
        data: { value3: searchValue }, // ส่งข้อมูลด้วยการร้องขอ POST
        dataType: "json",
        success: function (data) {

            data.forEach(function (data3) {

                //console.log(data3);

                if (data.length > 0) {

                    var ResultElement = document.getElementById('Result');
                    if (data3.app_csae !== null && data3.app_csae !== undefined && data3.app_csae !== '') {
                        if (data3.app_csae === '1') {
                            ResultElement.innerHTML = 'มาตามนัด ' + data3.app;
                        } else {
                            ResultElement.innerHTML = 'มาเอง ' + data3.app;
                        }
                    } else {
                        ResultElement.innerHTML = 'ผู้ป่วยไม่ได้ให้ข้อมูล';
                    }

                    var CCElement = document.getElementById('CC');
                    if (data3.cc !== null && data3.cc !== undefined && data3.cc !== '') {
                        CCElement.innerHTML = data3.cc;
                    } else {
                        CCElement.innerHTML = 'ผู้ป่วยไม่ได้ให้ข้อมูล';
                    }

                    var DaElement = document.getElementById('Drug_allergy');
                    if (data3.drug_allergy_type !== null && data3.drug_allergy_type !== undefined && data3.drug_allergy_type !== '') {
                        if (data3.drug_allergy_type === '1') {
                            DaElement.innerHTML = 'ไม่แพ้ยา';
                        } else {
                            DaElement.innerHTML = 'แพ้ยา ' + data3.drug_allergy;
                        }
                    } else {
                        DaElement.innerHTML = 'ผู้ป่วยไม่ได้ให้ข้อมูล';
                    }

                    var CdElement = document.getElementById('Congenital_disease');
                    if (data3.clinic !== null && data3.clinic !== undefined && data3.clinic !== '') {
                        CdElement.innerHTML = data3.clinic;
                    } else {
                        CdElement.innerHTML = 'ผู้ป่วยไม่ได้ให้ข้อมูล';
                    }

                    var PtnoteElement = document.getElementById('Pt_note');
                    if (data3.pt_note !== null && data3.pt_note !== undefined && data3.pt_note !== '') {
                        PtnoteElement.innerHTML = data3.pt_note;
                    } else {
                        PtnoteElement.innerHTML = 'ผู้ป่วยไม่ได้ให้ข้อมูล';
                    }

                    var ptcolorSelect = document.getElementById('colorSelect');
                    if (data3.pt_color !== null && data3.pt_color !== undefined && data3.pt_color !== '') {
                        ptcolorSelect.value = data3.pt_color;
                    }


                } else {

                    document.getElementById('Result').innerHTML = 'ผู้ป่วยไม่ได้ให้ข้อมูล';
                    document.getElementById('CC').innerHTML = 'ผู้ป่วยไม่ได้ให้ข้อมูล';
                    document.getElementById('Drug_allergy').innerHTML = 'ผู้ป่วยไม่ได้ให้ข้อมูล';
                    document.getElementById('Congenital_disease').innerHTML = 'ผู้ป่วยไม่ได้ให้ข้อมูล';
                    document.getElementById('Pt_note').innerHTML = 'ผู้ป่วยไม่ได้ให้ข้อมูล';
                }
            });
        },

        error: function (xhr, status, error) {
            console.error("เกิดข้อผิดพลาด: " + error);
        }
    });
}


////วันที่
function searchdateDisplayData(searchValue) {

    // สร้างคำขอ AJAX ไปยัง PHP เพื่อดึงวันที่จากฐานข้อมูล
    $.ajax({
        url: "Model/get_date.php",
        method: "POST",
        data: { value2: searchValue }, // ส่งข้อมูลด้วยการร้องขอ POST
        dataType: "json",
        success: function (data) {
            //console.log('Data from get_date.php:', data);
            // แปลงรูปแบบวันที่เป็น พ.ศ. และแทนที่ใน <select>
            $("#date_select").empty(); // ล้างตัวเลือกเดิม
            data.forEach(function (row) {

                var vstdate = row.vstdate; // ดึงค่า vstdate จากฟิลด์ vstdate ในแต่ละแถว
                //console.log(vstdate);

                var buddhistYear = convertToBuddhistYear(vstdate); // แปลงเป็น พ.ศ.
                $("<option>").val(vstdate).text(buddhistYear).appendTo("#date_select");


            });
        },
        error: function (xhr, status, error) {
            console.error("เกิดข้อผิดพลาด: " + error);
        }
    });

    $("#date_select").on("change", function () {
        var selectedDate = $(this).val(); // ดึงค่า value ของตัวเลือกที่ถูกเลือก

        /*console.log(selectedDate);
        console.log(searchValue);*/

        // ตรวจสอบว่า selectedDate มีค่าหรือไม่
        if (selectedDate) {
            // ส่งคำขอ AJAX โดยใช้ selectedDate ในการค้นหาข้อมูล

            /*document.getElementById('clinic').innerHTML = '';
            document.getElementById('cc').innerHTML = '';
            document.getElementById('icdname').innerHTML = '';*/

            $.ajax({
                url: "Model/get_data.php",
                method: "POST",
                data: {
                    date: selectedDate,
                    value2: searchValue
                },
                dataType: "json",
                success: function (data2) {

                    // ทำอะไรกับข้อมูลที่ได้รับ
                    // เช่น แสดงข้อมูลใน HTML
                    //console.log(data2);

                    // เคลียข้อมูลเก่าออกจาก HTML ก่อนแสดงข้อมูลใหม่
                    document.getElementById('clinic').innerHTML = '';
                    document.getElementById('cc').innerHTML = '';
                    document.getElementById('icdname').innerHTML = '';

                    data2.forEach(function (row2) {
                        //console.log(row2);

                        // ตั้งค่าข้อมูลใน HTML โดยใช้ข้อมูลที่ได้จาก AJAX
                        document.getElementById('clinic').innerHTML = row2.clinic;
                        document.getElementById('cc').innerHTML = row2.cc;
                        document.getElementById('icdname').innerHTML = row2.icdname;
                    });
                },
                error: function (xhr, status, error) {
                    console.error("เกิดข้อผิดพลาด: " + error);
                }
            });
        }
    });

}

//ฟังก์ชันเพื่อแปลงรูปแบบค.ศ. เป็นรูปแบบพ.ศ.
function convertToBuddhistYear(gregorianDate) {
    var parts = gregorianDate.split("-");
    var year = parseInt(parts[0], 10);
    var buddhistYear = year + 543; // ค.ศ. + 543 = พ.ศ.
    return parts[2] + "/" + parts[1] + "/" + buddhistYear;
}