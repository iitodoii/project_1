<?php
    include('../config/server.php');
?>

<!doctype html>
<html lang="en">
<head>
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>สินค้า(ผู้หญิง)</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="../assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    <!-- Required meta tags -->
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
<style>
@import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100;200;500;600;900&family=Sarabun:wght@200&display=swap');
body {
  min-height: 100vh;
  overflow-x: hidden;
  font-family: 'Noto Sans Thai', sans-serif;
}
</style>

    <title>สมัครสมาชิก</title>
</head>
<style type="text/css">
body{
  background-image: radial-gradient(white,ghostwhite);
}
</style>

		<div class="container p-5">
    <div class="row">
    <div class="card"><br>
    <h2>สมัครสมาชิก</h2>
    <div class="col-md-12">
				<form class="login100-form validate-form" name ="form1" method="post" action="new_user.php" class="p-5 bg-white">
              <div class="form-group ">
                <div class="mb-3 mb-md-2">
                  <label class="font-weight-bold" for="username">ชื่อผู้ใช้</label>
                  <input type="text" id="username" class="form-control" name="username" required >
                </div>
              </div>
              <div class="form-group ">
                <div class="mb-3 mb-md-2">
                  <label class="font-weight-bold" for="password">รหัสผ่าน</label>
                  <input type="password" id="password" class="form-control" name="password" required >
                </div>
              </div>
              <div class="form-group ">
                <div class="mb-3 mb-md-2">
                  <label class="font-weight-bold" for="firstname">ชื่อ</label>
                  <input type="text" id="firstname" class="form-control" name="firstname" required >
                </div>
              </div>
              <div class="form-group ">
                <div class="mb-3 mb-md-2">
                  <label class="font-weight-bold" for="lastname">นามสกุล</label>
                  <input type="text" id="lastname" class="form-control" name="lastname" required >
                </div>
              </div>
              <div class="form-group ">
                <div class="mb-3 mb-md-2">
                  <label class="font-weight-bold" for="tel">เบอร์โทรศัพท์</label>
                  <input type="text" id="tel" class="form-control" name="tel" required >
                </div>
              </div>
              <div class="form-group ">
                <div class="mb-3 mb-md-2">
                  <label class="font-weight-bold" for="address">ที่อยู่</label>
                  <input type="text" id="address" class="form-control" name="address" required >
                </div>
              </div>
              <div class="form-group ">
                <div class="mb-3 mb-md-2">
                  <label class="font-weight-bold" for="username">email</label>
                  <input type="email" id="email" class="form-control" name="email" required >
                </div>
              </div>
              <div class="form-group ">
                <div class="mb-3 mb-md-2">
                  <label class="font-weight-bold" for="userlevel">สถานะ</label>
                  <select name="userlevel" id="userlevel" class="form-control" required >
                    <option value="2">ลูกค้า</option>
                    <option value="1">แอดมิน</option>
                  </select>
                </div>
              </div>
              <br>
              <div class="form-group">
                <div class="col-md-12">
               
                <button type="button" onclick="history.back()" class="btn btn-primary py-2 px-4"><i class="fas fa-reply"></i> ย้อนกลับ</button>
                  <button type="submit" name="save" class="btn btn-primary  py-2 px-4">บันทึก</button> 
                  </center>
                </div>
              </div>
              <br>
            </form>
          </div>
          </div>
          </body>
</html>
<?php

include('../config/server.php');

if(isset($_POST["save"])){ //เมื่อกดปุ่ม save
    //กำหนดตัวแปร เก็บค่าจากการ input จากฟอร์ม
   //ปิด error Notice: Undefined index: id ด้วย @ เพื่อไม่ให้ user เห็น
    @$username = $_POST['username'];
    @$password = $_POST['password']; 
    @$firstname = $_POST['firstname'];
    @$lastname = $_POST['lastname'];
    @$tel = $_POST['tel'];
    @$address = $_POST['address'];
    @$email = $_POST['email'];
    @$userlevel = $_POST['userlevel'];

    $pass = $password; 

    $sql3 = "SELECT * FROM user 
             WHERE username = '$username'
             AND  password = '$password' ";
    $qry = mysqli_query($conn,$sql3);
    $row = mysqli_num_rows($qry);
    if($row > 0) {
    exit("<script>alert('มีชื่อ - นามสกุลนี้แล้ว กรุณาตรวจสอบอีกครั้ง!');history.back();</script>");
    }

    //คำสั่ง sql
    @$sql1 = "INSERT INTO user(Username,Password,Firstname,Lastname,Tel,Add_user,email,Userlevel)
         VALUES ('$username','$pass','$firstname','$lastname','$tel','$address','$email','$userlevel')";
    
        if(mysqli_query($conn,$sql1)){ 
          echo "<script>alert('บันทึก');window.location='index_admin.php?p=user';</script>";
        }
    }
?>






