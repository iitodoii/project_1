
<!doctype html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>สินค้า(ผู้หญิง)</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="../assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../css/styles.css" rel="stylesheet" />
    </head>
<body>
<?php
      include('nav_cart.php');
	  include('../config/server.php');
	  ?><br><br>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card" style="width: auto;">
       <div style="margin-top:10px;"><br>
<center>

                            <div class="card" style="width: 480px;">
                            <!--เริ่มฟอร์มของหน้าเพิ่มประเภทอาหาร-->
                                            <?php
                                                $ID =  $_GET['b'];
                                                $sql = "SELECT * FROM purchase Where q_id = '$ID'";
                                                $query = mysqli_query($conn,$sql);
                                                $result=mysqli_fetch_array($query,MYSQLI_ASSOC)
                                            ?>
                                         <form method="POST" action="addin.php" enctype="multipart/form-data">
                                            <input name="q_id" type="hidden" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp"
                                            value="<?php echo $result['q_id']; ?>" readonly />

                                            <div class="col-md-12">
                                                <h1>แนบหลักฐานการชำระเงิน</h1>
                                                <br>
                                                <h3>ไทยภาณิช เลขที่บัญชี : 122-245685-3</h3>
                                                <h3>กรุงเทพ เลขที่บัญชี : 122-245685-3</h3>
                                                <h3>กรุงไทย เลขที่บัญชี : 812-2863552</h3>
                                                <h3>ทรูวอเลท เบอร์โทร : 086-1234456</h3>
                                                <div class="form-group">
                                                        <input type="file" class="form-control y" style="background-color: #eee;" id="imgInput" name="img">
                                                        
                                                        <font class="y" color="red">*อัพโหลดได้เฉพาะ .jpa .jpeg .png เท่านั้น </font>
                                                        <?php $img = $result['img']; ?>
                                                        <img width="100%" <?php if($img == ""){ echo "" ; }else{ echo "src='img/$img'";} ?> id="previewImg" alt="">
                                                        <input type="hidden" value="<?php echo $result['img']; ?>" required class="form-control" name="img2">
                                                </div>
                                                <br>
                                            </div>
    
                                    <input class="btn btn-primary" type="submit" name="btnSend" id="btnSend" value="บันทึก">
                                </form>
                        <br><br>
                        </div>   
                        <!--จบฟอร์มของหน้าเพิ่มประเภทอาหาร-->
                        <br><br><br>

                        </div>
                        </div>
                        </div>
                        </div>
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


