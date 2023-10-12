<?php 
session_start();
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
        <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>

        <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>

        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>รายการสั่งซื้อสินค้า</title>
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
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="card" style="width: auto;"><br>
	<h1 class="page-header text-center x">รายการสั่งซื้อสินค้า</h1>
	<table id="example" class="table table-striped table-bordered">
		<thead>
		    <th><div class="y"><b><b>ลำดับ</div></th>
			<th><div class="y"><b><b>วันเวลา</div></th>
			<th><div class="y"><b><b>ลูกค้า</div></th>
			<th><div class="y"><b><b>ราคา</div></th>
			<th><div class="y"><b><b>ค่าส่ง</div></th>
			<th><div class="y"><b><b>สถานะ</div></th>
			<th><div class="y"><b><b>รายละเอียดการขาย</div></th>
		</thead>
		<tbody>
			<?php
			include('../config/server.php');
			    $i = 0;
                $date = date("Y-m-d"); 
				$sql="select * , user.*, product.* , purchase.* , user.* , sum(purchase_detail.price) , DATE_FORMAT(date_purchase,'%Y-%m-%d') from purchase
				left join purchase_detail on purchase.q_id = purchase_detail.q_id
				left join user on user.ID = purchase.ID
				left join product on product.product_id = purchase_detail.product_id
				where user.ID = ".$_SESSION['ID']."
				group by purchase_detail.q_id order by purchase_detail.q_id desc
                ";
				$query=$conn->query($sql);
				while($row=$query->fetch_array()){
					?>
					<tr>
						<td><div class="y"><?php echo $i+1?></div></td>
						<td><div class="y"><?php echo date('M d, Y h:i A', strtotime($row['date_purchase'])) ?></div></td>
						<td><div class="y"><?php echo $row['Firstname']; ?> <?php echo $row['Lastname']; ?></div></td>
						<td class="text-right"><div class="y"> <?php echo number_format($row['sum(purchase_detail.price)'], 2); ?>&#3647;</div></td>
						<?php 
                                if($row['transport']==1){
                                    $x = 50;
                                }
                                elseif($row['transport']==2){
                                    $x = 70;
                                }
                                elseif($row['transport']==3){
                                    $x = 70;
                                }
                                elseif($row['transport']==4){
                                    $x = 60;
                                }
                        ?>
						<td class="text-right"><div class="y"> <?php echo number_format($x, 2); ?>&#3647;</div></td>
						<td class="text-center"><div class="y">
						<?php if($row['stu']==0){
							echo '<a href=""  class="btn btn-primary btn-sm">รอยืนยัน</a>';
							echo '||';
							echo "<a href='upuser.php?remove=$row[q_id]'  class='btn btn-danger btn-sm'>ยกเลิก</a>";
						}elseif($row['stu']==1 AND $row['transport']<=2 AND $row['img'] == ""){
							echo "<a href='buy.php?b=$row[q_id]'  class='btn btn-secondary btn-sm'>แจ้งชำระเงิน</a>";
						}elseif($row['stu']==1 AND $row['transport']<=2 AND $row['img'] !=="" ){
							echo "<a href='billbuy.php?b=$row[q_id]'  class='btn btn-info btn-sm'>รอตรวจสอบการชำระเงิน</a>";
						}
						elseif($row['stu']==2){
							echo '<a href=""  class="btn btn-dark btn-sm">รอจัดส่ง</a>';
						}
						elseif($row['stu']==3){
							echo '<a href=""  class="btn btn-dark btn-sm">ชำระเงินแล้ว</a>';
						}elseif($row['stu']==4){
							echo '<a href=""  class="btn btn-dark btn-sm">เสร็จสิ้น</a>';
						}
						elseif($row['stu']==5){
							echo '<a class="btn btn-primary btn-sm">ยกเลิก</a>';
						}
						?></div>
						</td>
				</td>
				<td class="text-center"><a href="report_sell_user.php?id=<?php echo $row["q_id"];?>"  class="btn btn-success btn-sm"><span class="glyphicon glyphicon-search"></span> รายละเอียด</a>
				<?php if($row['stu']>3 AND $row['stu']<=4){ 
				echo "<a href='billuser.php?id=$row[q_id]'  class='btn btn-success btn-sm'><span class='glyphicon glyphicon-printer'></span> ใบเสร็จ</a>";
				}else{
					echo '';
				}
				?> 
					</tr>
					<?php
				$i++; }
			?>
		</tbody>
	</table>
</div>
</div>
</div>
</div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
<script>
$(document).ready(function() {
    $('#example').DataTable( {

    } );
} );
</script>



