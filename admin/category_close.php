<?php include('conn.php')?>
<?php
$category_id = $_GET['category_id'];
// echo $id;


$sql5 = "SELECT * FROM category 
        WHERE category_id = '$category_id'";
$result5 = $conn->query($sql5);
$status = $result5->fetch_array(MYSQLI_ASSOC); 
$sts = $status['random'];


                if($sts == 'off the table'){//ถ้าปิดโต๊ะ
                    
                    $query1 = "UPDATE category SET category_status = 'Status close' 
                                WHERE category_id = '$category_id'  ";
                    $result1 = mysqli_query($conn, $query1)or die ("Error in query: $query1".mysqli_error($query1));
                    
                    if($result1 == true) {
                            echo "<script>";
			           echo "alert('อัพเดทสถานะเป็น เปิดการทำงาน แล้ว');";
			        echo "window.history.back();";
          	        echo "</script>";
                           
                                }  
                } else if($sts == 'Status close'){//ถ้าเปิดโต๊ะ
                $query1 = "UPDATE category SET category_status = 'off the table' 
                                WHERE category_id = '$category_id'  ";
                    $result1 = mysqli_query($conn, $query1)or die ("Error in query: $query1".mysqli_error($query1));
                    
                    if($result1 == true) {
                            echo "<script>";
			           echo "alert('อัพเดทสถานะเป็น ปิดการใช้งาน แล้ว');";
			        echo "window.history.back();";
          	        echo "</script>";
                           
                                }  
                } else { 
                    echo "<script>";
			        echo "alert('ไม่สามารถอัพเดทสถานะได้ เนื่องจากมีรายการอาหารเปิดอยู่');";
			        echo "window.history.back();";
          	        echo "</script>";
                }
                        
                    


?>
