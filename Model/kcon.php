<?php
    // $servername = "10.30.0.2:3306";
    // $username = "color";
    // $password = "Color@10922";
    // $dbname = "hos";

    // $conn = mysqli_connect($servername,$username,$password,$dbname);
    // mysqli_query( $conn, "SET NAMES UTF8" );

    //      if ($conn->connect_error) {
    //          die("Connection failed1: " . $conn->connect_error);
    //      } else {
    //      }

    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "his_test";

    $conn = mysqli_connect($servername,$username,$password,$dbname);
    mysqli_query( $conn, "SET NAMES UTF8" );

         if ($conn->connect_error) {
             die("Connection failed1: " . $conn->connect_error);
         } else {
         }


?>


             


