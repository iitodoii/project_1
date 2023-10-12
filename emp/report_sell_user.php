
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
	  ?>
      <br>  
                             <?php
                                include('../config/server.php');
                                $id = $_GET['id'];
                                $sql1="select * from purchase 
                                left join user on user.ID = purchase.ID
                                where q_id='".$_GET['id']."'";
                                $dquery1=$conn->query($sql1);
                                $drow1=$dquery1->fetch_array()
                            ?>
<div class="content" id="details<?php echo $drow1['purchaseid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                             <div class="header">
                <a href="product_user_buy.php" type="button" class="close"  aria-hidden="true"></a>
                <center><h4 class="modal-title" id="myModalLabel">รายละเอียดการสั่งซื้อ</h4></center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <h5>รหัสสั่งซื้อ : <?php echo $drow1['q_id']; ?></h5>
                    <h5>ชื่อลูกค้า: <b><?php echo $drow1['Firstname']; ?> <?php echo $drow1['Lastname']; ?></b>
                        <span class="pull-right">
                            วันที่สั่ง : <?php echo date('Y,M d,h:i A', strtotime($drow1['date_purchase'])) ?>
                        </span>
                    </h5><br/>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <th>ชื่อสินค้า</th>
                            <th>ราคา</th>
                            <th>จำนวน</th>
                            <th>ราคารวม</th>
                        </thead>
                        <tbody>
                            <?php
                                include('../config/server.php');
                                $id = $_GET['id'];
                                $sum = 0;
                                $fullsum = 0;
                                $sql="select purchase_detail.* , purchase.* , product.*, sum(purchase_detail.price) AS pi from purchase_detail
                                left join purchase on purchase.q_id = purchase_detail.q_id
                                left join product on product.product_id = purchase_detail.product_id
                                where purchase_detail.q_id='".$drow1['q_id']."'";
                                $dquery=$conn->query($sql);
                                while($drow=$dquery->fetch_array()){
                                    $pi = $drow['pi'];
                                    $sum = $drow['price'];
                                    $fullsum += $sum;
                                    $stu=$drow['stu'];
                                    ?>
                                    <tr>
                                        <td><?php echo $drow['product_name']; ?></td>
                                        <td class="text-right">&#3647; <?php echo number_format($drow['price'], 2); ?></td>
                                        <td><?php echo $drow['quantity']; ?></td>
                                        <td class="text-right">&#3647;
                                            <?php
                                                $subt = $drow['price']*$drow['quantity'];
                                                echo number_format($subt, 2);
                                            ?>
                                        </td>
                                    </tr>
                                    <?php
                                    
                                }
                            ?>
                             <tr>
                                <td class="y">ค่าส่ง</td>
                                <?php 
                                if($drow1['transport']==1){
                                    $x = 50;
                                }
                                elseif($drow1['transport']==2){
                                    $x = 70;
                                }
                                elseif($drow1['transport']==3){
                                    $x = 70;
                                }
                                elseif($drow1['transport']==4){
                                    $x = 60;
                                }
                                ?>
                                <td class="text-right y">&#3647; <?php echo number_format($x, 2); ?></td>
                                <td class="text-right y"><?php echo 1 ?></td>
                                <td class="text-right y">&#3647; <?php echo number_format($x, 2); ?></td>
                            </tr>
                            <tr>
                                <td colspan="3" class="text-right y"><b>TOTAL</b></td>
                                <td class="text-right y">&#3647; <?php echo number_format($pi+$x, 2); ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <h5 class="y"><b>ชื่อผู้รับสินค้า :</b> <?php echo $drow1['name_booking']; ?></h5>
                    <h5 class="y"><b>ที่อยู่ผู้รับ :</b> <?php echo $drow1['add_booking']; ?></h5>
                    <h5 class="y"><b>เบอร์โทร :</b> <?php echo $drow1['tel_booking']; ?></h5>
                    <h5 class="y"><b>ประเภทการส่ง :</b>
                    <?php 
                    if($drow1['transport']==1){
                        echo 'ส่งแบบธรรมดา';
                    }
                    elseif($drow1['transport']==2){
                        echo 'ems ไปรษณีย์';
                    }
                    elseif($drow1['transport']==3){
                        echo 'kerry';
                    }
                    elseif($drow1['transport']==4){
                        echo 'Flash';
                    }
                    ?>
                    </h5>           

                        </tbody>
                    </table>

                    <?php if($drow1['stu'] == 5){?>
                    <h5>สถานะ : ถูกยกเลิก</h5>
                    <h5>หมายเหตุ : <?php echo $ditell; ?> </b>
                    <?php } ?>            
                </div>
			</div>
            <div class="modal-footer">
                <a type="button" href="product_user_buy.php" class="btn btn-primary" data-dismiss="modal">ปิด</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
