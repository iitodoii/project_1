<?php
	      @session_start();
		  @error_reporting(0);
		  include('../config/server.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Confirm</title>
</head>
<body>
<!--สร้างตัวแปรสำหรับบันทึกการสั่งซื้อ -->
<?php

    $UserID = $_SESSION['ID'];
    $name_booking = $_POST['firstname'];
	$add_booking = $_POST['Add_user'];
	$transport = $_POST['transport'];
	$tel_booking = $_POST['tel_booking'];
    $tel_email = $_POST['tel_email'];

    $sql2 = "select max(q_id) as q_id from purchase";
	$query2	= mysqli_query($conn, $sql2);
	$row = mysqli_fetch_array($query2);

	$q_id = $row["q_id"];
    if($q_id==''){
        $q_id=100001;
    }else{
        $q_id = ($q_id + 1);
    }

//PHP foreach() เป็นคำสั่งเพื่อนำข้อมูลออกมาจากตัวแปลที่เป็นประเภท array โดยสามารถเรียกค่าได้ทั้ง $key และ $value ของ array
	foreach($_SESSION['cart'] as $ID=>$qty)
	{
		$sql3	= "select * from product where product_id ='$ID'";
		$query3	= mysqli_query($conn, $sql3);
		$row3	= mysqli_fetch_array($query3);
		$price= $row3['price']*$qty;
        $count=mysqli_num_rows($query3);  

		$sql4	= "insert into purchase_detail (q_id,product_id,price,quantity)
		values('$q_id','$ID', '$price','$qty')";
		$query4	= mysqli_query($conn, $sql4);

   }

   $sql1	= "insert into purchase (q_id, ID, date_purchase , name_booking ,tel_booking, add_booking , email, transport)
   values('$q_id','$UserID', NOW() , '$name_booking' , '$tel_booking','$add_booking', '$tel_email' , '$transport' )";
   $query1	= mysqli_query($conn, $sql1); 

	if($query4){
		mysqli_query($conn, "COMMIT");
		$msg = "บันทึกข้อมูลเรียบร้อยแล้ว ";
		foreach($_SESSION['cart'] as $ID)
		{	
			//unset($_SESSION['cart'][$p_id]);
			unset($_SESSION['cart']);
		}
	}

?>
<script type="text/javascript">
	alert("<?php echo $msg;?>");
	window.location ='product_user_buy.php';
</script>

</body>
</html>