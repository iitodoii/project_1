<style>
@import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100;200;500;600;900&family=Sarabun:wght@200&display=swap');
body {
  min-height: 100vh;
  overflow-x: hidden;
  font-family: 'Noto Sans Thai', sans-serif;
}
</style>

<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- bootstrap -->
        
        <!-- datatable -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
        <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>

    </head>
    <?php 
if (empty($_SESSION["ID"]) || $_SESSION["Userlevel"] != 1 ){  
  echo "<script>
  alert('โปรดเข้าสู่ระบบ  ');
  window.location.replace('../login.php');
  </script>";
}else{?>

    <div class="card">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        รายงานสรุปรายได้
    </div> 
        <form method="GET" id="form" action="">
			<div style="float:left;" id="hid">
      <div class="row p-3">
      <div class="input-group">
				<label class="form-label" for="exampleInputEmail1">วันที่เริ่มต้น :</label>
                <input type="date" class="form-control"  name="d_s" id="date" value="" >
                <label class="form-label" for="exampleInputEmail1">วันที่สิ้นสุด :</label>
                <input type="date" class="form-control" name="d_e" id="date01" value="" >
                <button class="btn btn-primary" id="submit" name="bt_search" >ค้นหา</button>
       </div>
       </div>	
			</div>	
        </form>
            <div class="col-sm-12">

                <table id="ex" class="display table table-hover" align="center" width="100%">
                    <thead>
                        <tr class="table-primary">
                            <th width="10%">ลำดับ</th>
                            <th width="20%">ป/ด/ว</th>
                            <th width="50%">ลูกค้า</th>
                            <th width="50%"><center>รายได้(บาท)</center></th>
                        </tr>
                    </thead>
                    
                    
            <?php
            require_once("../config/server.php");
            $where = "WHERE stu >= 3 and stu < 5";
            if($d_s = isset($_GET['d_s']) ? $_GET['d_s']:'' AND $d_e = isset($_GET['d_e']) ? $_GET['d_e']:'' )
            {
                $where = " WHERE date_purchase BETWEEN '$d_s 00:00:00.000000' AND '$d_e 23:59:59.000000' and stu >= 3 and stu < 5";
            }

			@$total_total =0 ;		
		    $sql = "
            SELECT SUM(purchase_detail.price) AS totol , purchase.* , purchase_detail.* , user.* FROM purchase
            left join purchase_detail on purchase.q_id = purchase_detail.q_id
            left join user on user.ID = purchase.ID
            $where 
            group by purchase_detail.q_id order by purchase_detail.q_id DESC
            ";
            $result2 = mysqli_query($conn, $sql);
            $i = 0;
					while($row2 = mysqli_fetch_array($result2)) { 
					
					?>
                    <tr>
                        <td><?php echo $i+1;?></td>
                        <td><?php echo $row2['date_purchase'];?></td>
                        <td><?php if($row2['ID'] > 0){
						echo $row2['Firstname']; ?> <?php echo $row2['Lastname'];
						}else{ 
						echo $row2['long_id'];
						} ?></td>
                        <td align="right"><?php echo number_format($row2['totol'],2);?></td>
                    </tr>
                    <?php
                    @$total_total += $row2['totol'];
                    $i++; }
                    ?>
                </table>
            </div>
            <div align="center"><b>รวมรายได้ : <?php echo number_format($total_total,2);?> บาท</b></div>
            <br>
            <?php mysqli_close($conn);?>
    </div>
<?php } ?>
<script>
		
$(document).ready(function() {
    $('#ex').DataTable();
} );
 
</script>
<script>
const dateInput = document.getElementById('date');

dateInput.value = formatDate();

console.log(formatDate());

function padTo2Digits(num) {
  return num.toString().padStart(2, '0');
}

function formatDate(date = new Date()) {
  return [
    date.getFullYear(),
    padTo2Digits(date.getMonth() + 1),
    padTo2Digits(date.getDate()),
  ].join('-');
}
</script>

<script>
const dateInput01 = document.getElementById('date01');

dateInput01.value = formatDate();

console.log(formatDate());

function padTo2Digits(num) {
  return num.toString().padStart(2, '0');
}

function formatDate(date = new Date()) {
  return [
    date.getFullYear(),
    padTo2Digits(date.getMonth() + 1),
    padTo2Digits(date.getDate()),
  ].join('-');
}
</script>