<?php include('../config/server.php');?>
<?php
// date_default_timezone_set('Asia/Bangkok');
//$product_id = $_GET['product_id'];
//$p_id = $_GET['p_id'];
                
                if(isset($_GET['product_id'])){
                    $query2 = "UPDATE product SET product_status = 'ปิดการใช้งาน' 
                    WHERE product_id = ".$_GET['product_id']."  ";
                    $result2 = mysqli_query($conn, $query2);
                    if($result2){
                        echo "<script>";
                           echo "alert('เปิดการใช้งานสินค้าเรียบร้อยแล้ว');";
                        echo "window.location='index_admin.php?p=pro';";
                          echo "</script>";
                        }

  
                }
               elseif(isset($_GET['p_id'])) {
                    $query3 = "UPDATE product SET product_status = 'เปิดการใช้งาน' 
                    WHERE product_id = ".$_GET['p_id']."  ";
                    $result3 = mysqli_query($conn, $query3);
                    
                    if($result3){
                    echo "<script>";
			           echo "alert('เปิดการใช้งานสินค้าเรียบร้อยแล้ว');";
			        echo "window.location='index_admin.php?p=pro';";
          	        echo "</script>";
                    }
                    }
                    
    //             if($result1 == true) {

    //                 $query2 = "UPDATE category SET category_onoff = 'ปิดการขาย' 
    //                 WHERE category_id = '$category_id'  ";
    //                 $result2 = mysqli_query($conn, $query2);
                
    //             }  if($result2 == true) {   
              
    //         echo "<script>";
			 //echo "alert('ปิดหมวดหมู่ $category_name เรียบร้อยแล้ว และมีเมนูจำนวน $num เมนูถูกย้ายไปหมวดหมู่ อื่นๆ');";
			 //echo "window.history.back();";
    //       	 echo "</script>";
              
    //         }
    //         } else {
    //             $query3 = "UPDATE category SET category_onoff = 'ปิดการขาย' 
    //                 WHERE category_id = '$category_id'  ";
    //                 $result3 = mysqli_query($conn, $query3);
                
    //             }  if($result3 == true) {   
              
    //         echo "<script>";
			 //echo "alert('ปิดหมวดหมู่ $category_name เรียบร้อยแล้ว');";
			 //echo "window.history.back();";
    //       	 echo "</script>";
    //         }
    //                 } else if($category_onoff == 'ปิดการขาย') {
                     
    //                  $query4 = "UPDATE category SET category_onoff = 'เปิดการขาย' 
    //                 WHERE category_id = '$category_id'  ";
    //                 $result4 = mysqli_query($conn, $query4);
                
    //             }  if($result4 == true) {   
              
    //         echo "<script>";
			 //echo "alert('เปิดหมวดหมู่ $category_name เรียบร้อยแล้ว');";
			 //echo "window.history.back();";
    //       	 echo "</script>";
    //         }
                        
?>