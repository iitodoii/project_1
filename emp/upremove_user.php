<?php session_start();

?>
<?php 
if (!$_SESSION["UserID"]){  
	  	Header("Location: index.php");  
}else?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
      include ('Include/header_menu_user.php');
	  ?>
</head>

<body>
    <?php
      include ('Include/menu_user.php');
	  ?>

    <div style="margin-top:10px;">
        <table class="table table-striped table-bordered">
            <thead>
                <th>
                    <center>
                        <h4 class="modal-title" id="myModalLabel"></h4>
                        <br><br>
                        <div>
                            <!--เริ่มฟอร์มของหน้าเพิ่มประเภทอาหาร-->
                            <?php
                                require_once 'conn.php';
                                if(isset($_GET['remove'])){
                                    $remove = $_GET['remove'];

                                    $sql = "SELECT * FROM purchase where q_id='$remove'";
                                    $query = mysqli_query($conn,$sql);
                                    $result=mysqli_fetch_array($query);
                        
                                }
                                ?>
                            <div class="container-fluid">
                                <form method="POST" action="" enctype="multipart/form-data">
                                    <div class="form-group" style="margin-top:10px;">

                                                <input type="hidden" class="form-control" name="q_id" value="<?php echo $result['q_id']; ?>" required>

                                        <div class="row">
                                            <div class="col-md-3" style="margin-top:7px;">
                                                <label class="control-label">สาเหตุที่ยกเลิก:</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="ditell" value="">
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <!--<div class="container-fluid">-->
                        </div>
                        <!--จบฟอร์มของหน้าเพิ่มประเภทอาหาร-->
                        <br><br><br>
                         <button type="button" onclick="history.back()" class="btn btn-primary"></i> ย้อนกลับ</button>
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
require_once 'conn.php';
if(isset($_POST['save'])){
    $q_id = $result['q_id'];
    $ditell = $_POST['ditell'];
    $stu = 5;
    $sql="UPDATE purchase SET stu='$stu' , ditell='$ditell' where q_id='$q_id'";
    $result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());
    
    if($result == TRUE){
        echo "<script>";
        echo "window.location='product_user_buy.php';";
        echo "</script>";
        }
}
?>