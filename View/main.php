<?php

// เช็คว่าคีย์ "user" มีอยู่ในอาร์เรย์ $_SESSION หรือไม่
if (!isset($_SESSION['user'])) {
    $Full_Name = ''; // กำหนดค่าเริ่มต้นให้เป็นค่าว่าง
} else {
    $Full_Name = $_SESSION['user'];
}

if ($Full_Name === '') {
?>
    <script>
        window.location.href = "../login.php";
    </script>
<?php
} else {
?>
    <script>
        if (document.cookie.indexOf("alertShown") == -1) {
            document.cookie = "alertShown=true";
        }
    </script>
<?php

}

?>

<?php
$colorOptions = [
    ['name' => 'เขียว', 'value' => 'green'],
    ['name' => 'เหลือง', 'value' => 'yellow'],
    ['name' => 'แดง', 'value' => 'red']
];
$selectedColor = ['name' => ' ', 'value' => ' ']; // Default color

if (isset($_GET['color'])) {
    $colorValue = $_GET['color'];
    foreach ($colorOptions as $color) {
        if ($color['value'] === $colorValue) {
            $selectedColor = $color;
            break;
        }
    }
}
$CL = $selectedColor['name']; // Save the chosen color name in $CL variable
?>

<style>
    .block {
        background-color: <?php echo $selectedColor['value']; ?>;
        width: 100px;
        height: 100px;
        margin: 10px;
    }

    .color-option {
        display: inline-block;
        margin-right: 10px;
    }

    .color-option input[type="radio"] {
        display: none;
    }

    .color-option label {
        display: inline-block;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        cursor: pointer;
    }

    .color-option input[type="radio"]:checked+label {
        border: 2px solid #000;
    }
</style>

