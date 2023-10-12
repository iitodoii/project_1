<?php session_start();?>
<?php 
if (!$_SESSION["UserID"]){  
	  	Header("Location: index.php");  
}else?>
<!doctype html>
<html lang="en">
<head>
	<?php
      include ('Include/header_menu_user.php');
	  ?>
</head>
<body>
    	<?php
      include ('Include/menu_user.php');
	  ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
        <div class="card" style="width: auto;">
	<h1 class="page-header text-center">ประวัติการสั่งอาหาร</h1>
	<table class="table table-striped table-bordered">
		<thead>
		    <th>ลำดับ</th>  
			<th>วันเวลา</th>
			<th>ลูกค้า</th>
			<th>ราคา</th>
			<th>สถานะ</th>
			<th>รายละเอียดการขาย</th>
		</thead>
		<tbody>
			<?php
			    $i = 0;
                $date = date("Y-m-d"); 
				$sql="select * , user.*, product.* , purchase.* , user.* , sum(purchase_detail.price) , DATE_FORMAT(date_purchase,'%Y-%m-%d') As NewColumn from purchase
				left join purchase_detail on purchase.q_id = purchase_detail.q_id
				left join user on user.ID = purchase.ID
				left join product on product.product_id = purchase_detail.product_id
				where user.ID = ".$_SESSION['UserID']." AND stu >= 3 and stu <= 5
				group by purchase_detail.q_id order by purchase_detail.q_id desc
                ";
				$query=$conn->query($sql);
				while($row=$query->fetch_array()){
					?>
					<tr>
						<td><?php echo $i+1?></td>
						<td><?php echo date('Y,M d, h:i A', strtotime($row['date_purchase'])) ?></td>
						<td><?php echo $row['Firstname']; ?> <?php echo $row['Lastname']; ?></td>
						<td class="text-right">&#3647; <?php echo number_format($row['sum(purchase_detail.price)'], 2); ?></td>
						<td>
						<?php if($row['stu']==0){
							echo 'รอยืนยัน';
						}elseif($row['stu']==1){
							echo 'รับออเดอร์';
						}elseif($row['stu']==2){
							echo 'สำเร็จ';
						}elseif($row['stu']==3){
							echo 'สำเร็จ';
						}else{
							echo 'ปฏิเสธออร์เดอร์';
						}
						?>
						</td>
				</td>
				<td><a href="report_sell_user01.php?id=<?php echo $row["q_id"];?>"  class="btn btn-success btn-sm"><span class="glyphicon glyphicon-search"></span> รายละเอียด</a> 
		
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
</body>
</html>


<!--<td><a href="details=<?php echo $row["purshase_id"];?>"  class="btn btn-success btn-sm"><span class="glyphicon glyphicon-search"></span> รายละเอียด</a> 


