<?php 
session_start();
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>หลักฐานการชำระเงิน</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="../assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../css/styles.css" rel="stylesheet" />
    </head>
<body>
    <?php
      include('../config/server.php');
      include ('nav_cart.php');
	  ?><br>

      <?php
                                                $ID =  $_GET['b'];
                                                $sql = "SELECT * FROM purchase Where q_id = '$ID'";
                                                $query = mysqli_query($conn,$sql);
                                                $result=mysqli_fetch_array($query,MYSQLI_ASSOC)
                                            ?>
<center>

<div class="card" style="width: 500px;"><br>
    
    <h1 class="page-header text-center x">หลักฐานการชำระเงิน</h1>
                    <br><center>
                        <div class="form-group">
                            <?php $img = $result['img']; ?>
                            <img width="40%" <?php if($img == ""){ echo "" ; }else{ echo "src='../bill_img/$img'";} ?> id="previewImg" alt="">
                        </div>
                        </center> 
            <br>
   
</div>

</center> 
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
let imgInput = document.getElementById('imgInput');
let previewImg = document.getElementById('previewImg');

imgInput.onchange = evt => {
    const [file] = imgInput.files;
        if (file) {
            previewImg.src = URL.createObjectURL(file)
    }
}

</script>


