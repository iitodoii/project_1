<?php

include('../config/server.php');

    @$remove = $_GET['remove'];

    $stu = 5;

    @$sql1 = "UPDATE purchase SET stu ='$stu'  Where q_id = '$remove'";
    
        if(mysqli_query($conn,$sql1)){ 
          echo "<script>alert('บันทึกข้อมูลสำเร็จ');window.location='../index.php';</script>";
        }


?>