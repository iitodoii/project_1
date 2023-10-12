<?php
	include('../config/server.php');
    if(isset($_POST["save"])){ //เมื่อกดปุ่ม save

    @$product_name = $_POST['product_name'];
    @$price = $_POST['price'];
    @$num = $_POST['num'];

    @$product_status = "เปิดการใช้งาน";    

    $sql3 = "SELECT * FROM product WHERE product_name = '$product_name' ";
    $qry = mysqli_query($conn,$sql3);
    $row = mysqli_num_rows($qry);
    if($row > 0) {
    exit("<script>alert('มีรายการ  $product_name นี้แล้ว!');history.back();</script>");
    }
	else{

        @$img = $_FILES['photo'];

        $allow = array('jpg', 'jpeg', 'png');
        $extension = explode('.', $img['name']);
        $fileActExt = strtolower(end($extension));
        $fileNew = rand() . "." . $fileActExt;  // rand function create the rand number 
        $filePath = 'upload/'.$fileNew;
    
        if (in_array($fileActExt, $allow)) {
            if ($img['size'] > 0 && $img['error'] == 0) {
                if (move_uploaded_file($img['tmp_name'], $filePath)) {


                    @$img2 = $_FILES['photo2'];

                    $allow2 = array('jpg', 'jpeg', 'png');
                    $extension2 = explode('.', $img2['name']);
                    $fileActExt2 = strtolower(end($extension2));
                    $fileNew2 = rand() . "." . $fileActExt2;  // rand function create the rand number 
                    $filePath2 = 'upload/'.$fileNew2;
                
              
	
	$sql="insert into product (product_name, price, num,photo ,product_status) values ('$product_name', '$price', '$num','$fileNew','$product_status')";
	$conn->query($sql);

    if($sql){
		echo "<script type='text/javascript'>";
		echo "alert('บันทึกข้อมูลสำเร็จ');";
		echo "window.location = 'index_admin.php?p=pro'; ";
		echo "</script>";
		}
		else{
		echo "<script type='text/javascript'>";
		echo "alert('บันทึกข้อมูลสำเร็จ');";
			echo "window.location = 'index_admin.php?p=pro'; ";
		echo "</script>";
	}
                }
            }
}
}
}
?>
