<?php 
session_start();
error_reporting(0);

?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>รายการสั่งซื้อสินค้า</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="../assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../css/styles.css" rel="stylesheet" />
    </head>
<body>
<?php
    
if (empty($_SESSION["ID"])){  
	  	Header("Location: ../index.php");  
}else{

  include ('nav_cart.php');

?>

  <br>
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="card" style="width: auto;"><br>

<form id="frmcart" name="frmcart" method="post" action="saveorder.php">
  <table class="table table-striped" width="600" border="0" align="center">
    <tr>
      <th width="1558" colspan="5" bgcolor="#DCDCDC">
      <strong class="y">รายการสั่งซื้อ</strong></th>
    </tr>
    <tr>
      <td class="y">รหัส</td>
      <td class="y">รายการสินค้า</td>
      <td align="right"  class="y">ราคา</td>
      <td align="right"  class="y">จำนวน</td>
      <td align="right"  class="y">รวม/รายการ</td>
    </tr>
<?php
  include('../config/server.php');
	$total=0;
	foreach($_SESSION['cart'] as $ID=>$qty)
	{
		$sql="select * , category.* from product
		left join category on category.category_id=product.category_id
		WHERE product_id='$ID' ";

		$query	= mysqli_query($conn, $sql);
		$row	= mysqli_fetch_array($query);
		$sum	= $row['price']*$qty;
		$total	+= $sum;
    $product_name=$row['product_name'];
    $product_id=$row['product_id'];
    $photo = $row['photo'];
  }
    echo "<tr>";
    echo "<td>" . $product_id . "</td>";
    echo "<td>" . $row["product_name"] . "</td>";
    echo "<td align='right'>" .number_format($row['price'],2) ."</td>";
    echo "<td align='right'>$qty</td>";
    echo "<td align='right'>".number_format($sum,2)."</td>";
    echo "</tr>";

	  echo "<tr>";
    echo "<td  align='right' colspan='4' bgcolor='#DCDCDC'><b>รวม</b></td>";
    echo "<td align='right' bgcolor='#DCDCDC'>"."<b>".number_format($total,2)."</b>"."</td>";
    echo "</tr>";

?>
</table><br>
</div>
</div>
</div>
</div>

<div class="container">
<div class="row">
<div class="col-md-12">
                              <div class="card p-5" style="width: auto;"><br>
                                    <div class="form-group " style="margin-top:10px;">
                                        <div class="row">
                                            <?php 
                                                include('../config/server.php');
                                                $UserID = $_SESSION["ID"];
                                                $sql = "SELECT * FROM user Where ID = '$UserID'";
                                                $query = mysqli_query($conn,$sql);

                                                while($result=mysqli_fetch_array($query,MYSQLI_ASSOC)){
                                            ?>
                                           <div class="col-md-6">
                                            <input type="hidden" id="ID" class="form-control" style="background-color: #eee;" value="<?php echo $result['ID']?>" name="ID" required >
                                            <label class="y">ชื่อผู้สั่งสินค้า:</label>
                                              <input type="text" id="firstname" class="form-control" style="background-color: #eee;" value="<?php echo $result['Firstname']?> <?php echo $result['Lastname']?>" name="firstname" required >
                                            </div>

                                            <div class="col-md-6">
                                            <label class="y">ที่อยู่ผู้สั่งสินค้า:</label>
                                              <input type="text" id="Add_user" class="form-control" style="background-color: #eee;" value="<?php echo $result['Add_user']?>" name="Add_user" required >
                                            </div>
                                          <div class="col-md-6">
                                            <label class="y">เลือกวิธีการจัดส่ง:</label> <br>
                                            <select name="transport" class="form-select" style="background-color: #eee;" required>
                                                <option value="">-----เลือกวิธีการจัดส่ง-----</option>
                                                    <option value="1">ส่งแบบธรรมดา 50 บาท</option>
                                                    <option value="2">ส่ง ems ไปรษณีย์ 70 บาท</option>
                                                    <option value="3">ส่ง kerry(เก็บปลายทาง) 70 บาท</option>
                                                    <option value="4">ส่ง J&T(เก็บปลายทาง) 60 บาท</option>
                                            </select>   
                                            </div>

                                            <div class="col-md-6">
                                            <label class="y">เบอร์โทรผู้รับสินค้า:</label> <br>
    
                                            <input type="text" id="tel_booking" class="form-control" style="background-color: #eee;" value="<?php echo $result['Tel']?>" name="tel_booking" required >
                                            
                                            </div>
                                            <div class="col-md-6">
                                            <label class="y">อีเมลล์ผู้รับสินค้า:</label> <br>
    
                                            <input type="email" id="tel_email" class="form-control" style="background-color: #eee;" value="<?php echo $result['email']?>" name="tel_email" required >
                                            
                                            </div>
                                          </div>
                                          <?php } ?>
                                        </div>
                                        
                                        <br>
                                        <div align="center">
                                      <input class="btn btn-success" type="submit" name="Submit2" value="สั่งซื้อ" />
                                    </div>
                                    </div>
                                    
<?php } ?>
<br>
</div>
</div>
</div>
</div>


</form>
</body>
</html>
