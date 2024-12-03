document.addEventListener('DOMContentLoaded', function () {

    const EditButton = document.getElementById('Edit_Button');

    EditButton.addEventListener('click', function () {

        const formData2 = new FormData();

        const hn = document.getElementById('hn').textContent;
        formData2.append('HN', hn);
        console.log(hn);

        const doctorcode = document.getElementById('doctorcode').value;
        formData2.append('Doctorcode', doctorcode);
        console.log(doctorcode);

        ///แจ้ง Alert
        var selectedColor = colorSelect.value;
        formData2.append('ColorSelect', selectedColor);
        console.log(selectedColor);


        // Save the selected color to the database
        // Placeholder for the save operation
        alert('บันทึกข้อมูล: เปลี่ยนสีเป็น = ' + selectedColor + ', HN : ' + hn);



        // ส่งข้อมูลไปยังหน้าปลายทาง (เช่นโดยใช้ fetch)
        fetch('Model/submit_pt.php', {
            method: 'POST',
            body: formData2
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