<?php
include('../config/server.php');
if (isset($_POST['btnSend'])) {
    $q_id = $_POST['q_id'];
    
    $img2 = $_POST['img2'];
    $img = $_FILES['img'];

    $img2 = $_POST['img2'];
    $upload = $_FILES['img']['name'];

    if ($upload != '') {
        $allow = array('jpg', 'jpeg', 'png');
        $extension = explode('.', $img['name']);
        $fileActExt = strtolower(end($extension));
        $fileNew = rand() . "." . $fileActExt;  // rand function create the rand number 
        $filePath = '../bill_img/'.$fileNew;

        if (in_array($fileActExt, $allow)) {
            if ($img['size'] > 0 && $img['error'] == 0) {
               move_uploaded_file($img['tmp_name'], $filePath);
            }
        }

    } else {
        $fileNew = $img2;
    }
                $sql1 = "UPDATE purchase SET img = '$fileNew' WHERE q_id = '$q_id'";
                if(mysqli_query($conn,$sql1)){ 
                    echo "<script>alert('บันทึกข้อมูลสำเร็จ');window.location='product_user_buy.php';</script>";
                  }
        }  

?>