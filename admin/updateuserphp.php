<?php

include('../config/server.php');

if(isset($_POST["save"])){ //เมื่อกดปุ่ม save
    //กำหนดตัวแปร เก็บค่าจากการ input จากฟอร์ม
   //ปิด error Notice: Undefined index: id ด้วย @ เพื่อไม่ให้ user เห็น
    @$ID = $_POST['ID'];
    @$username = $_POST['username'];
    @$password = $_POST['password'];
    @$password01 = $_POST['password01'];  
    @$firstname = $_POST['firstname'];
    @$lastname = $_POST['lastname'];
    @$tel = $_POST['tel'];
    @$address = $_POST['address'];
    @$email = $_POST['email'];
    @$userlevel = $_POST['userlevel'];

    $sql3 = "SELECT * FROM user 
    WHERE username = '$username'
    AND  password = '$password' ";
    $qry = mysqli_query($conn,$sql3);
    $row = mysqli_num_rows($qry);


    if($password == ''){
        $pass = $password01;
        //คำสั่ง sql
        @$sql1 = "UPDATE user SET Username ='$username' ,Password ='$pass',Firstname ='$firstname',Add_user ='$address',email ='$email'
        ,Lastname ='$lastname',Tel='$tel',Userlevel='$userlevel'
        Where ID = '$ID'";

        if(mysqli_query($conn,$sql1)){ 
            echo "<script>alert('บันทึกข้อมูลสำเร็จ');window.location='index_admin.php?p=user';</script>";
        }
        }   
    else{
    //คำสั่ง sql
    @$sql1 = "UPDATE user SET Username ='$username' ,Password ='$password',Firstname ='$firstname',Add_user ='$address',email ='$email'
    ,Lastname ='$lastname',Tel='$tel',Userlevel='$userlevel'
    Where ID = '$ID'";
    
        if(mysqli_query($conn,$sql1)){ 
          echo "<script>alert('บันทึกข้อมูลสำเร็จ');window.location='index_admin.php?p=user';</script>";
        }
    }
}
?>