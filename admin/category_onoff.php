<?php require_once("../config/server.php");?>
<?php
// date_default_timezone_set('Asia/Bangkok');
//$product_id = $_GET['product_id'];
//$p_id = $_GET['p_id'];
                //ปิด-เปิดการใช้สินค้า//ปิด-เปิดการใช้สินค้า//ปิด-เปิดการใช้สินค้า//ปิด-เปิดการใช้สินค้า
                if(isset($_GET['id2'])){
                    $query2 = "UPDATE category SET category_status = 'ปิดการใช้งาน' 
                    WHERE category_id = ".$_GET['id2']."  ";
                    $result2 = mysqli_query($conn, $query2);
                    
                    if($result2){
                        echo "<script>";
                           echo "alert('เปิดการใช้งานสินค้าเรียบร้อยแล้ว');";
                        echo "window.location='index_admin.php?p=cate';";
                          echo "</script>";
                        }
                    //อัฟเดชหน้าcategory--statusใน phpmyadmin-idประเภท//อัฟเดชหน้าcategory--statusใน phpmyadmin//อัฟเดชหน้าcategory--statusใน phpmyadmin
                }
               elseif(isset($_GET['id1'])) {
                    $query3 = "UPDATE category SET category_status = 'เปิดการใช้งาน' 
                    WHERE category_id = ".$_GET['id1']."  ";
                    $result3 = mysqli_query($conn, $query3);
                    
                    if($result3){
                    echo "<script>";
                    echo "alert('เปิดการใช้งานสินค้าเรียบร้อยแล้ว');";
                    echo "window.location='index_admin.php?p=cate';";
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