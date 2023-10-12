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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
<head>
   
  
</head>

<body>

        <div class="content">
            <div class="container-fluid">
                            <div class="header">
                            <div class="card">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between"> 
                                <h3 class="title">จัดการบัญชี</h3>
                                <a href="index_admin.php?p=new" class="pull-right btn btn-primary"><span class="glyphicon glyphicon-plus"></span> เพิ่มสมาชิก</a>
                            </div>
                            
                            <div class="content">
                                <div class="content table-responsive table-full-width">
                                <table id="example"  class="table table-striped">
                                  
                                    <?php 
                                            require_once("../config/server.php");
                                            $sql = "SELECT * FROM user Where Username != '".$_SESSION['Username']."' order by Userlevel DESC";
                                            $query = mysqli_query($conn,$sql);
                                        ?>
                                    <form name="frmMain" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
                                        <input type="hidden" name="hdnCmd" value="">
                                    <thead>
                                    <th width="15%"><b>ชื่อผู้ใช้</b></th>
                                        <th width="15%"><b>รหัสผ่าน</b></th>
                                    	<th width="15%"><b>ชื่อ</b></th>
                                    	<th width="15%"><b>นามสกุล</b></th>
                                    	<th width="15%"><b>เบอร์โทร</b></th>
                                        <th width="15%"><b>สถานะ</b></th>
                                        <th width="15%"><b>แก้ไข</b></th>
                                    </thead>
                                    <tbody>
                                         
                                        <?php
                                        while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
                                        {?>
                                        <tr>
                                            <td><?php echo $result["Username"];?></td>
                                        	<td>********</td>
                                        	<td><?php echo $result["Firstname"];?></td>
                                        	<td><?php echo $result["Lastname"];?></td>
                                            <td><?php echo $result["Tel"];?></td>
                                            <td><?php if($result["Userlevel"]==1){
                                                echo 'Admin';
                                            }else{
                                                echo 'ลูกค้า';
                                            };?></td>
                                            <td>
                                            <?php if($result['Userlevel'] == 2 || $result['ID'] == $_SESSION['ID']){?>  
                                            <a class="btn btn-primary" href="index_admin.php?p=edituser&UserID=<?php echo $result["ID"];?>">
                                             แก้ไข</a>&nbsp;&nbsp;
                                            <?php } ?>    
                                            </td> 
                                        </tr>                                                                        
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </form></table>  
                                </div>
                            </div>
                        </div>
           
            </div>

<script>
	$(document).ready(function(){
		$('.DeleteAdmin').click(function(e){
			e.preventDefault();
			var pid = $(this).attr('data-id');
			var parent = $(this).parent("td").parent("tr");
			
			bootbox.dialog({
			  message: "<p style='font-size:18px;'; ></br>ยืนยันการลบข้อมูลผู้ดูแลระบบ ?</br></br>",
			  title: "<i class='glyphicon glyphicon-trash'></i> Delete !",
			  buttons: {
				
				danger: {
				  label: "Delete!",
				  className: "btn-danger",
				  callback: function() {
					  
					  $.ajax({
						  type: 'POST',
						  url: 'delete.php',
						  data: 'delete='+pid
					  })
					  .done(function(response){
						  bootbox.alert(response);
						  parent.fadeOut('slow');
					  })
					  .fail(function(){
						  bootbox.alert('Something Went Wrog ....');
					  })
				  }
				},success: {
				  label: "Cancel",
				  className: "btn-success",
				  callback: function() {
					 $('.bootbox').modal('hide');
				  }
			  }
				}
			});
		});
	});
</script>


</html>

    <?php
mysqli_close($conn);
?>
<script>
$(document).ready(function() {
    $('#example').DataTable( {
    } );
} );
</script>