<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Beauteous Shop</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />

        <style>
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100;200;500;600;900&family=Sarabun:wght@200&display=swap');
        body {
        min-height: 100vh;
        overflow-x: hidden;
        font-family: 'Noto Sans Thai', sans-serif;
        }
        </style>
    </head>
    <body style="background-color: #fce4ec">
        <!-- Navigation-->
        <?php include('nav.php')?>
        
         <!-- Section-->
         <div class="p-5 m-0">

         <p class="text-muted fs-4"><a href="index.php">สินค้า</a>/สินค้าขายดี</p>
                    <div class="row">
                        <?php include('config/server.php');?>

                        <?php
						  $where = "WHERE product_status ='เปิดการใช้งาน'";
                          if(isset($_GET['id1'])){
                                  $category_id=$_GET['id1'];
                                  $where = " WHERE product.category_id = $category_id AND product_status ='เปิดการใช้งาน'";
                          }
                          if(isset($_GET['id2'])){
                              $category_id=$_GET['id2'];
                              $where = " WHERE product.category_id = $category_id AND product_status ='เปิดการใช้งาน'";
                      }  
					

					$sql="select * , purchase.* , category.* , product.*  from purchase_detail
                    left join purchase on purchase.q_id = purchase_detail.q_id
                    left join product on product.product_id = purchase_detail.product_id
					left join category on category.category_id = product.category_id
					$where GROUP BY purchase_detail.product_id order by product.category_id asc, product_name asc LIMIT 0 , 6";
					$query=$conn->query($sql);
					while($row=$query->fetch_array()){
						?>

            
                    <div class="col-12 col-sm-4 col-md-3" style="margin-top: 1rem;">
					<div class="card text-center" style="width: 100%; height: 450px;">
                            <!-- Product image-->
                            <img class="card-img-top" src="admin/upload/<?php echo $row['photo']?>" height="300px" class="img-fluid"/>
                            <!-- Product details-->
                                <div class="card-body">
                                    <!-- Product name-->
                                    <?php echo $row['product_name']?>
                                    <!-- Product price--><br>
                                    <?php echo "฿" .  $row['price']?>
                                </div>
                                <div class="card-footer p-1 pt-0 border-top-0 bg-transparent">
                                <?php if(empty($_SESSION['ID'])){ ?>
                                    <div class="text-center"> <a class="btn mt-auto text-white" href="login.php" style="background-color: #ec407a;"><i class="bi-cart-fill me-1"></i> สั่งซื้อ</a></div>
                                <?php }else {?>
                                    <div class="text-center"> <a class="btn mt-auto text-white" href="emp/addcart.php?ID=<?php echo $row['product_id'];?>" style="background-color: #ec407a;"><i class="bi-cart-fill me-1"></i> สั่งซื้อ</a></div>
                                <?php } ?>
                            </div>
                    </div>
                    </div> 
         
                    <?php } ?>
                        </div>
                    </div>
                    </div>  
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
