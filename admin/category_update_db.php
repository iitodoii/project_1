<?php
	
	include('../config/server.php');

	  if(isset($_POST['save'])){ 
      
		@$category_id = $_POST['category_id'];
		@$category_name = $_POST['category_name'];
		
		  @$sql1 = "UPDATE category
		   SET category_name = '$category_name'
		   WHERE category_id = '$category_id'";
	  
		  if(mysqli_query($conn,$sql1)){ 
			echo "<script>alert('อัพเดทข้อมูลสำเร็จแล้ว');window.location='index_admin.php?p=cate';</script>";
		  }
	   
	  }
?>

