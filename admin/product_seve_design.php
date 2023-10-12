<?php
	include('../config/server.php');
    if(isset($_POST["save"])){ //เมื่อกดปุ่ม save
  

        $img = $_FILES['img_design'];
        $tye = $_POST['tye'];

        $allow = array('jpg', 'jpeg', 'png');
        $extension = explode('.', $img['name']);
        $fileActExt = strtolower(end($extension));
        $fileNew = rand() . "." . $fileActExt;  // rand function create the rand number 
        $filePath = 'upload/'.$fileNew;
    
        if (in_array($fileActExt, $allow)) {
            if ($img['size'] > 0 && $img['error'] == 0) {
                if (move_uploaded_file($img['tmp_name'], $filePath)) {

	
	$sql="insert into design (img_design ,tye) values ('$fileNew','$tye')";
	$conn->query($sql);

    if($sql){
		echo "<script type='text/javascript'>";
		echo "alert('บันทึกข้อมูลสำเร็จ');";
		echo "window.location = 'index_admin.php?p=de'; ";
		echo "</script>";
		}
		else{
		echo "<script type='text/javascript'>";
		echo "alert('บันทึกข้อมูลสำเร็จ');";
			echo "window.location = 'index_admin.php?p=de'; ";
		echo "</script>";
	}
                }
            }
}
}

?>
