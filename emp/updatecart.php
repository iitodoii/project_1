<?php 
    include('../config/server.php');
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
      include ('nav_cart.php');

isset( $_GET['ID'] ) ? $ID = $_GET['ID'] : $ID = "";
isset( $_GET['act'] ) ? $act = $_GET['act'] : $act = "";		

	if($act=='add' && !empty($ID))
	{
		if(isset($_SESSION['cart'][$ID]))
		{
			$_SESSION['cart'][$ID]++;
		}
		else
		{
			$_SESSION['cart'][$ID]=1;
		}
	}

	if($act=='remove' && !empty($ID))  //ยกเลิกการสั่งซื้อ
	{
		unset($_SESSION['cart'][$ID]);
	}

	if($act=='update')
	{
		$amount_array = $_POST['amount'];
		foreach($amount_array as $ID=>$amount)
		{
			$_SESSION['cart'][$ID]=$amount;
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
<link href="css/print.css" rel="stylesheet">
<link href="css/sty.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Shopping Cart</title>
</head>
<br>
<body>

<div class="container-fluid">
<div class="row">
  <div class="col-md-12">
    <div class="card">

<form id="frmcart" name="frmcart" method="post" action="?act=update">
  <table width="800" class="table table-hover">
	
    <tr>
      <td colspan="5">
      <h3><b>รายการสั่งซื้อ</h3></td>
    </tr>
    <tr>
      <td bgcolor="#EAEAEA"><b>รายการ</td>
      <td align="center" bgcolor="#EAEAEA"><b>ราคา</td>
      <td align="center" bgcolor="#EAEAEA"><b>จำนวน</td>
      <td align="center" bgcolor="#EAEAEA"><b>รวม(บาท)</td>
      <td align="center" bgcolor="#EAEAEA"><b>ลบ</td>
    </tr>
<?php
include('../config/server.php');
$total=0;
if(!empty($_SESSION['cart']))
{

	foreach($_SESSION['cart'] as $ID=>$qty)
	{
		$sql="select * , category.* from product
		left join category on category.category_id=product.category_id
		WHERE product_id='$ID' ";
		$query = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($query);
		$sum = $row['price'] * $qty;
		$total += $sum;
		echo "<tr>";
		echo "<td width='334'>" . $row["product_name"] ."&nbsp;("."จำนวนคงเหลือ".  $row["num"] ."&nbsp;"."ชิ้น)"."</td>";
		echo "<td width='46' align='right'>" .number_format($row["price"],2) . "</td>";
		echo "<td width='5' align='right'>";  
		echo "<input type='number' class='form-control' name='amount[$ID]' value='$qty' size='1' min='1'/></td>";
		echo "<td width='93' align='right'>".number_format($sum,2)."</td>";
		//remove product
		echo "<td width='46' align='center'><a class='btn btn-danger btn-sm' href='updatecart.php?ID=$ID&act=remove'>ลบ</a></td>";
		echo "</tr>";
	}
	echo "<tr>";
  	echo "<td colspan='3' bgcolor='#CEE7FF' align='center'><b>ราคารวม</b></td>";
  	echo "<td align='right' bgcolor='#CEE7FF'>"."<b>".number_format($total,2)."</b>"."</td>";
  	echo "<td align='left' bgcolor='#CEE7FF'></td>";
	echo "</tr>";
}
?><div class="hid">
<tr><br/>
<td><a class="btn btn-danger btn-sm" href="../index.php">เลือกสินค้าเพิ่ม</a></td>
<td colspan="4" align="right">
    <input class="btn btn-dark btn-sm" type="submit" name="button" id="button" value="ปรับปรุง" />
    <input class="btn btn-primary btn-sm" type="button" name="Submit2" value="สั่งซื้อ" onclick="window.location='confirm.php';" />
</td>

</tr></div>
</table>
</form>
</body>
</div></div></div></div>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>