<?php
include('../config/server.php');
if(isset($_POST['save'])){ 

	$product_id=$_POST['product_id'];
    $product_name=$_POST['product_name'];
    $product_status=$_POST['product_status'];
	$price=$_POST['price'];
    $num=$_POST['num'];

	$photo2 = $_POST['photo2'];
    $photo = $_FILES['photo'];

    $photo2 = $_POST['photo2'];
    $upload = $_FILES['photo']['name'];

    if ($upload != '') {
        $allow = array('jpg', 'jpeg', 'png');
        $extension = explode('.', $photo['name']);
        $fileActExt = strtolower(end($extension));
        $fileNew = rand() . "." . $fileActExt;  // rand function create the rand number 
        $filePath = 'upload/'.$fileNew;

        if (in_array($fileActExt, $allow)) {
            if ($photo['size'] > 0 && $photo['error'] == 0) {
               move_uploaded_file($photo['tmp_name'], $filePath);
            }
        }

    } else {
        $fileNew = $photo2;
    }

	$sql="UPDATE product SET product_name ='$product_name', product_status ='$product_status', price ='$price', num='$num',photo ='$fileNew' where product_id ='$product_id'";
	$result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());

    mysqli_close($conn);
    if($result){
		echo "<script type='text/javascript'>";
		echo "alert('อัพเดทข้อมูลสำเร็จ');";
		echo "window.location = 'index_admin.php?p=pro'; ";
		echo "</script>";
		}
		else{
		echo "<script type='text/javascript'>";
		echo "alert('อัพเดทผิดพลาด');";
			echo "window.location = 'index_admin.php?p=pro'; ";
		echo "</script>";
	}
}
	
?>