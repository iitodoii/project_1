<style>
@import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100;200;500;600;900&family=Sarabun:wght@200&display=swap');
body {
  min-height: 100vh;
  overflow-x: hidden;
  font-family: 'Noto Sans Thai', sans-serif;
}
</style>

<body>

    <div style="margin-top:10px;">
        <table class="table table-striped table-bordered">
            <thead>
                <th>
                    <center>
                        <h4 class="modal-title" id="myModalLabel">เพิ่มข้อมูลติดต่อ</h4>
                        <br><br>
                        <div>
                            <!--เริ่มฟอร์มของหน้าเพิ่มประเภทอาหาร-->
                            <?php
                            include('../config/server.php');


                            $sql="SELECT * FROM contact WHERE id_con=1 ";
                            $result = mysqli_query($conn,$sql);//run คำสั่ง sql
                            $row=mysqli_fetch_array($result);
                            ?>
                            <div class="container-fluid">
                                <form method="POST" action="" enctype="multipart/form-data">
                                    <div class="form-group" style="margin-top:10px;">
                                        <div class="row">

                    <input type="hidden" class="form-control" value="<?php echo $row['id_con'];  ?>" name="id_loc">
                                            <div class="form-group mb-3">
                                            <div class="row">
                                            <div class="col-md-3" style="margin-top:7px;">
                                                <label class="control-label">ชื่อร้าน:</label>
                                            </div>
                                            <div class="col-md-9">
                                            <input name="name" rows="6" cols="50" class="form-control" value="<?php echo $row['name']; ?>">
                                            </div>
                                        </div>
                                        </div>
                                            <div class="form-group mb-3">
                                            <div class="row">
                                            <div class="col-md-3" style="margin-top:7px;">
                                                <label class="control-label">แผนที่:</label>
                                            </div>
                                            <div class="col-md-9">
                                            <textarea name="map" rows="6" cols="50" class="form-control"><?php echo $row['map']; ?></textarea>
                                            </div>
                                        </div>
                                        </div>

                                        <div class="form-group mb-3">
                                            <div class="row">
                                            <div class="col-md-3" style="margin-top:7px;">
                                                <label class="control-label">ที่อยู่:</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="address" value="<?php echo $row['address']; ?>">
                                            </div>
                                            </div>
                                        </div>

                                        <div class="form-group mb-3">
                                            <div class="row">
                                            <div class="col-md-3" style="margin-top:7px;">
                                                <label class="control-label">เบอร์โทร:</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="tol" value="<?php echo $row['tol']; ?>">
                                            </div>
                                            </div>
                                        </div>

                                        <div class="form-group mb-3">
                                            <div class="row">
                                            <div class="col-md-3" style="margin-top:7px;">
                                                <label class="control-label">Email:</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="email" class="form-control" name="email" value="<?php echo $row['email']; ?>">
                                            </div>
                                            </div>
                                        </div>

                                        <div class="form-group mb-3">
                                            <div class="row">
                                            <div class="col-md-3" style="margin-top:7px;">
                                                <label class="control-label">Facebook:</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="facebook" value="<?php echo $row['facebook']; ?>">
                                            </div>
                                            </div>
                                        </div>

                                        <div class="form-group mb-3">
                                            <div class="row">
                                            <div class="col-md-3" style="margin-top:7px;">
                                                <label class="control-label">LINE ID:</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="line" value="<?php echo $row['line']; ?>">
                                            </div>
                                            </div>
                                        </div>

                                    </div>
                            </div>
                            <!--<div class="container-fluid">-->
                        </div>
                        <!--จบฟอร์มของหน้าเพิ่มประเภทอาหาร-->
                        <br><br><br>
                         <button type="button" onclick="history.back()" class="btn btn-primary"> ย้อนกลับ</button>
                         &nbsp;&nbsp;
                        <button type="submit" class="btn btn-success custom_1" name="save" id="save" value="save" >บันทึก</button>
                        </form>
                </th>
        </table>
    </div>
    <!--จบ <div style="margin-top:10px;"> -->
    </center>
</body>

</html>
<?php
	
	include('../config/server.php');

	  if(isset($_POST['save'])){ 
      
		$id_loc = $_POST['id_loc'];
		$map = $_POST['map'];
        $name = $_POST['name'];
        $address = $_POST['address'];
        $telephone = $_POST['tol'];
        $face = $_POST['facebook'];
		$line = $_POST['line'];
        $email = $_POST['email'];
		
		  @$sql1 = "UPDATE contact
		   SET name = '$name' , map = '$map' , facebook='$face' , line='$line',tol='$telephone' ,email='$email'  , address='$address'
		   WHERE id_con = '$id_loc'";
	  
		  if(mysqli_query($conn,$sql1)){ 
			echo "<script>alert('อัพเดทข้อมูลสำเร็จแล้ว');window.location='index_admin.php?p=connect';</script>";
		  }
	   
	  }
?>



