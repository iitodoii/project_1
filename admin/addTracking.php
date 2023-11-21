<?php
include('../config/server.php');

$purchaseId = $_POST['purchaseId'];
$trackingText = $_POST['trackingText'];
$sql3 = "UPDATE `purchase` SET `tracking`='$trackingText',`stu`='3' WHERE `purchaseid`='$purchaseId'";
$qry = mysqli_query($conn, $sql3);

if ($qry) {
    echo "<script>";
    echo "alert('บันทึกเลขพัสดุเรียบร้อยแล้ว');";
    echo "window.location='index_admin.php?p=shipping';";
    echo "</script>";
}
