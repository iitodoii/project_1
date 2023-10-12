<style>
@import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100;200;500;600;900&family=Sarabun:wght@200&display=swap');
body {
  min-height: 100vh;
  overflow-x: hidden;
  font-family: 'Noto Sans Thai', sans-serif;
}
</style>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
        <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
        <script>
            $(document).ready(function() {
            $('#example').DataTable();
            } );
        </script>

<?php include('../config/server.php');
if (empty($_SESSION["ID"]) || $_SESSION["Userlevel"] != 1 ){  
    echo "<script>
    alert('โปรดเข้าสู่ระบบ  ');
    window.location.replace('../login.php');
    </script>";
}else{?>

<body>

    <div class="col-md-12">
    <div class="header">
	<h1 class="page-header text-center"> รูปแบบการตกแต่ง</h1>
	<div class="row">
		<div class="col-md-12">
			<a href="index_admin.php?p=deadd" class="pull-right btn btn-primary"><span class="glyphicon glyphicon-plus"></span> เพิ่ม</a>
		</div>
	</div><br>
	<table id="example" class="display table table-striped  table-hover table-responsive table-bordered ">
			<thead>
				<th><font size="2">รูปแบบ</font></th>
				<th><font size="2">ภาพ</font></th>
				<th> <font size="2">จัดการ</font></th>
			</thead>
			<tbody>
			
			<td> <?php


				$sql="select * from design";
				$query=$conn->query($sql);
				
  
				while($row=$query->fetch_array()){
				    $id = $row['id_design'];
                    $photo = $row['img_design'];
                    $design_id = $row["id_design"];

                    if($row["tye"] == 1){
                        $x='กระดุม';
                    }elseif($row["tye"] == 2){
                        $x='ลูกปัด';
                    }elseif($row["tye"] == 3){
                        $x='เพชรพลอย';
                    }elseif($row["tye"] == 4){
                        $x='กากเพชร';
                    }elseif($row["tye"] == 5){
                        $x='สกรีน';
                    }elseif($row["tye"] == 6){
                        $x='เพ้นท์';
                    }elseif($row["tye"] == 7){
                        $x='ปัก';
                    }else{
                        $x='ขนมิ้งค์';
                    }

                    echo "<tr align='center'>"; 
                    //$start++; echo "<td> $start </td>";
                    echo "<td> $x </td>";
                    echo "<td> <img width='80px' src='upload/$photo'>  </td>";
                    
				  echo "<td>
			
				  <a href='index_admin.php?p=del_de&product_id=$id'  class='btn btn-success btn-sm'><span class='glyphicon glyphicon-pencil'></span> ลบ</a>  
			  </td>";
			  } ?>
              </tbody>
              </table>


	</div>
<?php } ?>
</body>
</html>



<!-- <a href="product_onoff.php?=<?php echo $row["product_id"];?>"  class="btn btn-success btn-sm"><span class="glyphicon glyphicon-cog"></span> เปลี่ยนสถานะการใช้งาน</a> 
				
				  <td><img src="image_product/<?php echo $fetch['image']; ?>" alt="..." width='100'></td>
