

<title>แก้ไขข้อมูลส่วนตัว</title>
</head>
<link rel="icon" type="image/x-icon" href="../assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../css/styles.css" rel="stylesheet" />
<style type="text/css">
@import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100;200;500;600;900&family=Sarabun:wght@200&display=swap');
body {
  min-height: 100vh;
  overflow-x: hidden;
  font-family: 'Noto Sans Thai', sans-serif;
}
</style>
<body>
<?php include('nav_cart.php')?>
	  <br><br>
<div class="container">
  <div class="row">
    <div class="col-md-12">
    <?php 
        include('../config/server.php');
        $ID = $_GET['UserID'];
        $sql = "SELECT * FROM user Where ID = '$ID'";
        $query = mysqli_query($conn,$sql);

        while($result=mysqli_fetch_array($query,MYSQLI_ASSOC)){
    ?>
      <div class="card p-5" style="width: Auto;">
				<form class="login100-form validate-form" name ="form1" method="post" action="updateuser.php" onsubmit="return checkPassword()">
        <div class="form-group ">
                <div class="col-md-12 mb-3 mb-md-1">
                <center><h2 class="x">แก้ไขข้อมูลส่วนตัว</h2></center>
                </div>
              </div>
              <div class="form-group y">
              <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="username">Email</label>
                  <input type="text" id="username" class="form-control"  value="<?php echo $result['Username']?>" name="username" required>
                  <input type="hidden" id="ID" class="form-control" style="background-color: #eee;" value="<?php echo $result['ID']?>" name="ID" required >
                </div>
              <br>
              <div class="form-group y">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="password">รหัสผ่านใหม่</label>
                  <input type="password" id="password" class="form-control" value="" placeholder="***********" name="password">
                  <label class="font-weight-bold" for="password">ยืนยันรหัสผ่านใหม่</label>
                  <input type="password" id="password02" class="form-control" style="background-color: #FFFFF;" value="" placeholder="***********" name="password02">
                  <input type="hidden" id="password" class="form-control"  value="<?php echo $result['Password']?>"  name="password01" required >
                </div>
              </div>
              <br>
              <div class="form-group y">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="firstname">ชื่อ</label>
                  <input type="text" id="firstname" class="form-control"  value="<?php echo $result['Firstname']?>" name="firstname" required>
                </div>
              </div>
              <br>
              <div class="form-group y">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="lastname">นามสกุล</label>
                  <input type="text" id="lastname" class="form-control"  value="<?php echo $result['Lastname']?>" name="lastname" required>
                </div>
              </div>
              <br>
              <div class="form-group y">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="tel">เบอร์โทรศัพท์</label>
                  <input type="text" id="tel" class="form-control"  value="<?php echo $result['Tel']?>" name="tel" required >
                </div>
              </div>
              <br>

              <br>
              <?php } ?>
                <center>
                  <button type="submit" name="save" class="btn btn-primary  py-2 px-4">บันทึก</button> 
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
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>






