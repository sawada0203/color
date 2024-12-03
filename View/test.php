<?php
$colorOptions = [
    ['name' => 'Blue', 'value' => 'blue'],
    ['name' => 'Green', 'value' => 'green'],
    ['name' => 'Red', 'value' => 'red']
];
$selectedColor = ['name' => 'Blue', 'value' => 'blue']; // Default color

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

// Store $CL in the database or perform any other action
// ...

?>
<!DOCTYPE html>
<html>
<head>
    <title>Color Change Example with Bootstrap</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
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
            border-radius: 0%;
            cursor: pointer;
        }
        .color-option input[type="radio"]:checked + label {
            border: 2px solid #000;
        }
    </style>
</head>
<body>


    <div class="container">
        <h3 class="mt-4">ข้อมูลผู้ป่วย</h3>

        <div class="input-group">
            <div class="form-outline col-md-4">
                <input type="search" class="form-control rounded" placeholder="ค้นหาโดยใช้ HN" aria-label="Search" aria-describedby="search-addon" />
            </div>
            <button type="button" class="btn btn-outline-primary">search</button>
        </div>
        



        <div class="container">
        <h1 class="mt-5">Color Change Example</h1>
        <div class="block" id="colorBlock"></div>
        <h3>Select a color:</h3>
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
        <h3>Selected Color: <span id="selectedColor"><?php echo $CL; ?></span></h3>
    </div>
    <!-- Include Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script>
        var colorBlock = document.getElementById('colorBlock');
        var colorRadios = document.querySelectorAll('input[name="color"]');
        var selectedColorElement = document.getElementById('selectedColor');

        colorRadios.forEach(function (radio) {
            radio.addEventListener('change', function () {
                if (this.checked) {
                    colorBlock.style.backgroundColor = this.value;
                    selectedColorElement.textContent = this.parentNode.textContent.trim();
                }
            });
        });
    </script>




        <hr>
        <form>
            <fieldset disabled>
                <div class="row">
                    <div class="col-4">
                        <label for="HN">HN</label>
                        <input type="HN" class="form-control" id="HN" placeholder="HN" value="<?php echo '0000xxxx'; ?>">
                    </div>
                    <div class="col-4">
                        <label for="CID">CID</label>
                        <input type="CID" class="form-control" id="CID" placeholder="CID" value="<?php echo 'xxxxxxxxxxxxx'; ?>">
                    </div>
                    <div class="col-4">
                        <label for="FullName">ชื่อ-นามสกุล</label>
                        <input type="FullName" class="form-control" id="FullName" placeholder="ชื่อ-นามสกุล" value="<?php echo 'นาย ทดสอบ ทดสอบ'; ?>">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-2">
                        <label for="Old">อายุ</label>
                        <input type="Old" class="form-control" id="Old" placeholder="อายุ" value="<?php echo '99' . ' ปี'; ?>">
                    </div>
                    <div class="col-2">
                        <label for="Gender">เพศ</label>
                        <input type="Gender" class="form-control" id="Gender" placeholder="เพศ" value="<?php echo 'ชาย'; ?>">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-2">
                        <label for="BP">BP</label>
                        <input type="BP" class="form-control" id="BP" placeholder="BP" value="<?php echo '120/60'; ?>">
                    </div>
                    <div class="col-2">
                        <label for="Height">ส่วนสูง</label>
                        <input type="Height" class="form-control" id="Height" placeholder="ส่วนสูง" value="<?php echo '180'; ?>">
                    </div>
                    <div class="col-2">
                        <label for="Weight">น้ำหนัก</label>
                        <input type="Weight" class="form-control" id="Weight" placeholder="น้ำหนัก" value="<?php echo '66'; ?>">
                    </div>
                    <div class="col-2">
                        <label for="Waistline">รอบเอว</label>
                        <input type="Waistline" class="form-control" id="Waistline" placeholder="รอบเอว" value="<?php echo '38'; ?>">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-6">
                        <label for="Congenital_Disease" class="form-label">โรคประจำตัว</label>
                        <textarea class="form-control" id="Congenital_Disease" rows="2"><?php echo 'ทดสอบ ทดสอบ ทดสอบ ทดสอบทดสอบ ทดสอบทดสอบ ทดสอบทดสอบ ทดสอบทดสอบ ทดสอบทดสอบ ทดสอบ'; ?></textarea>
                    </div>
                    <div class="col-6">
                        <label for="Important_Symptoms" class="form-label">อาการสำคัญ</label>
                        <textarea class="form-control" id="Important_Symptoms" rows="2"><?php echo 'ทดสอบ ทดสอบ ทดสอบ ทดสอบทดสอบ ทดสอบทดสอบ ทดสอบทดสอบ ทดสอบทดสอบ ทดสอบทดสอบ ทดสอบ'; ?></textarea>
                    </div>
                </div>
            </fieldset>
            <br>
            <hr>
            <div class="row">
                <div class="col-4">
                </div>
                <div class="col-4">
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="button" class="btn btn-primary">ยืนยัน</button>
                </div>
            </div>
        <br>   
    </div>
    </form>
</body>
</html>
