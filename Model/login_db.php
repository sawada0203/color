<?php
session_name("app_color"); // กำหนดชื่อ session ให้แตกต่าง
session_start();
include("kcon.php");

$errors = array();

if (isset($_POST['login_user'])) {

    $username = mysqli_real_escape_string($conn, $_POST['user']);
    $password = mysqli_real_escape_string($conn, $_POST['pass']);

    if (empty($username) && empty($password)) {
        array_push($errors, "กรุณาใส่ UserName และ Password");
        $_SESSION['error'] = "UserName หรือ Password ไม่ถูกต้อง!";
        header("location: ../login.php");
    } else {
        if (empty($username)) {
            array_push($errors, "Username is required");
            $_SESSION['error'] = "UserName ไม่ถูกต้อง!";
            header("location: ../login.php");
        }
    
        if (empty($password)) {
            array_push($errors, "Password is required");
            $_SESSION['error'] = "Password ไม่ถูกต้อง!";
            header("location: ../login.php");
        }
    }

    if (count($errors) == 0) {
        $password = md5($password);
        $stmt = $conn->prepare("SELECT loginname,name,passweb from opduser_web WHERE loginname = ? and passweb = ?  and app_user = 'Y' ");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if (mysqli_num_rows($result) == 1) {
            $_SESSION['user'] = $username;
            $_SESSION['success'] = "Your are now logged in";
            header("location: ../index.php");

        }else {
            array_push($errors, "Wrong Username/Password combination");
            $_SESSION['error'] = "UserName หรือ Password ไม่ถูกต้อง!";
            header("location: ../login.php");
        }
        
    }
}
