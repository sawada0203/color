<?php
session_name("app_color"); // กำหนดชื่อ session ให้แตกต่าง
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Color</title>
    <link rel="stylesheet" type="text/css" href="Controller\login.css">
    <link rel="stylesheet" type="text/css" href="Controller\button.css">
</head>
<body>

<div class="header">
        <img src="img/รพ.png" width="200" height="200" />
        <h2> คัดกรอง แยกประภทผู้มารับบริบาล </h2>
        <h3> โรงพยาบาลศีขรภูมิ </h3>
    </div>

    <form action="Model/login_db.php" method="post">
        <!-- notify message  -->
        <?php if (isset($_SESSION['error'])) : ?>
            <div class="error">
                <h3>
                    <?php
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                    ?>
                </h3>
            </div>
        <?php endif ?>

        <div class="input-group">
            <label for="user" style="color: white; font-size: 22px;">User</label>
            <input type="text" name="user">
        </div>
        <div class="input-group">
            <label for="pass" style="color: white; font-size: 22px;">Password</label>
            <input type="password" id="password-field" name="pass">
        </div>
        <div class="input-group">
            <button type="button" id="toggle-password-visibility" class="btn1">Show Password</button>
        </div>
        <div class="input-group">
            <button type="submit" name="login_user" class="btn">Login</button>
        </div>

        <div class="input-group2">
            <br>
            <p> *ใช้ User และ Password เดียวกันกับ HoSXp </p>
        </div>
    </form>

    <script>
        const passwordField = document.getElementById("password-field");
        const togglePasswordVisibilityButton = document.getElementById("toggle-password-visibility");

        togglePasswordVisibilityButton.addEventListener("click", function() {
            if (passwordField.type === "password") {
                passwordField.type = "text";
                togglePasswordVisibilityButton.textContent = "Hide Password";
            } else {
                passwordField.type = "password";
                togglePasswordVisibilityButton.textContent = "Show Password";
            }
        });
    </script>


    
</body>
</html>