<?php
require_once("../config/server.php");

$sql = "SELECT * FROM `purchase` order by stu desc";
$result1 = mysqli_query($conn, $sql);
?>
<style type="text/css">
    .modal-color {
        color: '#716add' !important;
        background-color: '#292b2c' !important;
    }

    .swal-title {
        color: '#716add' !important;
        background-color: '#292b2c' !important;
    }

    .dataTables_filter {
        width: 50%;
        float: right;
        text-align: right;
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
if (empty($_SESSION["ID"]) || $_SESSION["Userlevel"] != 1) {
    echo "<script>
    alert('โปรดเข้าสู่ระบบ  ');
    window.location.replace('../login.php');
    </script>";
} else { ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <h4 class="mr-4 mt-4">รายงาน </h4>
                </div>
                <div class="row">
                    <div class="col-12" style="overflow-x:auto">
                        <h4 class="mr-4 mt-4">รายงานข้อมูลสถานะการจัดส่ง วัน/เดือน/ปี</h4>
                        <table id="report3" class="table table-bordered table-hover" style="overflow-x:auto">
                            <thead class="bg-dark text-white">
                                <th>รหัสคำสั่งซื้อ</th>
                                <th>ชื่อผู้สั่งซื้อ</th>
                                <th>วันที่</th>
                                <th class="d-none">รหัสการจัดส่ง</th>
                                <th>สถานะการจัดส่ง</th>
                            </thead>
                            <tbody>

                                <?php
                                $total = 0;
                                while ($row = mysqli_fetch_array($result1)) {
                                    echo "<tr>";
                                    echo "<td> {$row['purchaseid']} </td>"; //รหัสออเดอร์
                                    echo "<td> {$row['name_booking']} </td>"; //ชื่อออเดอร์ ชื่อผู้รับสินค้า
                                    echo "<td> {$row['date_purchase']} </td>"; //ยอดรวมราคาของออเดอร์
                                    echo "<td class='d-none'> {$row['stu']} </td>"; //ยอดรวมราคาของออเดอร์
                                    if ($row['stu'] < 2) {
                                        echo "<td>เตรียมพัสดุ</td>"; //ยอดรวมราคาของออเดอร์
                                    }else if ($row['stu'] <= 3) {
                                        echo "<td>กำลังจัดส่ง</td>"; //ยอดรวมราคาของออเดอร์
                                    } else if ($row['stu'] > 3){
                                        echo "<td>จัดส่งเรียบร้อยแล้ว</td>"; //ยอดรวมราคาของออเดอร์
                                    }

                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php } ?>
<script type="text/javascript">
    $(document).ready(function() {
        var table2 = $('#report3').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            // "autoWidth": true,
            // "overflow": true,
            "order": [
                [3, 'desc'] // 'none' indicates no initial sorting for the first column
            ],
            "initComplete": function() {}
        });
    });
</script>