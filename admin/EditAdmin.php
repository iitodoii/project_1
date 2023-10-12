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

    <title>แก้ไขข้อมูลสมาชิก</title>
</head>
<style type="text/css">
body{
  background-image: radial-gradient(white,ghostwhite);
}
</style>
<align="center">
<div class="container">
  <div class="row">
    <div class="col-md-12">
    <?php 

        $ID = $_GET['UserID'];
        $sql = "SELECT * FROM user Where ID = '$ID'";
        $query = mysqli_query($conn,$sql);

        while($result=mysqli_fetch_array($query,MYSQLI_ASSOC)){
    ?>
    <div class="container p-3">
    <div class="row">
    <div class="card"><br>
    <h2>แก้ไขข้อมูลสมาชิก</h2>
    <div class="col-md-12">
				<form class="login100-form validate-form" name ="form1" method="post" action="updateuserphp.php" onsubmit="return checkPassword()">
        <div class="form-group ">
              <div class="form-group y">
              <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="username">Email</label>
                  <input type="text" id="username" class="form-control"  value="<?php echo $result['Username']?>" name="username" required>
                  <input type="hidden" id="ID" class="form-control"  value="<?php echo $result['ID']?>" name="ID" required >
                </div>
              <br>
              <div class="form-group y">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="password">รหัสผ่านใหม่</label>
                  <input type="password" id="password" class="form-control" value="" placeholder="***********" name="password">
                  <label class="font-weight-bold" for="password">ยืนยันรหัสผ่านใหม่</label>
                  <input type="password" id="password02" class="form-control" value="" placeholder="***********" name="password02">
                  <input type="hidden" id="password" class="form-control" value="<?php echo $result['Password']?>"  name="password01" required >
                </div>
              </div>
              <br>
              <div class="form-group y">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="firstname">ชื่อ</label>
                  <input type="text" id="firstname" class="form-control" value="<?php echo $result['Firstname']?>" name="firstname" required>
                </div>
              </div>
              <br>
              <div class="form-group y">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="lastname">นามสกุล</label>
                  <input type="text" id="lastname" class="form-control" value="<?php echo $result['Lastname']?>" name="lastname" required>
                </div>
              </div>
              <br>
              <div class="form-group y">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="tel">เบอร์โทรศัพท์</label>
                  <input type="text" id="tel" class="form-control" value="<?php echo $result['Tel']?>" name="tel" required >
                </div>
              </div>
              <br>
              <div class="form-group y">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="userlevel">สถานะ</label>
                  <select name="userlevel" id="userlevel" class="form-select" required>
                    <option value="<?php echo $result['Userlevel'];?>"><?php if($result['Userlevel']==1){
                      echo 'แอดมิน';
                      }else{
                      echo 'ลูกค้า';  
                      }?></option>
                    <option value="2">ลูกค้า</option>
                    <option value="1">แอดมิน</option>
                  </select>
                </div>
              </div>
              <br>
              <?php } ?>
                <center>
                  <button type="button" onclick="history.back()" class="btn btn-primary">ย้อนกลับ</button>
                  <button type="submit" name="save" class="btn btn-primary">บันทึก</button> 
                </center>
            </form>
            <br>
            </div>
            </div>
          </div>
          </div>
          </div>
          </body>

</html>
<script>
    function checkPassword() {
        let password_1 = document.getElementById("password");
        let password_2 = document.getElementById("password02");
        if( password_1.value != password_2.value ) {
            alert("กรุณากรอกรหัสผ่าน และยืนยันรหัสผ่านให้ตรงกัน");
            return false;
        }
    }
</script>







