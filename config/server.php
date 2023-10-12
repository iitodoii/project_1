<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "clothes";

    global $conn; //สร้างตัวแปรแบบ global
    $conn = mysqli_connect($servername,$username,$password,$dbname)
    or die("ไม่สามารถเชื่อมต่อฐานข้อมูลได้");
    mysqli_query($conn,'set names utf8'); 
    //กำหนด charset ให้ฐานข้อมูลเพื่ออ่านภาษาไทยได้

    date_default_timezone_set('Asia/Bangkok');
    //check connection
    if($conn->connect_error){
        die("Connection failed:".$conn->connect_error);
    }
?>