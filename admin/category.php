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
<?php
if (empty($_SESSION["ID"]) || $_SESSION["Userlevel"] != 1 ){  
    echo "<script>
    alert('โปรดเข้าสู่ระบบ  ');
    window.location.replace('../login.php');
    </script>";
}else{ // บรรนทัด58ส่งค้าDI ปิดกสนใช่งานไปที่category_onoff// บรรนทัด58ส่งค้าDI ปิดกสนใช่งานไปที่category_onoff
?>
<body>
    <div class="row p-3">
    <div class="col-md-12">
    <div class="card">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">    
	<h3 class="page-header">จัดการประเภทสินค้า</h3>
  <a href="index_admin.php?p=cateadd" class="btn btn-primary">เพิ่มประเภทสินค้า</a>
  </div>

		<table id="example" class="table table-striped">
			<thead>
                <th>#</th>
				<th>ประเภท</th>
				<th>สถานะ</th>
				<th>จัดการ</th>
			</thead>
			<tbody>
				<?php
                include('../config/server.php');
                $i=1;
                $query = "SELECT * FROM category";

                $result3 = mysqli_query($conn, $query);

             
              while($row = $result3->fetch_assoc()):
                echo "<tr align='left'>";
                echo "<td> $i </td>";
				echo "<td> $row[category_name] </td>";

				//สถานะการใช้งาน
                   if($row['category_status'] == 'ปิดการใช้งาน'){
                        echo "<td><font color='#CC0000'>ปิดการใช้งาน</font></td>";
                   } else if($row['category_status'] == 'เปิดการใช้งาน'){
                       echo "<td><font color='#3333CC'>เปิดการใช้งาน</font></td>";
                   } else {
                       echo "<td><font color='#3333CC'>กำลังใช้งาน</font></td>";
                   }
                   //ปุ่มเปิดปิดสถานะ
                  if($row['category_status'] == 'ปิดการใช้งาน'){  // บรรนทัด58ส่งค้าDI ปิดกสนใช่งานไปที่category_onoff
                  echo "<td align='center'><a href='category_onoff.php?id1=$row[category_id]'>
                        <button class='btn btn-outline-success btn-sm '>เปิดการใช้งาน</button></a>
                        <a href='index_admin.php?p=cate_up&category_id=$row[category_id]'></a>
                        </td> ";
              
                  } else if($row['category_status'] == 'เปิดการใช้งาน'){
                    $id = $row['category_id'];
                      echo "<td align='center'><a href='category_onoff.php?id2=$row[category_id]'>
                        <button class='btn btn-danger btn-sm ng-binding '>ปิดการใช้งาน</button></a>
                        <a href='index_admin.php?p=cate_up&category_id=$row[category_id]'  class='btn btn-success btn-sm'><span class='glyphicon glyphicon-pencil'></span> แก้ไข</a>
                        </td> ";
                  } else {
                      echo "<td align='center'>
                        <button class='btn btn-outline-warning btn-sm '>ปิดการใช้งาน</button>
                        
                        </td> ";
                  }

                  $i++;
              endwhile ?>
 </td> 
                    </tr>
							</td>
  </label>
							</td>
						</tr>
			</tbody>
		</table>
	</div>
</div>
</div>
</body>
<?php } ?>
<script>
$(document).ready(function() {
    $('#example').DataTable( {
    } );
} );
</script>