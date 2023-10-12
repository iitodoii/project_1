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
        <?php
              include('../config/db.php');
                  $story = $conn->prepare("SELECT * FROM contact where id_con=1");
                  $story->execute();
                  $sto = $story->fetch();
              ?>
        <title><?php echo $sto['name'];?></title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="../assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../css/styles.css" rel="stylesheet" />
    </head>
<body>
    	<?php
      include ('nav_cart.php');
	  ?><br>
<div class="container text-center">
    <div class="col-md-12">
      <div class="card" style="width: auto;">
       <div style="margin-top:10px;"><br>

                        <h4 id="myModalLabel">ช่องการติดต่อร้าน</h4>
                        <br><br>
                        <div>
                            <?php
        include('../config/server.php');
        $sql="select * FROM contact
        WHERE id_con = 1";
              //AND category.categoryid = product.categoryid";
	    $query=$conn->query($sql);
	    $row=$query->fetch_array();
    ?>

                        <center><form method="POST" action="" enctype="multipart/form-data">  
                                    <div class="container" style="margin-top:10px;">
                                        <div class="row">
                                            <div class="col-md-4">
                                            <h1 class="yy"><i class="fa-brands fa-square-facebook" style="color: #0d6efd;"></i>
                                                <a type="button" target="_blank" href="<?php echo $row['facebook'];?>" class="btn btn-light" style="background-color: #0d6efd; width: 350px; color: #ffffff;"><?php echo $row['facebook'];?></a>
                                                </h1></div>
 
                                            <div class="col-md-4">
                                            <h1 class="yy"><i class="fa-brands fa-line" style="color: #198754;"></i>
                                                <a type="button" class="btn yy" target="_blank" href="http://line.me/ti/p/~<?php echo $row['line'];?>"style="background-color: #198754; width: 350px; color: #ffffff;"><?php echo $row['line'];?></a>
                                                </h1></div>


                                            <div class="col-md-4">
                                            <h1 class="yy"><i class="fa-solid fa-square-phone" style="color: #dc3545;"></i>
                                            <input type="button" class="btn yy" value="<?php echo $row['tol'];?>" style="background-color: #dc3545; width: 350px; color: #ffffff;" name="tol"  readonly/>
                                            </h1></div>
                                        </div>
                                    </div>
                                    <div class="container " style="margin-top:10px;">
                                        <div class="row">
                                            <div class="col-md-12">
                                                
                                                <?php echo $row['map'];?>
                                            </div>
                                        </div>
                                    </div>
                        </center></form>
                        </div>
                        <!--จบฟอร์มของหน้าเพิ่มประเภทสิ่งของ-->
                        </div>           

    </div>
    </div>
    </div>
    <!--จบ <div style="margin-top:10px;"> -->
      </center>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="jss/scripts.js"></script>