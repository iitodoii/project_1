<?php
	include('conn.php');

    if(empty($_POST["save"])){ //เมื่อกดปุ่ม save

	$category_name=$_POST['category_name'];

    $sql3 = "SELECT * FROM category WHERE category_name = '$category_name' ";
    $qry = mysqli_query($conn,$sql3);
    $row = mysqli_num_rows($qry);

    if($row > 0) {  
    exit("<script>alert('มีรายการ  $category_name นี้แล้ว!');history.back();</script>");
    }
	else {  //ถ้าข้อมูลประเภทสินค้าซ้ำจะขึ้นว่ามีรายการนี้แล้ว//ถ้าข้อมูลประเภทสินค้าซ้ำจะขึ้นว่ามีรายการนี้แล้ว
		$sql="insert into category (category_id, category_name) values ('null','$category_name')";
		$conn->query($sql);
	
		if($sql){
			echo "<script type='text/javascript'>";
			echo "alert('บันทึกข้อมูลสำเร็จ');";
			echo "window.location = 'category.php'; ";
			echo "</script>";
			}
			else{
			echo "<script type='text/javascript'>";
			echo "alert('บันทึกข้อมูลผิดพลาด!!');";
				echo "window.location = 'category.php'; ";
			echo "</script>";
		}
	}
	}

?>


