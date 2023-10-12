<head>
<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
<script src="assets/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
<link href="assets/css/paper-dashboard.css?v=<?php echo filemtime('assets/css/paper-dashboard.css'); ?>" rel="stylesheet"/>


<!--  Paper Dashboard core CSS    -->
<link href="assets/css/paper-dashboard.css?v=<?php echo filemtime('assets/css/paper-dashboard.css'); ?>" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">


<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
        <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>

        <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
<style>
@import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100;200;500;600;900&family=Sarabun:wght@200&display=swap');
body {
  min-height: 100vh;
  overflow-x: hidden;
  font-family: 'Noto Sans Thai', sans-serif;
} 
</style>    

</head>

<!doctype html>
<html lang="en">
<head>

</head>
<body>

<div class="container">
<div class="row">
<div class="col-md-12">
<div class="card">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between"> 
	<h4 class="page-header">รายการสั่งสินค้า</h4>
	</div> 
	<table id="example" class="table table-striped table-bordered">
		<thead>
		    <th><div class="y"><b>ลำดับ</b></div></th>
			<th><div class="y"><b>วันเวลา</b></div></th>
			<th><div class="y"><b>ลูกค้า</b></div></th>
			<th><div class="y"><b>ราคา</b></div></th>
			<th><div class="y"><b>ค่าส่ง</div></th>
			<th><div class="y"><b>สถานะ</b></div></th>
			<th><div class="y"><b>รายละเอียดการขาย</b></div></th> 
		</thead>
		<tbody>
			<?php
			    include('../config/server.php');
			    $i = 0;
                $date = date("Y-m-d"); 
				$sql="select purchase.* , user.* , product.* , purchase.* , sum(purchase_detail.price) , DATE_FORMAT(date_purchase,'%Y-%m-%d') from purchase
				left join purchase_detail on purchase.q_id = purchase_detail.q_id
				left join user on user.ID = purchase.ID
				left join product on product.product_id = purchase_detail.product_id
				where stu < 4
				group by purchase_detail.q_id order by purchase_detail.q_id desc
                ";
				$query=$conn->query($sql);
				while($row=$query->fetch_array()){
					?>
					<tr>
						<td><div class="y"><?php echo $i+1?></div></td>
						<td><div class="y"><?php echo date('M d, Y h:i A', strtotime($row['date_purchase'])) ?></div></td>
						<td><div class="y"><?php echo $row['Firstname']; ?> <?php echo $row['Lastname']; ?></div></td>
						<td class="text-right"><div class="y"><?php echo number_format($row['sum(purchase_detail.price)'], 2); ?>&#3647; </div></td>

						<?php 
						        $x = 0;
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
							echo "<a href='up.php?enter=$row[q_id]'  class='btn btn-primary btn-sm'>ยืนยัน</a>";
							echo '||';
							echo "<a href='up.php?remove=$row[q_id]'  class='btn btn-danger btn-sm'>ยกเลิก</a>";
						}elseif($row['stu']==1){
							echo "<a href='up.php?en=$row[q_id]'  class='btn btn-secondary btn-sm'>ตรวจสอบการชำระเงิน</a>";
							echo '||';
							echo "<a href='billbuyadmin.php?b=$row[q_id]'  class='btn btn-info btn-sm' target='_blank'>แนบ</a>";
						}elseif($row['stu']==2){
							echo "<a href='up.php?e=$row[q_id]'  class='btn btn-info btn-sm'>จัดส่ง</a>";
						}elseif($row['stu']==3){
							echo "<a href='up.php?x=$row[q_id]'  class='btn btn-dark btn-sm'>ชำระเงินแล้ว</a>";
						}elseif($row['stu']==4){
							echo '<a href=""  class="btn btn-dark btn-sm">เสร็จสิ้น</a>';
						}
						else{
							echo '<a href=""  class="btn btn-primary btn-sm">ยกเลิก</a>';
						}
						?></div>
						</td>
				</td>
				<td class="text-center">
				<a href="index_admin.php?p=re01&id=<?php echo $row["q_id"];?>"  class="btn btn-success btn-sm"><span class="glyphicon glyphicon-search"></span> รายละเอียด</a>
				 
				<?php if($row['stu']==3){
						echo "<a href='index_admin.php?p=print&id=$row[q_id]'  class='btn btn-success btn-sm'><span class='glyphicon glyphicon-printer'></span> ใบเสร็จ</a>";
				}else{
					echo '';
				}
				?>
					</tr>
					<?php $i++ ;
				}
			?>
		</tbody>
	</table>
</div>
</div>
</div>
</div>
</body>
</html>
<script>
$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Blfrtip'
    } );
} );
</script>

<!--<td><a href="details=<?php echo $row["purshase_id"];?>"  class="btn btn-success btn-sm"><span class="glyphicon glyphicon-search"></span> รายละเอียด</a> 


