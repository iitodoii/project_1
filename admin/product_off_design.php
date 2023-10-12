include('../config/server.php');
<?php
// date_default_timezone_set('Asia/Bangkok');
$id = isset($_GET['product_id']);
                

               if($id){
                    $query3 = "UPDATE product SET product_status = 'เปิดการใช้งาน' 
                    WHERE product_id = '$id'  ";
                    $result3 = mysqli_query($conn, $query3);
                    
                    if($result3){
                    echo "<script>";
			           echo "alert('เปิดการใช้งานสินค้าเรียบร้อยแล้ว');";
			        echo "window.location='Product.php';";
          	        echo "</script>";
                    }
                    }