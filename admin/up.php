<?php
require_once("../config/server.php");
//กำยืนยัน
   
   if(isset($_GET['enter'])){
        $enter = $_GET['enter'];
        $stu = 1;
        $sql="UPDATE purchase SET stu='$stu' where q_id='$enter'";
	   $result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());

        if($result == TRUE){
          echo "<script>";
          echo "window.location='index_admin.php?p=sell&id=$enter';";
          echo "</script>";
          }

       mysqli_close($conn); 
   }
   elseif(isset($_GET['en'])){
    $en = $_GET['en'];
    $stu = 2;
    $sql="UPDATE purchase SET stu='$stu' where q_id='$en'";
    $result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());

    if($result == TRUE){
     echo "<script>";
     echo "window.location='index_admin.php?p=sell&id=$$en';";
     echo "</script>";
     }

  mysqli_close($conn); 
   }
   elseif(isset($_GET['e'])){
    $e = $_GET['e'];
    $stu = 3;
    $sql="UPDATE purchase SET stu='$stu' where q_id='$e'";
    $result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());

    if($result == TRUE){
     echo "<script>";
     echo "window.location='index_admin.php?p=sell&id=$$e';";
     echo "</script>";
     }

  mysqli_close($conn); 
   }
   elseif(isset($_GET['x'])){
     $x = $_GET['x'];
     $stu = 4;
     $sql="UPDATE purchase SET stu='$stu' where q_id='$x'";
     $result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());

     if($result == TRUE){
          echo "<script>";
          echo "window.location='index_admin.php?p=sell&id=$x';";
          echo "</script>";
          }
     
       mysqli_close($conn);
    }
   elseif(isset($_GET['remove'])){
    $remove = $_GET['remove'];
    $stu = 5;
    $sql="UPDATE purchase SET stu='$stu' where q_id='$remove'";
    $result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());
    if($result == TRUE){
     echo "<script>";
     echo "window.location='index_admin.php?p=sell&id=$remove';";
     echo "</script>";
     }

  mysqli_close($conn);
   }

        
   
?>