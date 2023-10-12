<?php
session_start();
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>รายการสั่งซื้อสินค้า</title>
  <!-- Favicon-->
  <link rel="icon" type="image/x-icon" href="../assets/favicon.ico" />
  <!-- Bootstrap icons-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
  <!-- Core theme CSS (includes Bootstrap)-->
  <link href="../css/styles.css" rel="stylesheet" />
</head>

<body>
  <?php
  include('nav_cart.php');
  ?><br>
  <html>

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Food Detail</title>

    <link href="css/sty.css" rel="stylesheet" type="text/css">
  </head>

  <body style="background-color: #fce4ec">
    <br>
    <div class="bootbody">
      <!--เพิ่ม-->
      <div class="tempbody">

        <table border="0" align="center" class="square" bgcolor="White">

          <?php
          //connect db

          include('../config/server.php');
          $ID = $_GET['ID']; //สร้างตัวแปร p_id เพื่อรับค่า
          $REC = $_GET['REC'];

          $sql = "select * , category.* from product
  left join category on category.category_id=product.category_id
  WHERE product_id='$ID' ";  //รับค่าตัวแปร p_id ที่ส่งมา
          $result = mysqli_query($conn, $sql);
          if (!$result) {
            printf("Error: %s\n", mysqli_error($conn));
            exit();
          }
          $row = mysqli_fetch_array($result);
          $photo = $row['photo'];
          //แสดงรายละเอียด
          //แสดงรายละเอียด
          echo "<tr>";
          echo "<td width='85'><b><img src='../admin/upload/$photo' width='300px' height='350px' class='rounded'></b></td>";
          echo "</tr>";
          echo "<tr>";
          echo "<td width='279'>" . $row["product_name"] . "</td>";
          echo "</tr>";
          echo "<tr>";
          echo "<td>" . $row["category_name"] . "</td>";
          echo "</tr>";
          echo "<tr>";
          echo "<td>" . "฿" . number_format($row["price"], 2) . "</td>";
          echo "</tr>";
          echo "<tr>";
          echo "<td colspan='1' align='right'>";
          echo "<a class='btn btn-danger btn-sm' href='../index.php'> กลับหน้าเมนู </a>";
          echo " ";
          echo "<a class='btn btn-success btn-sm' href='updatecart.php?ID=$ID&act=add'> เพิ่มรายการ </a></td>";
          echo "</tr>";
          ?>
        </table>
      </div>
    </div>
    <hr>
    <div class="container">
      <h1>สินค้าที่คุณอาจจะชอบ</h1>
      <div class="row pb-4">
        <div class="container">
          <div class="row">
            <?php include('config/server.php'); ?>
            <?php
            $perpage = 8;
            if (isset($_GET['page'])) {
              $page = $_GET['page'];
            } else {
              $page = 1;
            }

            $start = ($page - 1) * $perpage;
            $q = isset($_GET['q']) ? $_GET['q'] : '';
            $sql1 = "SELECT * FROM product WHERE num <> 0 AND recommended_to = '$REC' ORDER BY RAND() LIMIT 4;";
            $query1 = $conn->query($sql1 . $where);

            while ($row1 = $query1->fetch_array()) {
            ?>
              <div class="col-12 col-sm-4 col-md-3" style="margin-top: 1rem;">
                <div class="card text-center" style="width: 100%; height: 450px;">
                  <!-- Product image-->
                  <img class="card-img-top" src="../admin/upload/<?php echo $row1['photo'] ?>" height="300px" class="img-fluid" />
                  <!-- Product details-->
                  <div class="card-body">
                    <!-- Product name-->
                    <?php echo $row1['product_name'] ?>
                    <!-- Product price--><br>
                    <?php echo "฿" .  $row1['price'] ?><br>

                    <?php if ($row1['num'] <= 5) { ?>
                      <h8 class="text-danger">จำนวน <?php echo $row1['num']; ?> ชื้น</h8>
                    <?php } else { ?>
                      <h8 class="">จำนวน <?php echo $row1['num']; ?> ชิ้น</h8>
                    <?php } ?>
                  </div>
                  <div class="card-footer p-1 pt-0 border-top-0 bg-transparent">
                    <?php if (empty($_SESSION['ID'])) { ?>
                      <div class="text-center"> <a class="btn mt-auto text-white" href="login.php" style="background-color: #ec407a;"><i class="bi-cart-fill me-1"></i> สั่งซื้อ</a></div>
                    <?php } else { ?>
                      <?php if ($row1['num'] < 1) { ?>
                        <div class="text-center"> <a class="btn mt-auto btn-secondary"><i class="fa-solid fa-circle-exclamation"></i> สินค้าหมด</a></div>
                      <?php } else { ?>
                        <div class="text-center"> <a class="btn mt-auto text-white" target="_blank" href="addcart.php?ID=<?php echo $row1['product_id']; ?>&REC=<?php echo $row1['recommended']; ?>" style="background-color: #ec407a;"><i class="bi-cart-fill me-1"></i> สั่งซื้อ</a></div>
                    <?php }
                    } ?>
                  </div>
                </div>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </body>
  <br><br>

  </html>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Core theme JS-->
  <script src="jss/scripts.js"></script>