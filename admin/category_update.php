<style>
@import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100;200;500;600;900&family=Sarabun:wght@200&display=swap');
body {
  min-height: 100vh;
  overflow-x: hidden;
  font-family: 'Noto Sans Thai', sans-serif;
}
</style>
<?php
include('../config/server.php');
if(isset($_GET['category_id'])){

$sql="SELECT * FROM  category WHERE category_id='".$_GET['category_id']."' ";
$result = mysqli_query($conn,$sql);//run คำสั่ง sql
$row=mysqli_fetch_array($result);
}
?>

<!doctype html>
<html lang="en">
<body>
<center>

<h4>แก้ไขประเภทสินค้า</h4>

<form method="POST" action="category_update_db.php" enctype="multipart/form-data">
    <div class="container-fluid">
        <div class="form-group" style="margin-top:10px;">
        <div class="col-md-7">
                    <input type="hidden" class="form-control" value="<?php echo $row['category_id'];  ?>" name="category_id">
                </div>
            <div class="row">
                
                <div class="col-md-3" style="margin-top:7px;">
                    <label class="control-label">ชื่อรายการ:</label>
                </div>
            
                <div class="col-md-7">
                    <input type="text" class="form-control" value="<?php echo $row['category_name'];  ?>" name="category_name">
                </div>
            </div>
        </div>
        <div><br>
            <button type="submit" name="save" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span>
                อัพเดท</button>

</div> 
</form>
</center> 
</body>
</html>
<?php ?>