<div class="container-top">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#home">บันทึกข้อมูล</a>
        </li>
    </ul>

    <br>
    <form id="form-main">
        <div class="input-group" id="home">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="date-time">
                            วันที่ <span id="date"></span> เวลา <span id="time"></span> น.
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <form>
                        <div class="col">
                            <input type="search" id="searchInput" class="form-control rounded p-3" placeholder="ค้นหาโดยใช้ HN ให้ครบ 9 หลัก" aria-label="Search" aria-describedby="search-addon" />
                        </div>
                        <div class="col">
                            <button type="button" class="btn btn-primary btn-search">Search</button>
                            <button type="button" class="btn btn-light" onclick="clearData()">
                                เคลียร์ข้อมูล
                            </button>
                        </div>
                    </form>
                    <div class="col">
                        <h4>การประเมินผล ได้สี: <span id="colorV"></span></h4>
                        <div class="block" id="colorBlockAI">
                            <div class="color-block" style="background-color: white; width: 50px; height: 50px;"></div>
                            <input type="hidden" id="colorInput" name="color" value="">
                        </div>
                    </div>
                    <div class="col">
                        <br>
                        <div class="block" id="colorBlock"></div>
                        <h4>เลือกสี: <span id="selectedColor"><?php echo $CL; ?></span> </h4>
                        <?php
                        foreach ($colorOptions as $color) {
                            $isChecked = ($selectedColor['value'] === $color['value']) ? 'checked' : '';
                            echo '<div class="color-option">';
                            echo '<input type="radio" id="' . $color['value'] . '" name="color" value="' . $color['value'] . '" ' . $isChecked . '>';
                            echo '<label for="' . $color['value'] . '" style="background-color:' . $color['value'] . '"></label>';
                            echo $color['name'];
                            echo '</div>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <br>

        <div id="successMessage" class="hidden">
            <p>บันทึกข้อมูลเสร็จสิ้น</p>
        </div>
        <div id="errorMessage" class="hidden">
            <p id="errorText">ข้อผิดพลาด: ไม่สามารถบันทึกข้อมูลได้</p>
        </div>


        <div class="modal" id="myModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">แจ้งเตือน</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>ไม่มีข้อมูลการเปิด Visit. หรือ HN ไม่ถูกต้อง</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>


        <div class="v_main">
            <div class="row">
                <div class="col text-center pt-2">
                    <h4>ข้อมูลผู้ป่วยลงทะเบียนเอง<h4>
                            <hr>
                </div>
                <div class="row">
                    <div class="col ps-4">
                        <p><b>
                                <font size=4>เหตุผลที่มา: </font>
                            </b>
                            <font size=4 id="Result"></font>
                        </p>
                    </div>
                    <div class="col ps-4">
                        <p><b>
                                <font size=4>อาการที่มา: </font>
                            </b>
                            <font size=4 id="CC"></font>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col ps-4">
                        <p><b>
                                <font size=4>ประวัติแพ้ยา: </font>
                            </b>
                            <font size=4 id="Drug_allergy"></font>
                        </p>
                    </div>
                    <div class="col ps-4">
                        <p><b>
                                <font size=4>โรคประจำตัว: </font>
                            </b>
                            <font size=4 id="Congenital_disease"></font>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col ps-4">
                        <p><b>
                                <font size=4>ผู้ให้ข้อมูล: </font>
                            </b>
                            <font size=4 id="Pt_note"></font>
                        </p>
                    </div>
                    <div class="col ps-4">
                        <p><b>
                                <font size=4>สี:</font>
                                <select id="colorSelect" class="form-select" style="font-size: 16px; display: inline-block; width: auto;">
                                    <option value="">-----</option>
                                    <option value="เขียว" class="green-option">เขียว</option>
                                    <option value="เหลือง" class="yellow-option">เหลือง</option>
                                    <option value="แดง" class="red-option">แดง</option>
                                </select>
                            </b>
                            <button id="Edit_Button" class="btn btn-outline-warning" style="margin-left: 10px;">แก้ไขสี</button>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="v_main2">
            <div class="row">
                <div class="col divider">
                    <h4 class="text-center pt-2">ข้อมูลผู้ป่วย</h4>
                    <hr>
                    <div class="col text-start ps-3">
                        <p><b>
                                <font size=4> HN:&nbsp; </font>
                            </b>
                            <font size=4 id="hn"> </font>
                        </p>
                    </div>
                    <div class="col text-start ps-3">
                        <p><b>
                                <font size=4> VN:&nbsp; </font>
                            </b>
                            <font size=4 id="vn"> </font>
                        </p>
                    </div>
                    <div class="col text-start ps-3">
                        <p><b>
                                <font size=4> CID:&nbsp; </font>
                            </b>
                            <font size=4 id="cid"> </font>
                        </p>
                    </div>
                    <div class="col text-start ps-3">
                        <p><b>
                                <font size=4> ชื่อ-นามสกุล:&nbsp; </font>
                            </b>
                            <font size=4 id="fullname"> </font>
                        </p>
                    </div>
                    <div class="col text-start ps-3">
                        <p><b>
                                <font size=4> อายุ:&nbsp; </font>
                            </b>
                            <font size=4 id="age"> </font>
                        </p>
                    </div>
                    <div class="col text-start ps-3">
                        <p><b>
                                <font size=4> เพศ:&nbsp; </font>
                            </b>
                            <font size=4 id="gender"> </font>
                        </p>
                    </div>
                    <div class="col text-start ps-3">
                        <p><b>
                                <font size=4> ที่อยู่: </font>
                            </b>
                            <font size=4 id="informaddr"> </font>
                        </p>
                    </div>
                </div>
                <div class="col divider">
                    <h4 class="text-center pt-2">ข้อมูลสุขภาพ</h4>
                    <hr>
                    <div class="col text-start">
                        <p><b>
                                <font size=4> แพ้ยา:</font>
                            </b>
                            <font size=4 id="agent"></font>
                        </p>
                    </div>
                    <div class="col text-start">
                        <p><b>
                                <font size=4> อาการแพ้ยา:</font>
                            </b>
                            <font size=4 id="symptom"></font>
                        </p>
                    </div>
                    <div class="col text-start">
                        <p><b>
                                <font size=4> ส่วนสูง: </font>
                            </b>
                            <font size=4 id="height"> </font>
                        </p>
                    </div>
                    <div class="col text-start">
                        <p><b>
                                <font size=4> น้ำหนัก: </font>
                            </b>
                            <font size=4 id="bw"> </font>
                        </p>
                    </div>
                    <div class="col text-start">
                        <p><b>
                                <font size=4> BMI: </font>
                            </b>
                            <font size=4 id="bmi"> </font>
                        </p>
                    </div>
                    <div class="col text-start">
                        <p><b>
                                <font size=4> BP: </font>
                            </b>
                            <font size=4 id="BP"> </font>
                        </p>
                    </div>
                    <div class="col text-start">
                        <p><b>
                                <font size=4> โรคประจำตัว: </font>
                            </b>
                            <font size=4 id="pmh"> </font>
                        </p>
                    </div>
                </div>
                <div class="col">
                    <h4 class="text-center pt-2">ประวัติเดิม</h4>
                    <hr>
                    <div>
                        <label for="date_select">เลือกวันที่:</label>
                        <select id="date_select">
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="col text-start pt-3">
                        <p><b>
                                <font size=4> คลินิก:</font>
                            </b>
                            <font size=4 id="clinic"></font>
                        </p>
                    </div>
                    <div class="col text-start">
                        <p><b>
                                <font size=4> อาการที่มา:</font>
                            </b>
                            <font size=4 id="cc"></font>
                        </p>
                    </div>
                    <div class="col text-start">
                        <p><b>
                                <font size=4> วินิจฉัยโรค: </font>
                            </b>
                            <font size=4 id="icdname"></font>
                        </p>
                    </div>
                    <!--<div class="col text-start">
                        <p><b>
                                <font size=4> สี: </font>
                            </b>
                            <font size=4 id="C_Color"></font>
                        </p>
                    </div>-->
                </div>
            </div>
            <!--<div class="row ps-5">
                    <div class="col">
                        <br>
                        <div>
                            <p><b>
                                    <font size=4> HN:&nbsp; </font>
                                </b>
                                <font size=4 id="hn"> </font>
                            </p>
                        </div>
                        <div class="col">
                            <br>
                            <div>
                                <p><b>
                                        <font size=4> CID:&nbsp; </font>
                                    </b>
                                    <font size=4 id="cid"> </font>
                                </p>
                            </div>
                        </div>
                        <div class="col">
                            <br>
                            <div>
                                <p><b>
                                        <font size=4> VN:&nbsp; </font>
                                    </b>
                                    <font size=4 id="vn"> </font>
                                </p>
                            </div>
                        </div>
                        <div class="col">
                            <br>
                            <div>
                                <p><b>
                                        <font size=4> รักษาล่าสุด:&nbsp; </font>
                                    </b>
                                    <font size=4 id="datetime"> </font>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->

            <!--<div class="row ps-5">
                <div class="col">
                    <br><br>
                    <div>
                        <p><b>
                                <font size=4> ชื่อ-นามสกุล:&nbsp; </font>
                            </b>
                            <font size=4 id="fullname"> </font>
                        </p>
                    </div>
                </div>
                <div class="col">
                    <br><br>
                    <div>
                        <p><b>
                                <font size=4> อายุ:&nbsp; </font>
                            </b>
                            <font size=4 id="age"> </font>
                        </p>
                    </div>
                </div>
                <div class="col">
                    <br><br>
                    <div>
                        <p><b>
                                <font size=4> เพศ:&nbsp; </font>
                            </b>
                            <font size=4 id="gender"> </font>
                        </p>
                    </div>
                </div>
            </div>

            <div class="row ps-5">
                <div class="col">
                    <br><br>
                    <div>
                        <p><b>
                                <font size=4> ที่อยู่: </font>
                            </b>
                            <font size=4 id="informaddr"> </font>
                        </p>
                    </div>
                </div>

                <div class="col">
                    <br><br>
                    <div>
                        <p><b>
                                <font size=4> โรคประจำตัว: </font>
                            </b>
                            <font size=4 id="pmh"> </font>
                        </p>
                    </div>
                </div>

                <div class="col">
                    <br><br>
                    <div>
                        <p><b>
                                <font size=4> คลินิก: </font>
                            </b>
                            <font size=4 id="clinic"> </font>
                        </p>
                    </div>
                </div>
            </div>
            <div class="row ps-5">
                <div class="col">
                    <br><br>
                    <div>
                        <p><b>
                                <font size=4> วินิจฉัย: </font>
                            </b>
                            <font size=4 id="icdname"> </font>
                        </p>
                    </div>
                </div>

                <div class="col">
                    <br><br>
                    <div>
                        <p><b>
                                <font size=4> BP: </font>
                            </b>
                            <font size=4 id="BP"> </font>
                        </p>
                    </div>
                </div>

                <div class="col">
                    <br><br>
                    <div>
                        <p><b>
                                <font size=4> ส่วนสูง: </font>
                            </b>
                            <font size=4 id="height"> </font>
                        </p>
                    </div>
                </div>

            </div>
            <div class="row ps-5">
                <div class="col">
                    <br><br>
                    <div>
                        <p><b>
                                <font size=4> น้ำหนัก: </font>
                            </b>
                            <font size=4 id="bw"> </font>
                        </p>
                    </div>
                </div>
                <div class="col">
                    <br><br>
                    <div>
                        <p><b>
                                <font size=4> BMI: </font>
                            </b>
                            <font size=4 id="bmi"> </font>
                        </p>
                    </div>
                </div>
                <div class="col">
                    <br><br>
                    <div>
                        <p><b>
                                <font size=4> แพ้ยา:</font>
                            </b>
                            <font size=4 id="agent"></font>
                        </p>
                    </div>
                </div>
            </div>
            <div class="row ps-5">
                <div class="col">
                    <br><br>
                    <div>
                        <p><b>
                                <font size=4> อาการแพ้ยา:</font>
                            </b>
                            <font size=4 id="symptom"></font>
                        </p>
                    </div>
                </div>
            </div>-->
            <!-- เพิ่ม <input> elements เพื่อรับค่า totalsoreAll และ lastvisitnumber -->
            <input type="hidden" id="totalsoreAll" name="totalsoreAll" value="">
            <input type="hidden" id="lastvisit" name="lastvisitnumber" value="">
        </div>

        <div class="v_main3">
            <div class="row">
                <div class="col-12 pt-2">
                    <label for="Note" class="form-label">*หมายเหตุ</label>
                    <textarea class="form-control" id="Note" name="note" rows="2"></textarea>
                </div>
            </div>
        </div>

        <div class="d-grid gap-2 d-md-flex justify-content-md-end p-2 pe-5">
            <fieldset disabled>
                <div class="row">
                    <div class="col-12">
                        <label for="user_name">
                            <h5>ผู้บันทึกข้อมูล</h5>
                        </label>
                        <input type="text" class="form-control" id="user_name" placeholder="ชื่อ-นามสกุล" value="<?php echo $fullname; ?>">
                    </div>

                    <label for="hos_guid" style="display: none;">hos_guid</label>
                    <input type="text" class="form-control" id="hos_guid" placeholder="ไอดี" value="<?php echo $hos_guid; ?>" style="display: none;">

                    <label for="doctorcode" style="display: none;">doctorcode</label>
                    <input type="text" class="form-control" id="doctorcode" placeholder="ไอดี" value="<?php echo $doctorcode; ?>" style="display: none;">

                </div>
            </fieldset>
        </div>

    </form>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog custom-modal-width">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">กลุ่มโรค</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" href="#tab-content-DM" data-toggle="tab">DM</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tab-content-HT" data-toggle="tab">HT</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tab-content-asthma" data-toggle="tab">Asthma</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tab-content-copd" data-toggle="tab">COPD</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tab-content-TB" data-toggle="tab">TB</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tab-content-Stroke" data-toggle="tab">Stroke</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tab-content-CKD" data-toggle="tab">CKD</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tab-content-AF" data-toggle="tab">คลินิกโรคหัวใจ AF/IHD/CHF</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tab-content-HIV" data-toggle="tab">HIV</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tab-content-Epilepsy" data-toggle="tab">Epilepsy</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tab-content-PD" data-toggle="tab">พาร์กินสัน</a>
                        </li>
                        <!--<li class="nav-item">
                            <a class="nav-link" href="#tab-content-Gout" data-toggle="tab">Gout</a>
                        </li>-->
                        <li class="nav-item">
                            <a class="nav-link" href="#tab-content-Haemato" data-toggle="tab">Haemato</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tab-content-CA" data-toggle="tab">มะเร็ง on CMT/ Immunocompromised host</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tab-content-Alz" data-toggle="tab">Alzheimer</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tab-content-PK" data-toggle="tab">Parkinson</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tab-content-DEM" data-toggle="tab">Demantia</a>
                        </li>
                        <!--<li class="nav-item">
                            <a class="nav-link" href="#tab-content-Refer" data-toggle="tab">Refer จาก PCU โดยแพทย์/Refer จากรพ.ลูกข่าย</a>
                        </li>-->
                        <!--<li class="nav-item">
                            <a class="nav-link" href="#tab-content-Staff" data-toggle="tab">ผู้รับบริบาลที่ Staff Med นัดเอง</a>
                        </li>-->
                        <!--<li class="nav-item">
                            <a class="nav-link" href="#tab-content-APM_MED_ICU" data-toggle="tab">นัดติดตามอาการหลังจำหน่าย จาก ตึก MED/ICU</a>
                        </li>-->
                        <!--<li class="nav-item">
                            <a class="nav-link" href="#tab-content-Consult" data-toggle="tab">ส่ง Consult อายุกรรม</a>
                        </li>-->
                        <!--<li class="nav-item">
                            <a class="nav-link" href="#tab-content-Income" data-toggle="tab">เบิกกรมบัญชีกลาง/อปท./รัฐวิสาหกิจ/ชำระเงินเอง</a>
                        </li>-->
                        <!--<li class="nav-item">
                            <a class="nav-link" href="#tab-content-Stroke_non_IMC" data-toggle="tab">Stroke non IMC</a>
                        </li>-->
                        <!--<li class="nav-item">
                            <a class="nav-link" href="#tab-content-Monk_StaffMed" data-toggle="tab">พระสงฆ์ ผู้สูงอายุ กลุ่มที่ไม่เข้าเกณฑ์พบ Staff Med</a>
                        </li>-->
                    </ul>
                </div>
                <div class="modal-body">
                    <fieldset disabled>
                        <div class="row">
                            <div class="col-4">
                                <label for="HN">HN</label>
                                <input type="text" class="form-control" id="all-hn" placeholder="-">
                            </div>
                            <div class="col-4">
                                <label for="CID">CID</label>
                                <input type="text" class="form-control" id="all-cid" placeholder="-">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-4">
                                <label for="FullName">ชื่อ-นามสกุล</label>
                                <input type="text" class="form-control" id="all-fullname" placeholder="-">
                            </div>
                            <div class="col-2">
                                <label for="Age">อายุ</label>
                                <input type="text" class="form-control" id="all-age" placeholder="-">
                            </div>
                            <div class="col-1">
                                <label for="Gender">เพศ</label>
                                <input type="text" class="form-control" id="all-gender" placeholder="-">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2 pt-2">
                                <label for="Icdname">วินิจฉัยโรคหลัก</label>
                                <textarea class="form-control" id="all-icdname" placeholder="-" rows="2"></textarea>
                            </div>
                            <div class="col-2 pt-2">
                                <label for="Icdname1">วินิจฉัยโรคร่วม1</label>
                                <textarea class="form-control" id="all-icdname1" placeholder="-" rows="2"></textarea>
                            </div>
                            <div class="col-2 pt-2">
                                <label for="Icdname2">วินิจฉัยโรคร่วม2</label>
                                <textarea class="form-control" id="all-icdname2" placeholder="-" rows="2"></textarea>
                            </div>
                            <div class="col-2 pt-2">
                                <label for="Icdname3">วินิจฉัยโรคร่วม3</label>
                                <textarea class="form-control" id="all-icdname3" placeholder="-" rows="2"></textarea>
                            </div>
                            <div class="col-2 pt-2">
                                <label for="Icdname4">วินิจฉัยโรคร่วม4</label>
                                <textarea class="form-control" id="all-icdname4" placeholder="-" rows="2"></textarea>
                            </div>
                            <div class="col-2 pt-2">
                                <label for="Icdname5">วินิจฉัยโรคร่วม5</label>
                                <textarea class="form-control" id="all-icdname5" placeholder="-" rows="2"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2 pt-2">
                                <label for="Icdname">แพ้ยา</label>
                                <textarea class="form-control" id="all-agent" placeholder="-" rows="2"></textarea>
                            </div>
                            <div class="col-2 pt-2">
                                <label for="Icdname">อาการแพ้ยา</label>
                                <textarea class="form-control" id="all-symptom" placeholder="-" rows="2"></textarea>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-content-DM">
                        <div class="modal-body">
                            <!--เนื้อหาสำหรับแท็บ "DM" จะถูกเพิ่มที่นี่-->
                            <h3>DM</h3>
                            <form id="form-DM">
                                <div class="row pt-3">
                                    <div class="col-4 pt-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="RadioDM" value="1" id="flexCheckMild_DM">
                                            <label class="form-check-label" for="flexCheckMild">
                                                <h5>Mild</h5>
                                                <p>-DTX 131-179 mg%, HbA1C 7 - 7.9 %</p>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-4 pt-3">
                                        <h5>รายละเอียดที่ใช้ประเมิน</h5>
                                        <p>-E109, E119, E149</p>
                                        <p>-HbA1C 7 - 7.9 %</p>
                                        <p>-DTX 131-179 mg %</p>
                                    </div>
                                    <div class="col-3 pt-2">

                                        <input type="checkbox" class="btn-check" id="btnMild_DM1" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnMild_DM1">E109</label>

                                        <input type="checkbox" class="btn-check" id="btnMild_DM2" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnMild_DM2">E119</label>

                                        <input type="checkbox" class="btn-check" id="btnMild_DM3" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnMild_DM3">E149</label>

                                        <h5>บันทึกข้อมูล</h5>
                                        <textarea class="form-control" id="NoteMild_DM" name="noteMildDM" rows="2" disabled></textarea>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-4 pt-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="RadioDM" value="2" id="flexCheckModerate_DM">
                                            <label class="form-check-label" for="flexCheckModerate">
                                                <h5>Moderate</h5>
                                                <p>-DTX > 180 mg%, HbA1C > 8 %</p>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-4 pt-3">
                                        <h5>รายละเอียดที่ใช้ประเมิน</h5>
                                        <p>-E109, E119, E149</p>
                                        <p>-HbA1C > 8 %</p>
                                        <p>-DTX > 180 mg%</p>
                                    </div>
                                    <div class="col-3 pt-2">

                                        <input type="checkbox" class="btn-check" id="btnModerate_DM1" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnModerate_DM1">E109</label>

                                        <input type="checkbox" class="btn-check" id="btnModerate_DM2" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnModerate_DM2">E119</label>

                                        <input type="checkbox" class="btn-check" id="btnModerate_DM3" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnModerate_DM3">E149</label>

                                        <h5>บันทึกข้อมูล</h5>
                                        <textarea class="form-control" id="NoteModerate_DM" name="noteModerateDM" rows="2" disabled></textarea>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-4 pt-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="RadioDM" value="3" id="flexCheckSevere_DM">
                                            <label class="form-check-label" for="flexCheckSevere">
                                                <h5>Severe</h5>
                                                <p>-ยาฉีด, DM foot (ตัดขาแล้ว), มีโรคร่วม เช่น CKD stage 5 (N185), โรคหัวใจ, Stroke, Diabetic retinopathy, โรคร่วมอื่นๆทางอายุรกรรม</p>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-4 pt-3">
                                        <h5>รายละเอียดที่ใช้ประเมิน</h5>
                                        <p>-E113, H360, N185, I500, I259, I48, I30-I529, I050-I099, I200-I259, I64</p>
                                        <p>-ใช้ยาฉีด</p>
                                        <p>-ประวัติตัดขา</p>
                                    </div>
                                    <div class="col-3 pt-2">

                                        <input type="checkbox" class="btn-check" id="btnSevere_DM1" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnSevere_DM1">E113</label>

                                        <input type="checkbox" class="btn-check" id="btnSevere_DM2" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnSevere_DM2">H360</label>

                                        <input type="checkbox" class="btn-check" id="btnSevere_DM3" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnSevere_DM3">N185</label>

                                        <input type="checkbox" class="btn-check" id="btnSevere_DM4" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnSevere_DM4">I500</label>

                                        <input type="checkbox" class="btn-check" id="btnSevere_DM5" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnSevere_DM5">I259</label>

                                        <input type="checkbox" class="btn-check" id="btnSevere_DM6" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnSevere_DM6">I48</label>

                                        <input type="checkbox" class="btn-check" id="btnSevere_DM7" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnSevere_DM7">I30-I529</label>

                                        <input type="checkbox" class="btn-check" id="btnSevere_DM8" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnSevere_DM8">I050-I099</label>

                                        <input type="checkbox" class="btn-check" id="btnSevere_DM9" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnSevere_DM9">I200-I259</label>

                                        <input type="checkbox" class="btn-check" id="btnSevere_DM10" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnSevere_DM10">I64</label>

                                        <h5>บันทึกข้อมูล</h5>
                                        <textarea class="form-control" id="NoteSevere_DM" name="noteSevereDM" rows="2" disabled></textarea>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-7 pt-3">
                                        <label for="Note" class="form-label">*ข้อมูลเพิ่มเติม</label>
                                        <textarea class="form-control" id="Note_DM" name="noteDM" rows="2"></textarea>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-content-copd">
                        <div class="modal-body">
                            <!-- เนื้อหาสำหรับแท็บ "COPD" จะถูกเพิ่มที่นี่ -->
                            <h3>COPD</h3>
                            <form id="form-copd">
                                <div class="row pt-3">
                                    <div class="col-4 pt-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="RadioCOPD" value="1" id="flexCheckMild_COPD">
                                            <label class="form-check-label" for="flexCheckMild">
                                                <h5>Mild</h5>
                                                <p>-ไม่มีอาการหอบกำเริบ/ไม่มี Exacerbation</p>
                                                <p>-สมรรถภาพปอด : FEV1 >= 80% ของค่ามาตรฐาน</p>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-4 pt-3">
                                        <h5>รายละเอียดที่ใช้ประเมิน</h5>
                                        <p>-J44</p>
                                        <p>-FEV1 >= 80%</p>
                                    </div>
                                    <div class="col-3 pt-2">

                                        <input type="checkbox" class="btn-check" id="btnMild_COPD" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnMild_COPD">J44</label>

                                        <h5>บันทึกข้อมูล</h5>
                                        <textarea class="form-control" id="NoteMild_COPD" name="noteMildCOPD" rows="2" disabled></textarea>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-4 pt-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="RadioCOPD" value="2" id="flexCheckModerate_COPD">
                                            <label class="form-check-label" for="flexCheckModerate">
                                                <h5>Moderate</h5>
                                                <p>-มีอาการหอบกำเริบเล็กน้อย,มี Exacerbation ไม่รุนแรง</p>
                                                <p>-สมรรถภาพปอด: FEV1 50-79 % ของค่ามาตรฐาน</p>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-4 pt-3">
                                        <h5>รายละเอียดที่ใช้ประเมิน</h5>
                                        <p>-J44</p>
                                        <p>-FEV1 50-79 % </p>
                                    </div>
                                    <div class="col-3 pt-2">
                                        <!--<label for="COPD_select">เลือก</label>
                                        <select name="copd" id="select_NoteModerate_COPD" onchange="updateTextarea('NoteModerate_COPD')" style="height: 40px;">
                                            <option value="">--เลือก--</option>
                                            <option value="Moderate 50-79">Moderate 50-79</option>
                                        </select>-->

                                        <input type="checkbox" class="btn-check" id="btnModerate_COPD" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnModerate_COPD">J44</label>

                                        <h5>บันทึกข้อมูล</h5>
                                        <textarea class="form-control" id="NoteModerate_COPD" name="noteModerateCOPD" rows="2" disabled></textarea>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-4 pt-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="RadioCOPD" value="3" id="flexCheckSevere_COPD">
                                            <label class="form-check-label" for="flexCheckSevere">
                                                <h5>Severe</h5>
                                                <p>-มีอาการหอบกำเริบจนรบกวนกิจวัตรประจำวัน,มี Exacerbation ที่รุนแรง</p>
                                                <p>-Revisit admit ด้วย Exacerbation ภายใน 28 วัน </p>
                                                <p>-สมรรถภาพปอด : FEV1 30-49 % ของค่ามาตรฐาน</p>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-4 pt-3">
                                        <h5>รายละเอียดที่ใช้ประเมิน</h5>
                                        <p>-J44.1</p>
                                        <p>-FEV1 30-49 %</p>
                                        <p>-Re-admit ด้วย Exacerbation ภายใน 28 วัน </p>
                                    </div>
                                    <div class="col-3 pt-2">

                                        <input type="checkbox" class="btn-check" id="btnSevere_COPD" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnSevere_COPD">J44.1</label>

                                        <h5>บันทึกข้อมูล</h5>
                                        <textarea class="form-control" id="NoteSevere_COPD" name="noteSevereCOPD" rows="2" disabled></textarea>
                                    </div>
                                    <div class="row pt-3">
                                        <div class="col-7 pt-3">
                                            <label for="Note" class="form-label">*หมายเหตุ</label>
                                            <textarea class="form-control" id="Note_COPD" name="noteCOPD" rows="2"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-content-asthma">
                        <div class="modal-body">
                            <!-- เนื้อหาสำหรับแท็บ "Asthma" จะถูกเพิ่มที่นี่ -->
                            <h3>Asthma</h3>
                            <form id="form-asthma">
                                <div class="row pt-3">
                                    <div class="col-4 pt-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="RadioAsthma" value="1" id="flexCheckMild_Asthma">
                                            <label class="form-check-label" for="flexCheckMild">
                                                <h5>Mild</h5>
                                                <p>-ไม่มีอาการหอบกำเริบ/ไม่มี Exacerbation</p>
                                                <p>-สมรรถภาพปอด : FEV1 >= 80% ของค่ามาตรฐาน</p>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-4 pt-3">
                                        <h5>รายละเอียดที่ใช้ประเมิน</h5>
                                        <p>-J44.8-J45.9</p>
                                        <p>-FEV1 >= 80%</p>
                                    </div>
                                    <div class="col-3 pt-2">

                                        <input type="checkbox" class="btn-check" id="btnMild_asthma" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnMild_asthma">J44.8-J45.9</label>

                                        <h5>บันทึกข้อมูล</h5>
                                        <textarea class="form-control" id="NoteMild_asthma" name="noteMildasthma" rows="2" disabled></textarea>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-4 pt-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="RadioAsthma" value="2" id="flexCheckModerate_Asthma">
                                            <label class="form-check-label" for="flexCheckModerate">
                                                <h5>Moderate</h5>
                                                <p>-มีอาการหอบกำเริบเล็กน้อย,มี Exacerbation ไม่รุนแรง</p>
                                                <p>-สมรรถภาพปอด: FEV1 60-80 % ของค่ามาตรฐาน</p>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-4 pt-3">
                                        <h5>รายละเอียดที่ใช้ประเมิน</h5>
                                        <p>-J44.8-J45.9</p>
                                        <p>-PEF หรือ FEV1 60-80 %</p>
                                    </div>
                                    <div class="col-3 pt-2">

                                        <input type="checkbox" class="btn-check" id="btnModerate_asthma" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnModerate_asthma">J44.8-J45.9</label>

                                        <h5>บันทึกข้อมูล</h5>
                                        <textarea class="form-control" id="NoteModerate_asthma" name="noteModerateasthma" rows="2" disabled></textarea>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-4 pt-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="RadioAsthma" value="3" id="flexCheckSevere_Asthma">
                                            <label class="form-check-label" for="flexCheckSevere">
                                                <h5>Severe</h5>
                                                <p>-มีอาการหอบกำเริบจนรบกวนกิจวัตรประจำวัน, มี Exacerbation ที่รุนแรง Revisit admit ด้วย Exacerbation ภายใน 28 วัน</p>
                                                <p>-PEF หรือ FEV1 < 60% ของค่ามาตรฐาน</p>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-4 pt-3">
                                        <h5>รายละเอียดที่ใช้ประเมิน</h5>
                                        <p>-J46</p>
                                        <p>-PEF หรือ FEV1 < 60 %</p>
                                                <p>-Re-admit ด้วย Exacerbation ภายใน 28 วัน </p>
                                    </div>
                                    <div class="col-3 pt-2">

                                        <input type="checkbox" class="btn-check" id="btnSevere_asthma" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnSevere_asthma">J46</label>

                                        <h5>บันทึกข้อมูล</h5>
                                        <textarea class="form-control" id="NoteSevere_asthma" name="noteSevereasthma" rows="2" disabled></textarea>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-7 pt-3">
                                        <label for="Note" class="form-label">*หมายเหตุ</label>
                                        <textarea class="form-control" id="Note_Asthma" name="noteasthma" rows="2"></textarea>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-content-HT">
                        <div class="modal-body">
                            <!-- เนื้อหาสำหรับแท็บ "HT" จะถูกเพิ่มที่นี่-->
                            <h3>HT</h3>
                            <form id="form-HT">
                                <div class="row pt-3">
                                    <div class="col-4 pt-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="RadioHT" value="1" id="flexCheckMild_HT">
                                            <label class="form-check-label" for="flexCheckMild">
                                                <h5>Mild</h5>
                                                <p>-Bp 140/90 - 159/99 mmHg</p>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-4 pt-3">
                                        <h5>รายละเอียดที่ใช้ประเมิน</h5>
                                        <p>-I10</p>
                                        <p>-Bp 140/90 - 159/99 mmHg (ข้อมูลใน HosXP: V/S)</p>
                                    </div>
                                    <div class="col-3 pt-2">

                                        <input type="checkbox" class="btn-check" id="btnMild_HT" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnMild_HT">I10</label>

                                        <h5>บันทึกข้อมูล</h5>
                                        <textarea class="form-control" id="NoteMild_HT" name="noteMildHT" rows="2" disabled></textarea>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-4 pt-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="RadioHT" value="2" id="flexCheckModerate_HT">
                                            <label class="form-check-label" for="flexCheckModerate">
                                                <h5>Moderate</h5>
                                                <p>-Bp > 160/100 mmHg</p>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-4 pt-3">
                                        <h5>รายละเอียดที่ใช้ประเมิน</h5>
                                        <p>-I10</p>
                                        <p>-Bp > 160/100 mmHg (ข้อมูลใน HosXP: V/S)</p>
                                    </div>
                                    <div class="col-3 pt-2">

                                        <input type="checkbox" class="btn-check" id="btnModerate_HT" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnModerate_HT">I10</label>

                                        <h5>บันทึกข้อมูล</h5>
                                        <textarea class="form-control" id="NoteModerate_HT" name="noteModerateHT" rows="2" disabled></textarea>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-4 pt-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="RadioHT" value="3" id="flexCheckSevere_HT">
                                            <label class="form-check-label" for="flexCheckSevere">
                                                <h5>Severe</h5>
                                                <p>-มีโรคร่วม เช่น CKD stage 5 (N185), โรคหัวใจ, Stroke, โรคร่วมอื่นๆทางอายุรกรรม</p>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-4 pt-3">
                                        <h5>รายละเอียดที่ใช้ประเมิน</h5>
                                        <p>-I10, I11-I15.9, N185, I500, I259, I48, I30-I529, I050-I099, I200-I259, I64</p>
                                    </div>
                                    <div class="col-3 pt-2">

                                        <input type="checkbox" class="btn-check" id="btnSevere_HT1" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnSevere_HT1">I10</label>

                                        <input type="checkbox" class="btn-check" id="btnSevere_HT2" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnSevere_HT2">I11-I15.9</label>

                                        <input type="checkbox" class="btn-check" id="btnSevere_HT3" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnSevere_HT3">N185</label>

                                        <input type="checkbox" class="btn-check" id="btnSevere_HT4" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnSevere_HT4">I500</label>

                                        <input type="checkbox" class="btn-check" id="btnSevere_HT5" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnSevere_HT5">I259</label>

                                        <input type="checkbox" class="btn-check" id="btnSevere_HT6" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnSevere_HT6">I48</label>

                                        <input type="checkbox" class="btn-check" id="btnSevere_HT7" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnSevere_HT7">I30-I529</label>

                                        <input type="checkbox" class="btn-check" id="btnSevere_HT8" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnSevere_HT8">I050-I099</label>

                                        <input type="checkbox" class="btn-check" id="btnSevere_HT9" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnSevere_HT9">I200-I259</label>

                                        <input type="checkbox" class="btn-check" id="btnSevere_HT10" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnSevere_HT10">I64</label>

                                        <h5>บันทึกข้อมูล</h5>
                                        <textarea class="form-control" id="NoteSevere_HT" name="noteSevereHT" rows="2" disabled></textarea>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-7 pt-3">
                                        <label for="Note" class="form-label">*หมายเหตุ</label>
                                        <textarea class="form-control" id="Note_HT" name="noteHT" rows="2"></textarea>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-content-Stroke">
                        <div class="modal-body">
                            <!--เนื้อหาสำหรับแท็บ "Stroke" จะถูกเพิ่มที่นี่-->
                            <h3>Stroke</h3>
                            <form id="form-Stroke">
                                <div class="row pt-3">
                                    <div class="col-4 pt-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="RadioStroke" value="1" id="flexCheckMild_Stroke">
                                            <label class="form-check-label" for="flexCheckMild">
                                                <h5>Mild</h5>
                                                <p></p>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-4 pt-3">
                                        <h5>รายละเอียดที่ใช้ประเมิน</h5>
                                        <p>-I64</p>
                                    </div>
                                    <div class="col-3 pt-2">

                                        <input type="checkbox" class="btn-check" id="btnMild_Stroke" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnMild_Stroke">I64</label>

                                        <h5>บันทึกข้อมูล</h5>
                                        <textarea class="form-control" id="NoteMild_Stroke" name="noteMildStroke" rows="2" disabled></textarea>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-4 pt-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="RadioStroke" value="2" id="flexCheckModerate_Stroke">
                                            <label class="form-check-label" for="flexCheckModerate">
                                                <h5>Moderate</h5>
                                                <p>-Stroke Non IMC</p>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-4 pt-3">
                                        <h5>รายละเอียดที่ใช้ประเมิน</h5>
                                        <p>-I64</p>
                                    </div>
                                    <div class="col-3 pt-2">

                                        <input type="checkbox" class="btn-check" id="btnModerate_Stroke" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnModerate_Stroke">I64</label>

                                        <h5>บันทึกข้อมูล</h5>
                                        <textarea class="form-control" id="NoteModerate_Stroke" name="noteModerateStroke" rows="2" disabled></textarea>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-4 pt-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="RadioStroke" value="3" id="flexCheckSevere_Stroke">
                                            <label class="form-check-label" for="flexCheckSevere">
                                                <h5>Severe</h5>
                                                <p>-Stroke IMC 1 - 6 เดือน, โรคร่วมทางอายุรกรรม, Refer กลับจากโรงพยาบาลสุรินทร์</p>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-4 pt-3">
                                        <h5>รายละเอียดที่ใช้ประเมิน</h5>
                                        <p>-I64, วินิจฉัยไม่ถึง 6 เดือนร่วมกับประวัติ Refer กลับจากรพ.สร., โรคร่วมทางอายุรกรรม</p>
                                    </div>
                                    <div class="col-3 pt-2">

                                        <input type="checkbox" class="btn-check" id="btnSevere_Stroke" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnSevere_Stroke">I64</label>

                                        <h5>บันทึกข้อมูล</h5>
                                        <textarea class="form-control" id="NoteSevere_Stroke" name="noteSevereStroke" rows="2" disabled></textarea>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-7 pt-3">
                                        <label for="Note" class="form-label">*หมายเหตุ</label>
                                        <textarea class="form-control" id="Note_Stroke" name="noteStroke" rows="2"></textarea>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-content-CKD">
                        <div class="modal-body">
                            <!--เนื้อหาสำหรับแท็บ "CKD" จะถูกเพิ่มที่นี่-->
                            <h3>CKD</h3>
                            <form id="form-CKD">
                                <div class="row pt-3">
                                    <div class="col-4 pt-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="RadioCKD" value="1" id="flexCheckMild_CKD">
                                            <label class="form-check-label" for="flexCheckMild">
                                                <h5>Mild</h5>
                                                <p>-Stage 1-3 a</p>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-4 pt-3">
                                        <h5>รายละเอียดที่ใช้ประเมิน</h5>
                                        <p>-N181 - N183</p>
                                    </div>
                                    <div class="col-3 pt-2">

                                        <input type="checkbox" class="btn-check" id="btnMild_CKD1" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnMild_CKD1">N181</label>

                                        <input type="checkbox" class="btn-check" id="btnMild_CKD2" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnMild_CKD2">N183</label>

                                        <h5>บันทึกข้อมูล</h5>
                                        <textarea class="form-control" id="NoteMild_CKD" name="noteMildCKD" rows="2" disabled></textarea>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-4 pt-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="RadioCKD" value="2" id="flexCheckModerate_CKD">
                                            <label class="form-check-label" for="flexCheckModerate">
                                                <h5>Moderate</h5>
                                                <p>-CKD stage 3b - 4</p>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-4 pt-3">
                                        <h5>รายละเอียดที่ใช้ประเมิน</h5>
                                        <p>-N183 - N184</p>
                                    </div>
                                    <div class="col-3 pt-2">

                                        <input type="checkbox" class="btn-check" id="btnModerate_CKD1" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnModerate_CKD1">N183</label>

                                        <input type="checkbox" class="btn-check" id="btnModerate_CKD2" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnModerate_CKD2">N184</label>

                                        <h5>บันทึกข้อมูล</h5>
                                        <textarea class="form-control" id="NoteModerate_CKD" name="noteModerateCKD" rows="2" disabled></textarea>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-4 pt-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="RadioCKD" value="3" id="flexCheckSevere_CKD">
                                            <label class="form-check-label" for="flexCheckSevere">
                                                <h5>Severe</h5>
                                                <p>-Stage 5</p>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-4 pt-3">
                                        <h5>รายละเอียดที่ใช้ประเมิน</h5>
                                        <p>-N189 + N179, N185</p>
                                    </div>
                                    <div class="col-3 pt-2">

                                        <input type="checkbox" class="btn-check" id="btnSevere_CKD1" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnSevere_CKD1">N189+N179</label>

                                        <input type="checkbox" class="btn-check" id="btnSevere_CKD2" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnSevere_CKD2">N185</label>

                                        <h5>บันทึกข้อมูล</h5>
                                        <textarea class="form-control" id="NoteSevere_CKD" name="noteSevereCKD" rows="2" disabled></textarea>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-7 pt-3">
                                        <label for="Note" class="form-label">*หมายเหตุ</label>
                                        <textarea class="form-control" id="Note_CKD" name="noteCKD" rows="2"></textarea>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-content-AF">
                        <div class="modal-body">
                            <!-- เนื้อหาสำหรับแท็บ "AF" จะถูกเพิ่มที่นี่ -->
                            <h3>คลินิกโรคหัวใจ AF/IHD/CHF</h3>
                            <form id="form-AF">
                                <div class="row pt-3">
                                    <div class="col-4 pt-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" Name="RadioAF" value="1" id="flexCheckMild_AF">
                                            <label class="form-check-label" for="flexCheckMild">
                                                <h5>Mild</h5>
                                                <p>-อาการปกติดี / ไม่มีผลข้างเคียงจากการให้ยา</p>
                                                <p>-LEVF มากกว่า 50 %</p>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-4 pt-3">
                                        <h5>รายละเอียดที่ใช้ประเมิน</h5>
                                        <p>-I500, I259, I48, I30-I529, I050-I099, I200-I259</p>
                                        <p>-LEVF มากกว่า 50 % </p>
                                    </div>
                                    <div class="col-3 pt-2">

                                        <input type="checkbox" class="btn-check" id="btnMild_AF1" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnMild_AF1">I500</label>

                                        <input type="checkbox" class="btn-check" id="btnMild_AF2" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnMild_AF2">I259</label>

                                        <input type="checkbox" class="btn-check" id="btnMild_AF3" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnMild_AF3">I48</label>

                                        <input type="checkbox" class="btn-check" id="btnMild_AF4" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnMild_AF4">I30-I529</label>

                                        <input type="checkbox" class="btn-check" id="btnMild_AF5" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnMild_AF5">I050-I099</label>

                                        <input type="checkbox" class="btn-check" id="btnMild_AF6" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnMild_AF6">I200-I259</label>

                                        <h5>บันทึกข้อมูล</h5>
                                        <textarea class="form-control" id="NoteMild_AF" name="noteMildAF" rows="2" disabled></textarea>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-4 pt-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" Name="RadioAF" value="2" id="flexCheckModerate_AF">
                                            <label class="form-check-label" for="flexCheckModerate">
                                                <h5>Moderate</h5>
                                                <p>-INR อยู่ในช่วง 1.8-3.2 </p>
                                                <p>-LEVF 40-50 % </p>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-4 pt-3">
                                        <h5>รายละเอียดที่ใช้ประเมิน</h5>
                                        <p>-I500, I259, I48, I30-I529, I050-I099, I200-I259</p>
                                        <p>-LEVF 40-50 %,INR อยู่ในช่วง 1.8-3.2</p>
                                    </div>
                                    <div class="col-3 pt-2">

                                        <input type="checkbox" class="btn-check" id="btnModerate_AF1" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnModerate_AF1">I500</label>

                                        <input type="checkbox" class="btn-check" id="btnModerate_AF2" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnModerate_AF2">I259</label>

                                        <input type="checkbox" class="btn-check" id="btnModerate_AF3" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnModerate_AF3">I48</label>

                                        <input type="checkbox" class="btn-check" id="btnModerate_AF4" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnModerate_AF4">I30-I529</label>

                                        <input type="checkbox" class="btn-check" id="btnModerate_AF5" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnModerate_AF5">I050-I099</label>

                                        <input type="checkbox" class="btn-check" id="btnModerate_AF6" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnModerate_AF6">I200-I259</label>

                                        <h5>บันทึกข้อมูล</h5>
                                        <textarea class="form-control" id="NoteModerate_AF" name="noteModerateAF" rows="2" disabled></textarea>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-4 pt-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" Name="RadioAF" value="3" id="flexCheckSevere_AF">
                                            <label class="form-check-label" for="flexCheckSevere">
                                                <h5>Severe</h5>
                                                <p>-INR ไม่อยู่ในช่วง 1.8 - 3.2/LEVF น้อยกว่า 40 % (ข้อมูลอยู่ใน C.C., P.I.)</p>
                                                <p>-Revisit ภายใน 7 วัน, ได้รับยา Warfarin</p>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-4 pt-3">
                                        <h5>รายละเอียดที่ใช้ประเมิน</h5>
                                        <p>-I500, I259, I48, I30-I529, I050-I099, I200-I259</p>
                                        <p>-LEVF น้อยกว่า 40 %, INR ไม่อยู่ในช่วง 1.8 - 3.2, Revisit ภายใน 7 วัน, ได้รับยา Warfarin</p>
                                    </div>
                                    <div class="col-3 pt-2">

                                        <input type="checkbox" class="btn-check" id="btnSevere_AF1" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnSevere_AF1">I500</label>

                                        <input type="checkbox" class="btn-check" id="btnSevere_AF2" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnSevere_AF2">I259</label>

                                        <input type="checkbox" class="btn-check" id="btnSevere_AF3" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnSevere_AF3">I48</label>

                                        <input type="checkbox" class="btn-check" id="btnSevere_AF4" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnSevere_AF4">I30-I529</label>

                                        <input type="checkbox" class="btn-check" id="btnSevere_AF5" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnSevere_AF5">I050-I099</label>

                                        <input type="checkbox" class="btn-check" id="btnSevere_AF6" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnSevere_AF6">I200-I259</label>

                                        <h5>บันทึกข้อมูล</h5>
                                        <textarea class="form-control" id="NoteSevere_AF" name="noteSevereAF" rows="2" disabled></textarea>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-7 pt-3">
                                        <label for="Note" class="form-label">*หมายเหตุ</label>
                                        <textarea class="form-control" id="Note_AF" name="noteAF" rows="2"></textarea>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-content-TB">
                        <div class="modal-body">
                            <!--เนื้อหาสำหรับแท็บ "TB" จะถูกเพิ่มที่นี่-->
                            <h3>TB</h3>
                            <form id="form-TB">
                                <div class="row pt-3">
                                    <div class="col-4 pt-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="RadioTB" value="1" id="flexCheckMild_TB">
                                            <label class="form-check-label" for="flexCheckMild">
                                                <h5>Mild</h5>
                                                <p>-อายุ < 60ปี ไม่มีโรคประจำตัว</p>
                                                        <p>-อาการปกติ, มีอาการข้างเคียงเล็กน้อย เช่น คันตามตัว ปวดตามตัว คลื่นไส้ ฯ, lung ผิดปกติ 1 lobe </p>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-4 pt-3">
                                        <h5>รายละเอียดที่ใช้ประเมิน</h5>
                                        <p>-A15-A19</p>
                                        <p>-อายุ < 60ปี, ไม่มีโรคประจำตัว</p>
                                    </div>
                                    <div class="col-3 pt-2">

                                        <input type="checkbox" class="btn-check" id="btnMild_TB" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnMild_TB">A15-A19</label>

                                        <h5>บันทึกข้อมูล</h5>
                                        <textarea class="form-control" id="NoteMild_TB" name="noteMildTB" rows="2" disabled></textarea>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-4 pt-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="RadioTB" value="2" id="flexCheckModerate_TB">
                                            <label class="form-check-label" for="flexCheckModerate">
                                                <h5>Moderate</h5>
                                                <p>-moderate ไอมาก ไอมีเลือดปน หอบเหนื่อย ผื่นคันตามตัว+ไข้ ตาตัวเหลือง, induced hepatitis, acute renal failure ฯ lungผิดปกติ > 1 lobeและเป็นข้างเดียว </p>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-4 pt-3">
                                        <h5>รายละเอียดที่ใช้ประเมิน</h5>
                                        <p>-A15-A19, K711 + Y411</p>
                                        <p>-acute renal failure</p>
                                    </div>
                                    <div class="col-3 pt-2">

                                        <input type="checkbox" class="btn-check" id="btnModerate_TB1" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnModerate_TB1">A15-A19</label>

                                        <input type="checkbox" class="btn-check" id="btnModerate_TB2" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnModerate_TB2">K711+Y411</label>

                                        <h5>บันทึกข้อมูล</h5>
                                        <textarea class="form-control" id="NoteModerate_TB" name="noteModerateTB" rows="2" disabled></textarea>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-4 pt-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="RadioTB" value="3" id="flexCheckSevere_TB">
                                            <label class="form-check-label" for="flexCheckSevere">
                                                <h5>Severe</h5>
                                                <p>-High risk อายุ > 60 ปี มีโรคประจำตัว ติดสุรา บุหรี่ ยาเสพติด ขาดยา, ดื้อยาทุกชนิด MDR TB, XDR TB หอบมากต้องให้ออกซิเจน , hypoxia, ปอดผิดปกติแบบ miliary</p>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-4 pt-3">
                                        <h5>รายละเอียดที่ใช้ประเมิน</h5>
                                        <p>-A15-A19, F102, F103, อายุ > 60 ปี, Re-admit ภายใน 28 วัน</p>
                                        <p>-ดื้อยาทุกชนิด MDR TB, XDR TB, Re-admit ภายใน 28 วัน</p>
                                    </div>
                                    <div class="col-3 pt-2">

                                        <input type="checkbox" class="btn-check" id="btnSevere_TB1" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnSevere_TB1">A15-A19</label>

                                        <input type="checkbox" class="btn-check" id="btnSevere_TB2" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnSevere_TB2">F102</label>

                                        <input type="checkbox" class="btn-check" id="btnSevere_TB3" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnSevere_TB3">F103</label>

                                        <h5>บันทึกข้อมูล</h5>
                                        <textarea class="form-control" id="NoteSevere_TB" name="noteSevereTB" rows="2" disabled></textarea>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-7 pt-3">
                                        <label for="Note" class="form-label">*หมายเหตุ</label>
                                        <textarea class="form-control" id="Note_TB" name="noteTB" rows="2"></textarea>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-content-HIV">
                        <div class="modal-body">
                            <!-- เนื้อหาสำหรับแท็บ "HIV" จะถูกเพิ่มที่นี่ -->
                            <h3>HIV</h3>
                            <form id="form-HIV">
                                <div class="row pt-3">
                                    <div class="col-4 pt-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="RadioHIV" value="1" id="flexCheckMild_HIV">
                                            <label class="form-check-label" for="flexCheckMild">
                                                <h5>Mild</h5>
                                                <p>-CD 4 มากกว่า 350 /Viral load น้อย 20</p>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-4 pt-3">
                                        <h5>รายละเอียดที่ใช้ประเมิน</h5>
                                        <p>-B20-B24, CD 4 มากกว่า 350, Viral load น้อย 20</p>
                                    </div>
                                    <div class="col-3 pt-2">

                                        <input type="checkbox" class="btn-check" id="btnMild_HIV" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnMild_HIV">B20-B24</label>

                                        <h5>บันทึกข้อมูล</h5>
                                        <textarea class="form-control" id="NoteMild_HIV" name="noteMildHIV" rows="2" disabled></textarea>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-4 pt-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="RadioHIV" value="2" id="flexCheckModerate_HIV">
                                            <label class="form-check-label" for="flexCheckModerate">
                                                <h5>Moderate</h5>
                                                <p>-Viral load 20-2000/CD4 200-350</p>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-4 pt-3">
                                        <h5>รายละเอียดที่ใช้ประเมิน</h5>
                                        <p>-B20-B24, Viral load 20-2000,CD4 200-350</p>
                                    </div>
                                    <div class="col-3 pt-2">

                                        <input type="checkbox" class="btn-check" id="btnModerate_HIV" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnModerate_HIV">B20-B24</label>

                                        <h5>บันทึกข้อมูล</h5>
                                        <textarea class="form-control" id="NoteModerate_HIV" name="noteModerateHIV" rows="2" disabled></textarea>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-4 pt-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="RadioHIV" value="3" id="flexCheckSevere_HIV">
                                            <label class="form-check-label" for="flexCheckSevere">
                                                <h5>Severe</h5>
                                                <p>-CD4 น้อยกว่า 200 เจาะ 2 ครั้ง/ปี ถ้า viral มากกว่า 2000 ดูการกินยา 6 เดือน เจาะ LFT 1 ครั้ง/ปี</p>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-4 pt-3">
                                        <h5>รายละเอียดที่ใช้ประเมิน</h5>
                                        <p>-B20-B24, CD4 น้อยกว่า 200, viral มากกว่า 2000</p>
                                    </div>
                                    <div class="col-3 pt-2">

                                        <input type="checkbox" class="btn-check" id="btnSevere_HIV" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnSevere_HIV">B20-B24</label>

                                        <h5>บันทึกข้อมูล</h5>
                                        <textarea class="form-control" id="NoteSevere_HIV" name="noteSevereHIV" rows="2" disabled></textarea>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-7 pt-3">
                                        <label for="Note" class="form-label">*หมายเหตุ</label>
                                        <textarea class="form-control" id="Note_HIV" name="noteHIV" rows="2"></textarea>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-content-Epilepsy">
                        <div class="modal-body">
                            <!--เนื้อหาสำหรับแท็บ "Epilepsy" จะถูกเพิ่มที่นี่-->
                            <h3>Epilepsy</h3>
                            <form id="form-Ep">
                                <div class="row pt-3">
                                    <div class="col-4 pt-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="RadioEp" value="1" id="flexCheckMild_Epilepsy">
                                            <label class="form-check-label" for="flexCheckMild">
                                                <h5>Mild</h5>
                                                <p></p>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-4 pt-3">
                                        <h5>รายละเอียดที่ใช้ประเมิน</h5>
                                        <p>-G40-G41</p>
                                    </div>
                                    <div class="col-3 pt-2">

                                        <input type="checkbox" class="btn-check" id="btnMild_Ep" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnMild_Ep">G40-G41</label>

                                        <h5>บันทึกข้อมูล</h5>
                                        <textarea class="form-control" id="NoteMild_Ep" name="noteMildEp" rows="2" disabled></textarea>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-4 pt-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="RadioEp" value="2" id="flexCheckModerate_Epilepsy">
                                            <label class="form-check-label" for="flexCheckModerate">
                                                <h5>Moderate</h5>
                                                <p></p>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-4 pt-3">
                                        <h5>รายละเอียดที่ใช้ประเมิน</h5>
                                        <p>-G40-G41</p>
                                    </div>
                                    <div class="col-3 pt-2">

                                        <input type="checkbox" class="btn-check" id="btnModerate_Ep" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnModerate_Ep">G40-G41</label>

                                        <h5>บันทึกข้อมูล</h5>
                                        <textarea class="form-control" id="NoteModerate_Ep" name="noteModerateEp" rows="2" disabled></textarea>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-4 pt-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="RadioEp" value="3" id="flexCheckSevere_Epilepsy">
                                            <label class="form-check-label" for="flexCheckSevere">
                                                <h5>Severe</h5>
                                                <p></p>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-4 pt-3">
                                        <h5>รายละเอียดที่ใช้ประเมิน</h5>
                                        <p>-G40-G41, Re-admit ภายใน 28 วัน, A419</p>
                                    </div>
                                    <div class="col-3 pt-2">

                                        <input type="checkbox" class="btn-check" id="btnSevere_Ep" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnSevere_Ep">G40-G41</label>

                                        <h5>บันทึกข้อมูล</h5>
                                        <textarea class="form-control" id="NoteSevere_Ep" name="noteSevereEp" rows="2" disabled></textarea>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-7 pt-3">
                                        <label for="Note" class="form-label">*หมายเหตุ</label>
                                        <textarea class="form-control" id="Note_Ep" name="noteEp" rows="2"></textarea>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-content-PD">
                        <div class="modal-body">
                            <!--เนื้อหาสำหรับแท็บ "PD" จะถูกเพิ่มที่นี่-->
                            <h3>พาร์กินสัน</h3>
                            <form id="form-PD">
                                <div class="row pt-3">
                                    <div class="col-4 pt-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="RadioPD" value="1" id="flexCheckMild_PD">
                                            <label class="form-check-label" for="flexCheckMild">
                                                <h5>Mild</h5>
                                                <p></p>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-4 pt-3">
                                        <h5>รายละเอียดที่ใช้ประเมิน</h5>
                                        <p>-G20</p>
                                    </div>
                                    <div class="col-3 pt-2">

                                        <input type="checkbox" class="btn-check" id="btnMild_PD" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnMild_PD">G20</label>

                                        <h5>บันทึกข้อมูล</h5>
                                        <textarea class="form-control" id="NoteMild_PD" name="noteMildPD" rows="2" disabled></textarea>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-4 pt-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="RadioPD" value="2" id="flexCheckModerate_PD">
                                            <label class="form-check-label" for="flexCheckModerate">
                                                <h5>Moderate</h5>
                                                <p></p>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-4 pt-3">
                                        <h5>รายละเอียดที่ใช้ประเมิน</h5>
                                        <p>-G20</p>
                                    </div>
                                    <div class="col-3 pt-2">

                                        <input type="checkbox" class="btn-check" id="btnModerate_PD" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnModerate_PD">G20</label>

                                        <h5>บันทึกข้อมูล</h5>
                                        <textarea class="form-control" id="NoteModerate_PD" name="noteModeratePD" rows="2" disabled></textarea>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-4 pt-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="RadioPD" value="3" id="flexCheckSevere_PD">
                                            <label class="form-check-label" for="flexCheckSevere">
                                                <h5>Severe</h5>
                                                <p></p>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-4 pt-3">
                                        <h5>รายละเอียดที่ใช้ประเมิน</h5>
                                        <p>-G20, Re-admit ภายใน 28 วัน</p>
                                    </div>
                                    <div class="col-3 pt-2">

                                        <input type="checkbox" class="btn-check" id="btnSevere_PD" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnSevere_PD">G20</label>

                                        <h5>บันทึกข้อมูล</h5>
                                        <textarea class="form-control" id="NoteSevere_PD" name="noteSeverePD" rows="2" disabled></textarea>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-7 pt-3">
                                        <label for="Note" class="form-label">*หมายเหตุ</label>
                                        <textarea class="form-control" id="Note_PD" name="notePD" rows="2"></textarea>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-content-Haemato">
                        <div class="modal-body">
                            <!--เนื้อหาสำหรับแท็บ "Haemato" จะถูกเพิ่มที่นี่-->
                            <h3>Haemato</h3>
                            <form id="form-HA">
                                <div class="row pt-3">
                                    <div class="col-4 pt-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="RadioHA" value="1" id="flexCheckMild_Haemato">
                                            <label class="form-check-label" for="flexCheckMild">
                                                <h5>Mild</h5>
                                                <p></p>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-4 pt-3">
                                        <h5>รายละเอียดที่ใช้ประเมิน</h5>
                                        <p>-D500-D649</p>
                                    </div>
                                    <div class="col-3 pt-2">

                                        <input type="checkbox" class="btn-check" id="btnMild_HA" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnMild_HA">D500-D649</label>

                                        <h5>บันทึกข้อมูล</h5>
                                        <textarea class="form-control" id="NoteMild_HA" name="noteMildHA" rows="2" disabled></textarea>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-4 pt-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="RadioHA" value="2" id="flexCheckModerate_Haemato">
                                            <label class="form-check-label" for="flexCheckModerate">
                                                <h5>Moderate</h5>
                                                <p></p>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-4 pt-3">
                                        <h5>รายละเอียดที่ใช้ประเมิน</h5>
                                        <p>-D500-D649</p>
                                    </div>
                                    <div class="col-3 pt-2">

                                        <input type="checkbox" class="btn-check" id="btnModerate_HA" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnModerate_HA">D500-D649</label>

                                        <h5>บันทึกข้อมูล</h5>
                                        <textarea class="form-control" id="NoteModerate_HA" name="noteModerateHA" rows="2" disabled></textarea>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-4 pt-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="RadioHA" value="3" id="flexCheckSevere_Haemato">
                                            <label class="form-check-label" for="flexCheckSevere">
                                                <h5>Severe</h5>
                                                <p></p>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-4 pt-3">
                                        <h5>รายละเอียดที่ใช้ประเมิน</h5>
                                        <p>-D500-D649, Re-admit ภายใน 28 วัน</p>
                                    </div>
                                    <div class="col-3 pt-2">

                                        <input type="checkbox" class="btn-check" id="btnSevere_HA" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnSevere_HA">D500-D649</label>

                                        <h5>บันทึกข้อมูล</h5>
                                        <textarea class="form-control" id="NoteSevere_HA" name="noteSevereHA" rows="2" disabled></textarea>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-7 pt-3">
                                        <label for="Note" class="form-label">*หมายเหตุ</label>
                                        <textarea class="form-control" id="Note_HA" name="noteHA" rows="2"></textarea>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-content-CA">
                        <div class="modal-body">
                            <!--เนื้อหาสำหรับแท็บ "CA" จะถูกเพิ่มที่นี่-->
                            <h3>มะเร็ง on CMT/ Immunocompromised host</h3>
                            <form id="form-CA">
                                <div class="row pt-3">
                                    <div class="col-4 pt-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="RadioCA" value="1" id="flexCheckMild_CA">
                                            <label class="form-check-label" for="flexCheckMild">
                                                <h5>Mild</h5>
                                                <p></p>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-4 pt-3">
                                        <h5>รายละเอียดที่ใช้ประเมิน</h5>
                                        <p>-D00-D48, C00-C97</p>
                                    </div>
                                    <div class="col-3 pt-2">

                                        <input type="checkbox" class="btn-check" id="btnMild_CA1" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnMild_CA1">D00-D48</label>

                                        <input type="checkbox" class="btn-check" id="btnMild_CA2" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnMild_CA2">C00-C97</label>

                                        <h5>บันทึกข้อมูล</h5>
                                        <textarea class="form-control" id="NoteMild_CA" name="noteMildCA" rows="2" disabled></textarea>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-4 pt-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="RadioCA" value="2" id="flexCheckModerate_CA">
                                            <label class="form-check-label" for="flexCheckModerate">
                                                <h5>Moderate</h5>
                                                <p></p>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-4 pt-3">
                                        <h5>รายละเอียดที่ใช้ประเมิน</h5>
                                        <p>-D00-D48, C00-C97</p>
                                    </div>
                                    <div class="col-3 pt-2">

                                        <input type="checkbox" class="btn-check" id="btnModerate_CA1" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnModerate_CA1">D00-D48</label>

                                        <input type="checkbox" class="btn-check" id="btnModerate_CA2" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnModerate_CA2">C00-C97</label>

                                        <h5>บันทึกข้อมูล</h5>
                                        <textarea class="form-control" id="NoteModerate_CA" name="noteModerateCA" rows="2" disabled></textarea>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-4 pt-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="RadioCA" value="3" id="flexCheckSevere_CA">
                                            <label class="form-check-label" for="flexCheckSevere">
                                                <h5>Severe</h5>
                                                <p></p>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-4 pt-3">
                                        <h5>รายละเอียดที่ใช้ประเมิน</h5>
                                        <p>-D00-D48, C00-C97, Re-admit ภายใน 28 วัน</p>
                                    </div>
                                    <div class="col-3 pt-2">

                                        <input type="checkbox" class="btn-check" id="btnSevere_CA1" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnSevere_CA1">D00-D48</label>

                                        <input type="checkbox" class="btn-check" id="btnSevere_CA2" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnSevere_CA2">C00-C97</label>

                                        <h5>บันทึกข้อมูล</h5>
                                        <textarea class="form-control" id="NoteSevere_CA" name="noteSevereCA" rows="2" disabled></textarea>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-7 pt-3">
                                        <label for="Note" class="form-label">*หมายเหตุ</label>
                                        <textarea class="form-control" id="Note_CA" name="noteCA" rows="2"></textarea>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-content-Alz">
                        <div class="modal-body">
                            <!--เนื้อหาสำหรับแท็บ "Alz" จะถูกเพิ่มที่นี่-->
                            <h3>Alzheimer</h3>
                            <form id="form-Alz">
                                <div class="row pt-3">
                                    <div class="col-4 pt-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="RadioAlz" value="1" id="flexCheckMild_Alz">
                                            <label class="form-check-label" for="flexCheckMild">
                                                <h5>Mild</h5>
                                                <p></p>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-4 pt-3">
                                        <h5>รายละเอียดที่ใช้ประเมิน</h5>
                                        <p></p>
                                    </div>
                                    <div class="col-3 pt-2">

                                        <h5>บันทึกข้อมูล</h5>
                                        <textarea class="form-control" id="NoteMild_Alz" name="noteMildAlz" rows="2" disabled></textarea>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-4 pt-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="RadioAlz" value="2" id="flexCheckModerate_Alz">
                                            <label class="form-check-label" for="flexCheckModerate">
                                                <h5>Moderate</h5>
                                                <p></p>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-4 pt-3">
                                        <h5>รายละเอียดที่ใช้ประเมิน</h5>
                                    </div>
                                    <div class="col-3 pt-2">

                                        <h5>บันทึกข้อมูล</h5>
                                        <textarea class="form-control" id="NoteModerate_Alz" name="noteModerateAlz" rows="2" disabled></textarea>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-4 pt-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="RadioAlz" value="3" id="flexCheckSevere_Alz">
                                            <label class="form-check-label" for="flexCheckSevere">
                                                <h5>Severe</h5>
                                                <p></p>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-4 pt-3">
                                        <h5>รายละเอียดที่ใช้ประเมิน</h5>
                                        <p>-G309</p>
                                    </div>
                                    <div class="col-3 pt-2">

                                        <input type="checkbox" class="btn-check" id="btnSevere_Alz1" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnSevere_Alz1">G309</label>

                                        <h5>บันทึกข้อมูล</h5>
                                        <textarea class="form-control" id="NoteSevere_Alz" name="noteSevereAlz" rows="2" disabled></textarea>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-7 pt-3">
                                        <label for="Note" class="form-label">*หมายเหตุ</label>
                                        <textarea class="form-control" id="Note_Alz" name="noteAlz" rows="2"></textarea>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-content-PK">
                        <div class="modal-body">
                            <!--เนื้อหาสำหรับแท็บ "PK" จะถูกเพิ่มที่นี่-->
                            <h3>Parkinson</h3>
                            <form id="form-PK">
                                <div class="row pt-3">
                                    <div class="col-4 pt-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="RadioPK" value="1" id="flexCheckMild_PK">
                                            <label class="form-check-label" for="flexCheckMild">
                                                <h5>Mild</h5>
                                                <p></p>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-4 pt-3">
                                        <h5>รายละเอียดที่ใช้ประเมิน</h5>
                                        <p></p>
                                    </div>
                                    <div class="col-3 pt-2">

                                        <h5>บันทึกข้อมูล</h5>
                                        <textarea class="form-control" id="NoteMild_PK" name="noteMildPK" rows="2" disabled></textarea>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-4 pt-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="RadioPK" value="2" id="flexCheckModerate_PK">
                                            <label class="form-check-label" for="flexCheckModerate">
                                                <h5>Moderate</h5>
                                                <p></p>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-4 pt-3">
                                        <h5>รายละเอียดที่ใช้ประเมิน</h5>
                                    </div>
                                    <div class="col-3 pt-2">

                                        <h5>บันทึกข้อมูล</h5>
                                        <textarea class="form-control" id="NoteModerate_PK" name="noteModeratePK" rows="2" disabled></textarea>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-4 pt-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="RadioPK" value="3" id="flexCheckSevere_PK">
                                            <label class="form-check-label" for="flexCheckSevere">
                                                <h5>Severe</h5>
                                                <p></p>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-4 pt-3">
                                        <h5>รายละเอียดที่ใช้ประเมิน</h5>
                                        <p>-G20</p>
                                    </div>
                                    <div class="col-3 pt-2">

                                        <input type="checkbox" class="btn-check" id="btnSevere_PK1" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnSevere_PK1">G309</label>

                                        <h5>บันทึกข้อมูล</h5>
                                        <textarea class="form-control" id="NoteSevere_PK" name="noteSeverePK" rows="2" disabled></textarea>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-7 pt-3">
                                        <label for="Note" class="form-label">*หมายเหตุ</label>
                                        <textarea class="form-control" id="Note_PK" name="notePK" rows="2"></textarea>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-content-DEM">
                        <div class="modal-body">
                            <!--เนื้อหาสำหรับแท็บ "DEM" จะถูกเพิ่มที่นี่-->
                            <h3>Dementia</h3>
                            <form id="form-DEM">
                                <div class="row pt-3">
                                    <div class="col-4 pt-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="RadioDEM" value="1" id="flexCheckMild_DEM">
                                            <label class="form-check-label" for="flexCheckMild">
                                                <h5>Mild</h5>
                                                <p></p>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-4 pt-3">
                                        <h5>รายละเอียดที่ใช้ประเมิน</h5>
                                        <p></p>
                                    </div>
                                    <div class="col-3 pt-2">

                                        <h5>บันทึกข้อมูล</h5>
                                        <textarea class="form-control" id="NoteMild_DEM" name="noteMildDEM" rows="2" disabled></textarea>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-4 pt-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="RadioDEM" value="2" id="flexCheckModerate_DEM">
                                            <label class="form-check-label" for="flexCheckModerate">
                                                <h5>Moderate</h5>
                                                <p></p>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-4 pt-3">
                                        <h5>รายละเอียดที่ใช้ประเมิน</h5>
                                    </div>
                                    <div class="col-3 pt-2">

                                        <h5>บันทึกข้อมูล</h5>
                                        <textarea class="form-control" id="NoteModerate_DEM" name="noteModerateDEM" rows="2" disabled></textarea>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-4 pt-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="RadioDEM" value="3" id="flexCheckSevere_DEM">
                                            <label class="form-check-label" for="flexCheckSevere">
                                                <h5>Severe</h5>
                                                <p></p>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-4 pt-3">
                                        <h5>รายละเอียดที่ใช้ประเมิน</h5>
                                        <p>-F03</p>
                                    </div>
                                    <div class="col-3 pt-2">

                                        <input type="checkbox" class="btn-check" id="btnSevere_DEM1" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnSevere_DEM1">G309</label>

                                        <h5>บันทึกข้อมูล</h5>
                                        <textarea class="form-control" id="NoteSevere_DEM" name="noteSevereDEM" rows="2" disabled></textarea>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-7 pt-3">
                                        <label for="Note" class="form-label">*หมายเหตุ</label>
                                        <textarea class="form-control" id="Note_DEM" name="noteDEM" rows="2"></textarea>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>


                    <!--<div class="tab-pane fade" id="tab-content-Refer">
                        <div class="modal-body">
                            เนื้อหาสำหรับแท็บ "Refer" จะถูกเพิ่มที่นี่
                            <h3>Refer จาก PCU โดยแพทย์/Refer จาก รพ.ลูกข่าย</h3>
                            <form id="form-Refer">
                                <div class="row pt-3">
                                    <div class="col-4 pt-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="Refer" value="1" id="flexCheckMild_Refer">
                                            <label class="form-check-label" for="flexCheckMild">
                                                <h5>Mild</h5>
                                                <p></p>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-4 pt-3">
                                        <h5>รายละเอียดที่ใช้ประเมิน</h5>
                                        <p></p>
                                    </div>
                                    <div class="col-3 pt-2">

                                        <h5>บันทึกข้อมูล</h5>
                                        <textarea class="form-control" id="NoteMild_Refer" rows="2"></textarea>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-4 pt-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="Refer" value="2" id="flexCheckModerate_Refer">
                                            <label class="form-check-label" for="flexCheckModerate">
                                                <h5>Moderate</h5>
                                                <p></p>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-4 pt-3">
                                        <h5>รายละเอียดที่ใช้ประเมิน</h5>
                                        <p></p>
                                    </div>
                                    <div class="col-3 pt-2">

                                        <h5>บันทึกข้อมูล</h5>
                                        <textarea class="form-control" id="NoteModerate_Refer" rows="2"></textarea>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-4 pt-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="Refer" value="3" id="flexCheckSevere_Refer">
                                            <label class="form-check-label" for="flexCheckSevere">
                                                <h5>Severe</h5>
                                                <p></p>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-4 pt-3">
                                        <h5>รายละเอียดที่ใช้ประเมิน</h5>
                                        <p></p>
                                    </div>
                                    <div class="col-3 pt-2">

                                        <h5>บันทึกข้อมูล</h5>
                                        <textarea class="form-control" id="NoteSevere_Refer" rows="2"></textarea>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-7 pt-3">
                                        <label for="Note" class="form-label">*หมายเหตุ</label>
                                        <textarea class="form-control" id="NoteRefer" rows="2"></textarea>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-content-Staff">
                        <div class="modal-body">
                            เนื้อหาสำหรับแท็บ "Staff" จะถูกเพิ่มที่นี่
                            <h3>ผู้รับบริบาลที่ Staff Med นัดเอง</h3>
                            <form id="form-Staff">
                                <div class="row pt-3">
                                    <div class="col-4 pt-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="Staff" value="1" id="flexCheckMild_Staff">
                                            <label class="form-check-label" for="flexCheckMild">
                                                <h5>Mild</h5>
                                                <p></p>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-4 pt-3">
                                        <h5>รายละเอียดที่ใช้ประเมิน</h5>
                                        <p></p>
                                    </div>
                                    <div class="col-3 pt-2">

                                        <h5>บันทึกข้อมูล</h5>
                                        <textarea class="form-control" id="NoteMild_Staff" rows="2"></textarea>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-4 pt-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="Staff" value="2" id="flexCheckModerate_Staff">
                                            <label class="form-check-label" for="flexCheckModerate">
                                                <h5>Moderate</h5>
                                                <p></p>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-4 pt-3">
                                        <h5>รายละเอียดที่ใช้ประเมิน</h5>
                                        <p></p>
                                    </div>
                                    <div class="col-3 pt-2">

                                        <h5>บันทึกข้อมูล</h5>
                                        <textarea class="form-control" id="NoteModerate_Staff" rows="2"></textarea>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-4 pt-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="Staff" value="3" id="flexCheckSevere_Staff">
                                            <label class="form-check-label" for="flexCheckSevere">
                                                <h5>Severe</h5>
                                                <p></p>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-4 pt-3">
                                        <h5>รายละเอียดที่ใช้ประเมิน</h5>
                                        <p></p>
                                    </div>
                                    <div class="col-3 pt-2">

                                        <h5>บันทึกข้อมูล</h5>
                                        <textarea class="form-control" id="NoteSevere_Staff" rows="2"></textarea>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-7 pt-3">
                                        <label for="Note" class="form-label">*หมายเหตุ</label>
                                        <textarea class="form-control" id="NoteStaff" rows="2"></textarea>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-content-APM_MED_ICU">
                        <div class="modal-body">
                            เนื้อหาสำหรับแท็บ "APM_MED_ICU" จะถูกเพิ่มที่นี่
                            <h3>นัดติดตามอาการหลังจำหน่าย จาก ตึก MED /ICU</h3>
                            <form id="from-APM_MED_ICU">
                                <div class="row pt-3">
                                    <div class="col-4 pt-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="APM_MED_ICU" value="1" id="flexCheckMild_APM_MED_ICU">
                                            <label class="form-check-label" for="flexCheckMild">
                                                <h5>Mild</h5>
                                                <p></p>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-4 pt-3">
                                        <h5>รายละเอียดที่ใช้ประเมิน</h5>
                                        <p></p>
                                    </div>
                                    <div class="col-3 pt-2">

                                        <h5>บันทึกข้อมูล</h5>
                                        <textarea class="form-control" id="NoteMild_ICU" rows="2"></textarea>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-4 pt-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="APM_MED_ICU" value="2" id="flexCheckModerate_APM_MED_ICU">
                                            <label class="form-check-label" for="flexCheckModerate">
                                                <h5>Moderate</h5>
                                                <p></p>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-4 pt-3">
                                        <h5>รายละเอียดที่ใช้ประเมิน</h5>
                                        <p></p>
                                    </div>
                                    <div class="col-3 pt-2">

                                        <h5>บันทึกข้อมูล</h5>
                                        <textarea class="form-control" id="NoteModerate_ICU" rows="2"></textarea>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-4 pt-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="APM_MED_ICU" value="3" id="flexCheckSevere_APM_MED_ICU">
                                            <label class="form-check-label" for="flexCheckSevere">
                                                <h5>Severe</h5>
                                                <p></p>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-4 pt-3">
                                        <h5>รายละเอียดที่ใช้ประเมิน</h5>
                                        <p></p>
                                    </div>
                                    <div class="col-3 pt-2">

                                        <h5>บันทึกข้อมูล</h5>
                                        <textarea class="form-control" id="NoteSevere_ICU" rows="2"></textarea>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-7 pt-3">
                                        <label for="Note" class="form-label">*หมายเหตุ</label>
                                        <textarea class="form-control" id="NoteAPM_MED_ICU" rows="2"></textarea>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-content-Consult">
                        <div class="modal-body">
                            เนื้อหาสำหรับแท็บ "Consult" จะถูกเพิ่มที่นี่
                            <h3>ส่ง Consult อายุกรรม</h3>
                            <form id="form-Consult">
                                <div class="row pt-3">
                                    <div class="col-4 pt-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="Consult" value="1" id="flexCheckMild_Consult">
                                            <label class="form-check-label" for="flexCheckMild">
                                                <h5>Mild</h5>
                                                <p></p>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-4 pt-3">
                                        <h5>รายละเอียดที่ใช้ประเมิน</h5>
                                        <p></p>
                                    </div>
                                    <div class="col-3 pt-2">

                                        <h5>บันทึกข้อมูล</h5>
                                        <textarea class="form-control" id="NoteMild_Consult" rows="2"></textarea>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-4 pt-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="Consult" value="2" id="flexCheckModerate_Consult">
                                            <label class="form-check-label" for="flexCheckModerate">
                                                <h5>Moderate</h5>
                                                <p></p>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-4 pt-3">
                                        <h5>รายละเอียดที่ใช้ประเมิน</h5>
                                        <p></p>
                                    </div>
                                    <div class="col-3 pt-2">

                                        <h5>บันทึกข้อมูล</h5>
                                        <textarea class="form-control" id="NoteModerate_Consult" rows="2"></textarea>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-4 pt-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="Consult" value="3" id="flexCheckSevere_Consult">
                                            <label class="form-check-label" for="flexCheckSevere">
                                                <h5>Severe</h5>
                                                <p></p>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-4 pt-3">
                                        <h5>รายละเอียดที่ใช้ประเมิน</h5>
                                        <p></p>
                                    </div>
                                    <div class="col-3 pt-2">

                                        <h5>บันทึกข้อมูล</h5>
                                        <textarea class="form-control" id="NoteSevere_Consult" rows="2"></textarea>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-7 pt-3">
                                        <label for="Note" class="form-label">*หมายเหตุ</label>
                                        <textarea class="form-control" id="NoteConsult" rows="2"></textarea>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-content-Income">
                        <div class="modal-body">
                            เนื้อหาสำหรับแท็บ "Income" จะถูกเพิ่มที่นี่
                            <h3>เบิกกรมบัญชีกลาง/อปท./รัฐวิสาหกิจ/ชำระเงินเอง</h3>
                            <form id="form-Income">
                                <div class="row pt-3">
                                    <div class="col-4 pt-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="Income" value="1" id="flexCheckMild_Income">
                                            <label class="form-check-label" for="flexCheckMild">
                                                <h5>Mild</h5>
                                                <p></p>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-4 pt-3">
                                        <h5>รายละเอียดที่ใช้ประเมิน</h5>
                                        <p></p>
                                    </div>
                                    <div class="col-3 pt-2">

                                        <h5>บันทึกข้อมูล</h5>
                                        <textarea class="form-control" id="NoteMild_Income" rows="2"></textarea>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-4 pt-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="Income" value="2" id="flexCheckModerate_Income">
                                            <label class="form-check-label" for="flexCheckModerate">
                                                <h5>Moderate</h5>
                                                <p></p>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-4 pt-3">
                                        <h5>รายละเอียดที่ใช้ประเมิน</h5>
                                        <p></p>
                                    </div>
                                    <div class="col-3 pt-2">

                                        <h5>บันทึกข้อมูล</h5>
                                        <textarea class="form-control" id="NoteModerate_Income" rows="2"></textarea>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-4 pt-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="Income" value="3" id="flexCheckSevere_Income">
                                            <label class="form-check-label" for="flexCheckSevere">
                                                <h5>Severe</h5>
                                                <p></p>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-4 pt-3">
                                        <h5>รายละเอียดที่ใช้ประเมิน</h5>
                                        <p></p>
                                    </div>
                                    <div class="col-3 pt-2">

                                        <h5>บันทึกข้อมูล</h5>
                                        <textarea class="form-control" id="NoteSevere_Income" rows="2"></textarea>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-7 pt-3">
                                        <label for="Note" class="form-label">*หมายเหตุ</label>
                                        <textarea class="form-control" id="NoteIncome" rows="2"></textarea>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>-->
                    <!--<div class="tab-pane fade" id="tab-content-Gout">
                        <div class="modal-body">
                            เนื้อหาสำหรับแท็บ "Gout" จะถูกเพิ่มที่นี่
                            <h3>Gout</h3>
                            <form id="form-Gout">
                                <div class="row pt-3">
                                    <div class="col-4 pt-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="RadioGout" value="1" id="flexCheckMild_Gout">
                                            <label class="form-check-label" for="flexCheckMild">
                                                <h5>Mild</h5>
                                                <p></p>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-4 pt-3">
                                        <h5>รายละเอียดที่ใช้ประเมิน</h5>
                                        <p>M100-M109</p>
                                    </div>
                                    <div class="col-3 pt-2">

                                        <input type="checkbox" class="btn-check" id="btnMild_Gout" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnMild_Gout">M100-M109</label>

                                        <h5>บันทึกข้อมูล</h5>
                                        <textarea class="form-control" id="NoteMild_Gout" name="noteMildGout" rows="2" disabled></textarea>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-4 pt-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="RadioGout" value="2" id="flexCheckModerate_Gout">
                                            <label class="form-check-label" for="flexCheckModerate">
                                                <h5>Moderate</h5>
                                                <p></p>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-4 pt-3">
                                        <h5>รายละเอียดที่ใช้ประเมิน</h5>
                                        <p>M100-M109</p>
                                    </div>
                                    <div class="col-3 pt-2">

                                        <input type="checkbox" class="btn-check" id="btnModerate_Gout" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnModerate_Gout">M100-M109</label>

                                        <h5>บันทึกข้อมูล</h5>
                                        <textarea class="form-control" id="NoteModerate_Gout" name="noteModerateGout" rows="2" disabled></textarea>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-4 pt-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="RadioGout" value="3" id="flexCheckSevere_Gout">
                                            <label class="form-check-label" for="flexCheckSevere">
                                                <h5>Severe</h5>
                                                <p></p>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-4 pt-3">
                                        <h5>รายละเอียดที่ใช้ประเมิน</h5>
                                        <p>M100-M109</p>
                                    </div>
                                    <div class="col-3 pt-2">

                                        <input type="checkbox" class="btn-check" id="btnSevere_Gout" autocomplete="off" disabled>
                                        <label class="btn btn-outline-primary" for="btnSevere_Gout">M100-M109</label>

                                        <h5>บันทึกข้อมูล</h5>
                                        <textarea class="form-control" id="NoteSevere_Gout" name="noteSevereGout" rows="2" disabled></textarea>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-7 pt-3">
                                        <label for="Note" class="form-label">*หมายเหตุ</label>
                                        <textarea class="form-control" id="Note_Gout" name="noteGout" rows="2"></textarea>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>-->
                    <!--<div class="tab-pane fade" id="tab-content-Stroke_non_IMC">
                        <div class="modal-body">
                            เนื้อหาสำหรับแท็บ "Stroke_non_IMC" จะถูกเพิ่มที่นี่
                            <h3>Stroke non IMC</h3>
                            <form id="form-Stroke_non_IMC">
                                <div class="row pt-3">
                                    <div class="col-4 pt-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="RadioStroke_non_IMC" value="1" id="flexCheckMild_Stroke_non_IMC">
                                            <label class="form-check-label" for="flexCheckMild">
                                                <h5>Mild</h5>
                                                <p></p>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-4 pt-3">
                                        <h5>รายละเอียดที่ใช้ประเมิน</h5>
                                        <p></p>
                                    </div>
                                    <div class="col-3 pt-2">
                                        <h5>บันทึกข้อมูล</h5>
                                        <textarea class="form-control" id="NoteMild_Stroke_non_IMC" name="noteMildStroke_non_IMC" rows="2" disabled></textarea>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-4 pt-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="RadioStroke_non_IMC" value="2" id="flexCheckModerate_Stroke_non_IMC">
                                            <label class="form-check-label" for="flexCheckModerate">
                                                <h5>Moderate</h5>
                                                <p></p>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-4 pt-3">
                                        <h5>รายละเอียดที่ใช้ประเมิน</h5>
                                        <p></p>
                                    </div>
                                    <div class="col-3 pt-2">
                                        <h5>บันทึกข้อมูล</h5>
                                        <textarea class="form-control" id="NoteModerate_Stroke_non_IMC" name="noteModerateStroke_non_IMC" rows="2" disabled></textarea>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-4 pt-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="RadioStroke_non_IMC" value="3" id="flexCheckSevere_Stroke_non_IMC">
                                            <label class="form-check-label" for="flexCheckSevere">
                                                <h5>Severe</h5>
                                                <p></p>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-4 pt-3">
                                        <h5>รายละเอียดที่ใช้ประเมิน</h5>
                                        <p></p>
                                    </div>
                                    <div class="col-3 pt-2">
                                        <h5>บันทึกข้อมูล</h5>
                                        <textarea class="form-control" id="NoteSevere_Stroke_non_IMC" name="noteSevereStroke_non_IMC" rows="2" disabled></textarea>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-7 pt-3">
                                        <label for="Note" class="form-label">*หมายเหตุ</label>
                                        <textarea class="form-control" id="Note_Stroke_non_IMC" name="noteStroke_non_IMC" rows="2"></textarea>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-content-Monk_StaffMed">
                        <div class="modal-body">
                            เนื้อหาสำหรับแท็บ "Monk_StaffMed" จะถูกเพิ่มที่นี่
                            <h3>พระสงฆ์ ผู้สูงอายุ กลุ่มที่ไม่เข้าเกณฑ์พบ Staff Med</h3>
                            <form id="form-Monk_StaffMed">
                                <div class="row pt-3">
                                    <div class="col-4 pt-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="RadioMonk_StaffMed" value="1" id="flexCheckMild_Monk_StaffMed">
                                            <label class="form-check-label" for="flexCheckMild">
                                                <h5>Mild</h5>
                                                <p></p>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-4 pt-3">
                                        <h5>รายละเอียดที่ใช้ประเมิน</h5>
                                        <p></p>
                                    </div>
                                    <div class="col-3 pt-2">
                                        <h5>บันทึกข้อมูล</h5>
                                        <textarea class="form-control" id="NoteMild_Monk_StaffMed" name="noteMildMonk_StaffMed" rows="2" disabled></textarea>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-4 pt-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="RadioMonk_StaffMed" value="2" id="flexCheckModerate_Monk_StaffMed">
                                            <label class="form-check-label" for="flexCheckModerate">
                                                <h5>Moderate</h5>
                                                <p></p>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-4 pt-3">
                                        <h5>รายละเอียดที่ใช้ประเมิน</h5>
                                        <p></p>
                                    </div>
                                    <div class="col-3 pt-2">
                                        <h5>บันทึกข้อมูล</h5>
                                        <textarea class="form-control" id="NoteModerate_Monk_StaffMed" name="noteModerateMonk_StaffMed" rows="2" disabled></textarea>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-4 pt-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="RadioMonk_StaffMed" value="3" id="flexCheckSevere_Monk_StaffMed">
                                            <label class="form-check-label" for="flexCheckSevere">
                                                <h5>Severe</h5>
                                                <p></p>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-4 pt-3">
                                        <h5>รายละเอียดที่ใช้ประเมิน</h5>
                                        <p></p>
                                    </div>
                                    <div class="col-3 pt-2">

                                        <h5>บันทึกข้อมูล</h5>
                                        <textarea class="form-control" id="NoteSevere_Monk_StaffMed" name="noteSevereMonk_StaffMed" rows="2" disabled></textarea>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-7 pt-3">
                                        <label for="Note" class="form-label">*หมายเหตุ</label>
                                        <textarea class="form-control" id="Note_Monk_StaffMed" name="noteMonk_StaffMed" rows="2"></textarea>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>-->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="confirmButton" data-bs-dismiss="modal">คอนเฟิร์ม</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="d-grid gap-2 d-md-flex justify-content-md-end pe-5">
        <button type="button" class="btn btn-light" onclick="clearData()">
            เคลียร์ข้อมูล
        </button>
        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
            เลือกกลุ่มโรค
        </button>

        <button type="button" name="button" id="submitAllForms" class="btn btn-primary" value="เลือก" disabled>
            บันทึก
        </button>
    </div>
</div>

<br>

<script src="Controller\search.js"></script>
<script src="Controller\pt-check-in-color.js"></script>
<!--<script src="Controller\selectdate.js"></script>-->
<script src="Controller\selectradio.js"></script>
<script src="Controller\calculate.js"></script>
<script src="Controller\textarea.js"></script>
<script src="Controller\submit.js"></script>


<script>
    var colorBlock = document.getElementById('colorBlock');
    var colorRadios = document.querySelectorAll('input[name="color"]');
    var selectedColorElement = document.getElementById('selectedColor');

    colorRadios.forEach(function(radio) {
        radio.addEventListener('change', function() {
            if (this.checked) {
                colorBlock.style.backgroundColor = this.value;
                selectedColorElement.textContent = this.parentNode.textContent.trim();
            }
        });
    });
</script>

<script>
    function updateTime() {
        // Get the current date and time
        var currentDate = new Date();

        // Format the date and time
        var date = currentDate.toLocaleDateString();
        var time = currentDate.toLocaleTimeString();

        // Update the HTML elements
        document.getElementById('date').textContent = date;
        document.getElementById('time').textContent = time;
    }

    // Call updateTime() every second
    setInterval(updateTime, 1000);
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const tabs = document.querySelectorAll(".nav-link[data-toggle='tab']");
        const tabContents = document.querySelectorAll(".tab-pane");

        tabs.forEach(tab => {
            tab.addEventListener("click", function(event) {
                event.preventDefault();

                const targetTab = tab.getAttribute("href");

                tabs.forEach(tab => {
                    tab.classList.remove("active");
                });
                tab.classList.add("active");

                tabContents.forEach(content => {
                    if ("#" + content.id === targetTab) {
                        content.classList.add("show", "active");
                    } else {
                        content.classList.remove("show", "active");
                    }
                });
            });
        });
    });
</script>

<script>
    function clearData() {
        // รีเฟรชหน้า
        location.reload();
    }
</script>