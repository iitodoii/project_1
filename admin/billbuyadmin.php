<head>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

<style>
@import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100;200;500;600;900&family=Sarabun:wght@200&display=swap');
a {
  font-family: 'Noto Sans Thai', sans-serif;
  font-size: 16px;
  font-style: normal;
}
.x{
  font-family: 'Noto Sans Thai', sans-serif;
  font-size: 24px;
  font-style: normal;
} 
.y{
  font-family: 'Noto Sans Thai', sans-serif;
  font-size: 16px;
  font-style: normal;
}  
</style>    

</head>
<?php 
      @session_start();
      @error_reporting(0);
?>
<?php 
if (!$_SESSION["ID"]){  
	  	Header("Location: index.php");  
}else?>
<!doctype html>
<html lang="en">

<body>

      <?php
      include('../config/server.php');
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


