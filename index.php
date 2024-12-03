<?php
session_name("app_color"); // กำหนดชื่อ session ให้แตกต่าง
session_start();

include("Model/kcon.php");

// เช็คว่าคีย์ "user" มีอยู่ในอาร์เรย์ $_SESSION หรือไม่
if (!isset($_SESSION['user'])) {
    $Full_Name = ''; // กำหนดค่าเริ่มต้นให้เป็นค่าว่าง
} else {
    $Full_Name = $_SESSION['user'];
}

if ($Full_Name === '') {
?>
    <script>
        window.location.href = "login.php";
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

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['user']);
    header('location: login.php');
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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv"X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient_Color</title>

    <link rel="stylesheet" href="Controller\bootstrap.css">
    <script src="Controller\Bootstrap.js"></script>
    <link rel="stylesheet" href="Controller\main.css">
    <link rel="stylesheet" href="Controller\index.css">
    <script src="Controller\jquery_main.js"></script>
    <script src="Controller\jQuery_JavaScript_Library.js"></script>
    <script src="Controller\popper.js"></script>
    <link rel="icon" href="img/รพ.png" type="image/png">

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

        .green-option {
            color: green;
            background-color: #e3dddd;
        }

        .yellow-option {
            color: yellow;
            background-color: #e3dddd;
        }

        .red-option {
            color: red;
            background-color: #e3dddd;
        }

    </style>

</head>

<body>

    <div class="row header">
        <div class="col" style="display: flex; justify-content: center; align-items: center; padding-left: 20rem;">
            <img src="img\รพ.png" width="60" height="60" />
            <h3 class="pt-3">โรงพยาบาลศีขรภูมิ</h3>
        </div>
        <div class="col-3 user-info" id="menu">
            <?php

            if (!isset($_Session['user'])) :

                $sql2 = "SELECT loginname,name,entryposition,doctorcode,hos_guid from opduser_web WHERE loginname = '" . $Full_Name . "'";
                $q2 = mysqli_query($conn, $sql2);
                while ($f2 = mysqli_fetch_assoc($q2)) {

                    $loginname = $f2['loginname'];
                    $fullname = $f2['name'];
                    $position = $f2['entryposition'];
                    $doctorcode = $f2['doctorcode'];
                    $hos_guid = $f2['hos_guid'];

            ?>
                    <div class="row justify-content-end">
                        <div class="col pt-1">
                            <img src="img/user.png" width="40" height="40" />
                        </div>
                        <div class="col-md-auto">
                            <a style="font-weight: bold;">ยินดีต้อนรับ: <?php echo $fullname; ?></a>
                            <br>
                            <a style="font-weight: bold;">ตำแหน่ง: <?php echo $position; ?></a>
                            <br>
                            <button type="button" class="btn btn-danger btn-sm logout"><a href="index.php?logout='1'" id="logout-link">Logout</a></button>
                        </div>
                    </div>
            <?php }
            endif ?>
        </div>


        <div class="col-md-auto">
            <!-- ไอคอนแฮมเบอร์เกอร์ -->
            <div class="hamburger-menu" onclick="toggleIcon(this)">
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>
            </div>
        </div>
    </div>



    <script>
        // ฟังก์ชัน JavaScript เพื่อสลับเมนู
        function toggleIcon(x) {
            x.classList.toggle("cross");
            var menu = document.getElementById("menu");
            if (menu.style.display === "block") {
                menu.style.display = "none";
            } else {
                menu.style.display = "block";
            }
        }

        // ฟังก์ชันเพื่อตรวจสอบการเปลี่ยนแปลงขนาดหน้าจอ
        function checkWindowSize() {
            var menu = document.getElementById("menu");
            if (window.innerWidth > 1250) {
                // ถ้าหน้าจอมีขนาดใหญ่กว่า 1250px, แสดงเมนู
                menu.style.display = "block";
            } else if (menu.style.display === "block" && window.innerWidth <= 1250) {
                // ถ้าหน้าจอมีขนาดเล็กกว่าหรือเท่ากับ 1250px และเมนูกำลังแสดง, ซ่อนเมนู
                menu.style.display = "none";
            }
        }

        // ตรวจจับเมื่อหน้าจอมีการเปลี่ยนแปลงขนาด
        window.onresize = checkWindowSize;
    </script>

    <!--<script>
        //AFK
        let timeoutId;
        const afkTimeout = 10 * 60 * 1000; // 5 นาที

        function resetTimer() {
            clearTimeout(timeoutId);
            timeoutId = setTimeout(() => {
                alert("คุณไม่ได้ทำกิจกรรมเป็นเวลา 5 นาที");
                // ดำเนินการเพิ่มเติมที่นี่, เช่นการเปลี่ยนเส้นทางหรือการปิดเซสชัน
                window.location.href = 'login.php'; // ตัวอย่างของการเปลี่ยนเส้นทาง
            }, afkTimeout);
        }

        // ตั้งตัวนับเวลาเมื่อโหลดหน้า
        resetTimer();

        // ตรวจจับการโต้ตอบของผู้ใช้
        document.addEventListener('mousemove', resetTimer);
        document.addEventListener('keypress', resetTimer);
        document.addEventListener('click', resetTimer);
    </script>-->


    <div><?php include("View/main.php"); ?></div>
    <br>
    <div><?php include("footer.php"); ?></div>

</body>

</html>