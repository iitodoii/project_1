<?php
include('../config/server.php');

if(isset($_GET['product_id'])){

    $id = $_GET['product_id'];
    $sql3 = "DELETE FROM design WHERE id_design = '$id' ";
    $result = mysqli_query($conn, $sql3) or die ("Error in query: $sql3 " . mysqli_error());
    //  sweet alert 
    if($result){
		echo "<script type='text/javascript'>";
		echo "alert('ลบข้อมูลสำเร็จ');";
		echo "window.location = 'index_admin.php?p=de'; ";
		echo "</script>";
		}
		else{
		echo "<script type='text/javascript'>";
		echo "alert('ลบข้อมูลสำเร็จ');";
		echo "window.location = 'index_admin.php?p=de'; ";
		echo "</script>";
	}
}

 //isset
?>