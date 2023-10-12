<style> 

@import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100;200;500;600;900&family=Sarabun:wght@200&display=swap');
body {  
  min-height: 100vh;
  overflow-x: hidden;
  font-family: 'Noto Sans Thai', sans-serif;
}
</style>
<?php  //
if (empty($_SESSION["ID"]) || $_SESSION["Userlevel"] != 1 ){  
    echo "<script>
    alert('โปรดเข้าสู่ระบบ  ');
    window.location.replace('../login.php');
    </script>";
}else{
?>
<body>
 <!--จบฟอร์มของหน้าเพิ่มประเภทเสื้อผ้าเสร็จโดนไปหน้า category_seva--><!--จบฟอร์มของหน้าเพิ่มประเภทเสื้อผ้าเสร็จโดนไปหน้า category_seva-->
    <div style="margin-top:10px;">
        <table class="table table-striped table-bordered">
            <thead>
                <th>
                    <center>
                        <h4 class="modal-title" id="myModalLabel">เพิ่มประเภทสินค้า</h4>
                        <br><br>
                        <div>
                            <!--เริ่มฟอร์มของหน้าเพิ่มประเภทอาหาร-->
                            <div class="container-fluid">
                                <form method="POST" action="" enctype="multipart/form-data">
                                    <div class="form-group" style="margin-top:10px;">
                                        <div class="row">
                                            <div class="col-md-3" style="margin-top:7px;">
                                                <label class="control-label">ชื่อประเภท:</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="category_name" required>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <!--<div class="container-fluid">-->
                        </div>
                        <!--จบฟอร์มของหน้าเพิ่มประเภทเสื้อผ้าเสร็จโดนไปหน้า category_seva-->
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
<?php } ?>
</html>
<?php
	include('../config/server.php');

    if(isset($_POST["save"])){ //เมื่อกดปุ่ม save

	$category_name=$_POST['category_name'];
    $category_status="เปิดการใช้งาน";
    $sql3 = "SELECT * FROM category WHERE category_name = '$category_name' ";
    $qry = mysqli_query($conn,$sql3);
    $row = mysqli_num_rows($qry);

    if($row > 0) {
    exit("<script>alert('มีรายการ  $category_name นี้แล้ว!');history.back();</script>");
    }
	else {
		$sql="insert into category (category_id, category_name ,category_status) values ('null','$category_name','$category_status')";
		$conn->query($sql);
	
		if($sql){
			echo "<script type='text/javascript'>";
			echo "alert('บันทึกข้อมูลสำเร็จ');";
			echo "window.location = 'index_admin.php?p=cate'; ";
			echo "</script>";
			}
			else{
			echo "<script type='text/javascript'>";
			echo "alert('บันทึกข้อมูลผิดพลาด!!');";
				echo "window.location = 'index_admin.php?p=cate'; ";
			echo "</script>";
		}
	}
	}

?>



