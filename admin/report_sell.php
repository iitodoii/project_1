
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

<body>
<?php
      require_once("../config/server.php");
	  ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                             <div class="header"><br>
							 <div class="card">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between"> 
	<h3 class="page-header text-center x">ประวัติการสั่งซื้อ</h3>
</div>
	<table id="example" class="table table-striped table-bordered">
		<thead>
		    <th><div class="y"><b>ลำดับ</h4></th>
			<th><div class="y"><b>วันเวลา</h4></th>
			<th><div class="y"><b>ลูกค้า</h4></th>
			<th><div class="y"><b>ราคา</h4></th>
			<th><div class="y"><b>สถานะ</h4></th>
			<th><div class="y"><b>รายละเอียดการขาย</h4></th>
		</thead>
		<tbody>
			<?php
			    $i = 0; 
				$sql="select * , user.*, product.* , purchase.* , sum(purchase_detail.price) from purchase_detail 
				left join purchase on purchase.q_id = purchase_detail.q_id
				left join user on user.ID = purchase.ID
				left join product on product.product_id = purchase_detail.product_id
				where stu >= 4
				group by purchase_detail.q_id order by purchase_detail.q_id desc";
				$query=$conn->query($sql);
				while($row=$query->fetch_array()){
					?>
					<tr>
						<td><?php echo $i+1?></td>
						<td><?php echo date('M d, Y h:i A', strtotime($row['date_purchase'])) ?></td>
						<td><?php echo $row['Firstname']; ?> <?php echo $row['Lastname']; ?></td>
						<td class="text-right">&#3647; <?php echo number_format($row['sum(purchase_detail.price)'], 2); ?></td>
						<td>
						<?php if($row['stu']==0){
							echo 'รอยืนยัน';
						}elseif($row['stu']==1){
							echo 'รับออเดอร์';
						}elseif($row['stu']==2){
							echo 'สำเร็จ';
						}elseif($row['stu']==5){
							echo 'ยกเลิก';
						}else{
							echo 'ชำระแล้ว';
					    }
						?>
						</td>
				</td>
				<td><a href="index_admin.php?p=re01&id=<?php echo $row["q_id"];?>"  class="btn btn-success btn-sm"><span class="glyphicon glyphicon-search"></span> รายละเอียด</a> 
				<?php if($row['stu']==4){
						echo "<a href='index_admin.php?p=print&id=$row[q_id]'  class='btn btn-primary btn-sm'><span class='glyphicon glyphicon-printer'></span> ใบเสร็จ</a>";
				}else{
					echo '';
				}
				?>	
					</tr>
					<?php
				$i++;}
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


