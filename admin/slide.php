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

<?php include('../config/server.php');?>
<body>
<div class="container-fluid">
    <div class="col-md-12">
    <div class="header">
	<h1 class="page-header text-center">จัดการสไลด์ภาพ</h1>
	<div class="row">
		<div class="col-md-12">
			<a href="index_admin.php?p=in_slide" class="pull-right btn btn-primary"><span class="glyphicon glyphicon-plus"></span>+เพิ่มภาพ</a>
		</div>
        <form method="GET" id="form" action="">
			<div style="float:left;" id="hid">

			</div>	
        </form>
            <div class="col-sm-12">

                <table id="ex" class="display table table-hover" align="center" width="100%">
                    <thead>
                        <tr class="table-primary">
                            <th width="10%">ลำดับ</th>
                            <th width="20%">รูปภาพ</th>
                            <th width="50%">ชื้อภาพ</th>
                            <th width="50%"><center>จัดการ</center></th>
                        </tr>
                    </thead>
							<?php 
							$i=1;
                                            require_once("../config/server.php");
                                            $sql = "SELECT * FROM slider order by id_slide DESC";
                                            $query = mysqli_query($conn,$sql);
                            ?>
                
				<?php
                                        while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
                {?>
				<tr>
					<td><?php echo $i;?></td>
					<td><img src="upload/<?php echo $result['img_slide'];?>" class="d-block w-100" alt="..."></td>
					<td><?php echo $result["name"];?></td>
					<td>
					<a class="btn btn-danger btn-sm" href="index_admin.php?p=del_slide&del=<?php echo $result["id_slide"];?>" onclick="return confirm('คุณต้องการลบ <?php echo $result['name'];?> หรือไม่ ?')">
                    ลบ</a>
					</td>
				</tr>	
				<?php
                $i++; }
                ?>
				</table>
            </div>
    </div>
</div>
</div>
</div>
<script>
            $(document).ready(function() {
            $('#ex').DataTable();
            } );
        </script>
<script>


