<style>
@import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100;200;500;600;900&family=Sarabun:wght@200&display=swap');
body {
  min-height: 100vh;
  overflow-x: hidden;
  font-family: 'Noto Sans Thai', sans-serif;
}
</style>


        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
        <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>

        <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
<?php include('../config/server.php');
if (empty($_SESSION["ID"]) || $_SESSION["Userlevel"] != 1 ){  
    echo "<script>
    alert('โปรดเข้าสู่ระบบ  ');
    window.location.replace('../login.php');
    </script>";
}else{?>

<body>

    <div class="col-md-12">
    
    <a href="index_admin.php?p=proadd2" class="pull-right btn btn-success"><span class="glyphicon glyphicon-plus"></span> สินค้าขายดี 5 อันดับ</a>
    <a href="index_admin.php?p=proadd3" class="pull-right btn btn-danger"><span class="glyphicon glyphicon-plus"></span> สินค้าที่เหลือน้อยกว่า 5 ชิ้น</a>

    <div class="header">
    <div class="card">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">    
	<h4 class="page-header"> จัดการรายการสินค้า</h4>
    <a href="index_admin.php?p=proadd" class="pull-right btn btn-primary"><span class="glyphicon glyphicon-plus"></span> เพิ่มสินค้า</a>
    </div>
    <div class="card-body">
	<div class="row">
		<div class="col-md-12">
			
		</div>
	</div><br>
    <div class="col-sm-12">

<table id="example" class="display table table-hover" width="100%">
    <thead>
        <tr>
            <th width="7%">#</th>
            <th width="15%">รูป</th>
            <th width="20%">ชื่อสินค้า</th>
            <th width="20%">ประเทภ</th>
            <th width="20%">คงเหลือ(ชื้น)</th>
            <th width="15%"><center>สถานะ</center></th>
            <th width="15%">ราคา(บาท)</th>
            <th width="15%">จัดการ</th>
        </tr>
    </thead>
    
    
            <?php
            require_once("../config/server.php");
            $sql = "
            SELECT * , category.* FROM product
            left join category on product.category_id = category.category_id
            order by product.product_id DESC
            ";
            $result2 = mysqli_query($conn, $sql);
            $i = 0;
                while($row2 = mysqli_fetch_array($result2)) { 
                
                ?>
    <tr>
        <td><?php echo $i+1;?></td>
        <td><img width='80px' src='upload/<?php echo $row2['photo'];?>'></td>
        <td><?php echo $row2['product_name'];?></td>
        <td><?php echo $row2['category_name'];?></td>
        <td><center><?php if($row2['num'] <= 5){?>
            <h8 class="text-danger"><?php echo $row2['num'];?></h8>
        <?php }else{?>
            <h8 class="" ><?php echo $row2['num'];?></h8>
        <?php }?>
        </center></td>
        <td align="center">
            <?php if($row2['product_status']=="เปิดการใช้งาน"){?>
                <h3><a href="product_onoff.php?product_id=<?php echo $row2['product_id'];?>" title="เปิด"><i class="fa-solid fa-toggle-on" style="color: #31e000;"></i></a></h3>
            <?php }else{ ?>
                <h3><a href="product_onoff.php?p_id=<?php echo $row2['product_id'];?>" title="ปิด"><i class="fa-solid fa-toggle-on fa-rotate-180" style="color: #d60000;"></i></a></h3>
            <?php } ?>
        </td>
        <td align="right"><?php echo number_format($row2['price'],2);?></td>
        <td align="center">
            <h3><a href="index_admin.php?p=uppro&product_id=<?php echo $row2['product_id'];?>" title="แก้ไข"><i class="fa-solid fa-pen-to-square" style="color: #00ad34;"></i></a>  <a href="index_admin.php?p=del_pro&product_id=<?php echo $row2['product_id'];?>" title="ลบ"><i class="fas fa-trash" style="color: #ff6600;"></i></a></h3>
        </td>            
    </tr>
    <?php
    $i++; }
    ?>
</table>
</div></div></div>
<br>
<?php mysqli_close($conn);?>

<br><br>
</div>
</div>
<?php } ?>

</html>
<script>
$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Blfrtip'
    } );
} );
</script>

