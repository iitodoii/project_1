<meta charset="UTF-8">
<?php
//1. เชื่อมต่อ database: 
include('../config/server.php');
//สร้างตัวแปรสำหรับรับค่า member_id จากไฟล์แสดงข้อมูล
$del = $_REQUEST["del"];

//ลบข้อมูลออกจาก database ตาม member_id ที่ส่งมา

$sql = "DELETE FROM slider WHERE id_slide='$del' ";
$result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());

//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
	
	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('ลบสำเร็จ');";
	echo "window.location = 'index_admin.php?p=slide'; ";
	echo "</script>";
	}
	else{
	echo "<script type='text/javascript'>";
	echo "alert('Error back to delete again');";
	echo "</script>";
}