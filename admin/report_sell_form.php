<head>
    <link href="print.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100;200;500;600;900&family=Sarabun:wght@200&display=swap');

        body {
            min-height: 100vh;
            overflow-x: hidden;
            font-family: 'Noto Sans Thai', sans-serif;
        }

        .y {
            font-size: 12px;
        }
    </style>

</head>

<body>
    <?php
    require_once("../config/server.php");
    ?>

    <!-- Sales Details -->
    <?php
    $id = $_GET['id'];
    $sql1 = "select * from purchase 
                                left join user on user.ID = purchase.ID
                                where q_id='" . $id . "'";
    $dquery1 = $conn->query($sql1);
    $drow1 = $dquery1->fetch_array()
    ?>
    <div class="content" id="details<?php echo $drow1['purchaseid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="modal-body"><br />
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-6">
                                        <h6 class="modal-title y" id="myModalLabel"><b>BP.SHOP</b></h6>
                                        <h6 class="modal-title y" id="myModalLabel"></h6>
                                        <h6 class="modal-title y" id="myModalLabel"></h6>
                                        <br />
                                        <h6 class="y">ลูกค้า: <b><?php echo $drow1['Firstname']; ?> <?php echo $drow1['Lastname']; ?></b></h6>
                                        <h6 class="y">เบอร์โทร: <b><?php echo $drow1['Tel']; ?></b></h6>
                                        <h6 class="y">อีเมลล์: <b><?php echo $drow1['Username']; ?></b></h6>
                                        <span class="pull-right y">
                                            วันที่สั่ง : <?php echo date('M d, Y', strtotime($drow1['date_purchase'])) ?>
                                        </span>
                                    </div>
                                    <div class="col-6">
                                        <center>
                                            <h3 class="modal-title x" id="myModalLabel" style="color:blue">ใบเสร็จรับเงิน/ใบกำกับภาษี</h3>
                                            <h6 class="modal-title x" id="myModalLabel">Receipt/Tax Invoice</h6>
                                        </center>
                                        <br>

                                        <div class="row">
                                            <div class="col-3">

                                            </div>
                                            <div class="col-8">
                                                <h6 class="y"><b>เลขที่ใบเสร็จ :</b> <?php echo $drow1['purchaseid']; ?></h6>
                                                <h6 class="y"><b>รหัสสั่งซื้อ :</b> <?php echo $drow1['q_id']; ?></h6>
                                                <h6 class="pull-right y">
                                                    <b>วันที่ออก :</b> <?php echo date('M d, Y') ?>
                                                </h6>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <br />
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <th>
                                            <h6 class="y">ลำดับ</h6>
                                        </th>
                                        <th>
                                            <h6 class="y">ชื่อสินค้า</h6>
                                        </th>
                                        <th>
                                            <h6 class="y">ราคา</h6>
                                        </th>
                                        <th>
                                            <h6 class="y">จำนวน</h6>
                                        </th>
                                        <th>
                                            <h6 class="y">ราคาทั้งหมด</h6>
                                        </th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $id = $_GET['id'];
                                        $sum = 0;
                                        $fullsum = 0;
                                        $sql = "select purchase_detail.* , purchase.* , product.* from purchase_detail
                    left join purchase on purchase.q_id = purchase_detail.q_id
                    left join product on product.product_id = purchase_detail.product_id
                    where purchase_detail.q_id='" . $drow1['q_id'] . "'";
                                        $dquery = $conn->query($sql);

                                        while ($drow = $dquery->fetch_array()) {

                                            $stu = $drow['stu'];
                                            $q_id = $drow["q_id"];
                                            $sum = $drow['price'];
                                            $fullsum += $sum;
                                            $i = 0;
                                        ?>
                                            <tr>
                                                <td align="center" width="5" class="y"><?php echo $i + 1 ?></td>
                                                <td width="500" class="y"><?php echo $drow['product_name']; ?></td>
                                                <td width="200" align="right" class="y">&#3647; <?php echo number_format($drow['price'], 2); ?></td>
                                                <td align="center" width="30" class="y"><?php echo $drow['quantity']; ?></td>
                                                <td align="right" class="y">&#3647;
                                                    <?php
                                                    $subt = $drow['price'] * $drow['quantity'];
                                                    echo number_format($subt, 2);
                                                    ?>
                                                </td>
                                            </tr>
                                            <?php
                                            $i++;
                                            ?>
                                            <tr>
                                                <td align="center" width="5" class="y"><?php echo $i + $i ?></td>
                                                <td width="500" class="y">ค่าส่ง</td>
                                                <?php
                                                if ($drow1['transport'] == 1) {
                                                    $x = 50;
                                                } elseif ($drow1['transport'] == 2) {
                                                    $x = 70;
                                                } elseif ($drow1['transport'] == 3) {
                                                    $x = 70;
                                                } elseif ($drow1['transport'] == 4) {
                                                    $x = 60;
                                                }
                                                ?>
                                                <td class="text-right y" align="right">&#3647; <?php echo number_format($x, 2); ?></td>
                                                <td class="text-right y" align="center"><?php echo 1 ?></td>
                                                <td class="text-right y" align="right">&#3647; <?php echo number_format($x, 2); ?></td>
                                            </tr>

                                        <?php
                                            $i++;
                                        }
                                        ?>
                                        <tr class="text-left">
                                            <td colspan="2" class="y" valign="middle" align="center" width="200">

                                            </td>
                                            <td colspan="2" class="y" align="right">
                                                ส่วนลด
                                                <br>
                                                จำนวนเงินทั้งสิน
                                            </td>
                                            <td class="y" align="right" width="200">
                                                &#3647; <?php echo number_format(0.00, 2) ?><br>
                                                &#3647; <?php echo number_format($fullsum, 2); ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer" id="hid">
                            <!-- <?php if ($stu == 0) { ?>	
				    <a href="report_sell_form.php?id=<?php echo $q_id; ?>"  class="btn btn-info"><span class="glyphicon glyphicon-plus"></span>เพิ่มรายการอาหาร</a>
				<?php } ?>
                -->
                            <a type="button" id="hid" href="" onclick="window.print()" class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-print"></span> พิมพ์ใบเสร็จ</a>
                            <a type="button" id="hid" href="index_admin.php?p=re" class="btn btn-primary" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> ปิด</a>


                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>