<style>
@import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100;200;500;600;900&family=Sarabun:wght@200&display=swap');
body {
  min-height: 100vh;
  overflow-x: hidden;
  font-family: 'Noto Sans Thai', sans-serif;
}
</style>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-light" id="hid">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-dark min-vh-100">
                <a href="index_admin.php" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                    <span class="fs-5 d-none d-sm-inline">Menu</span>
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                        <a href="index_admin.php" class="nav-link text-dark align-middle px-0">
                        <i class="fa-solid fa-house"></i> <span class="ms-1 d-none d-sm-inline">Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="index_admin.php?p=user" class="nav-link text-dark px-0 align-middle">
                        <i class="fa-sharp fa-solid fa-user-group"></i> <span class="ms-1 d-none d-sm-inline">จัดการข้อมูลผู้ใช้งาน</span>
                        </a>
                    </li>
                    <li>
                        <a href="index_admin.php?p=pro" class="nav-link px-0 text-dark align-middle">
                        <i class="fa-solid fa-shirt"></i> <span class="ms-1 d-none d-sm-inline">จัดการสินค้า</span>
                        </a>
                    </li>
                    <li>
                        <a href="index_admin.php?p=cate" class="nav-link text-dark px-0 align-middle ">
                        <i class="fa-solid fa-layer-group"></i> <span class="ms-1 d-none d-sm-inline">จัดการประเภทสินค้า</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="index_admin.php?p=slide" class="nav-link text-dark align-middle px-0">
                        <i class="fa-solid fa-image"></i> <span class="ms-1 d-none d-sm-inline">จัดการภาพสไลด์</span>
                        </a>
                    </li>
                    <li>
                        <a href="index_admin.php?p=sell" class="nav-link text-dark px-0 align-middle">
                        <i class="fa-solid fa-list"></i> <span class="ms-1 d-none d-sm-inline">จัดการรายการสั่งซื้อ</span>
                        </a>
                    </li>
                    
                    <li>
                        <a href="../index.php" class="nav-link text-dark px-0 align-middle">
                        <i class="fa-solid fa-shop"></i> <span class="ms-1 d-none d-sm-inline">จัดการหน้าร้านค้า</span>
                        </a>
                    </li>
                    <li>
                        <a href="index_admin.php?p=re" class="nav-link px-0 text-dark align-middle">
                        <i class="fa-solid fa-server"></i> <span class="ms-1 d-none d-sm-inline">จัดการประวัติการสั่งซื้อ</span>
                        </a>
                    </li>
                    <li>
                        <a href="index_admin.php?p=connect" class="nav-link px-0 text-dark align-middle">
                        <i class="fa-solid fa-city"></i> <span class="ms-1 d-none d-sm-inline">จัดการข้อมูลของร้าน</span>
                        </a>
                    </li>
                    <!-- <li>
                        <a href="index_admin.php?p=sumreport" class="nav-link px-0 text-dark align-middle">
                        <i class="fa-solid fa-chart-pie"></i> <span class="ms-1 d-none d-sm-inline">สรุปรายได้</span>
                        </a>
                    </li> -->
                    <li>
                        <a href="index_admin.php?p=report_member" class="nav-link px-0 text-dark align-middle">
                        <i class="fa-solid fa-chart-pie"></i> <span class="ms-1 d-none d-sm-inline">รายงานข้อมูลสมาชิก</span>
                        </a>
                    </li>
                    <li>
                        <a href="index_admin.php?p=report_perm" class="nav-link px-0 text-dark align-middle">
                        <i class="fa-solid fa-chart-pie"></i> <span class="ms-1 d-none d-sm-inline">รายงานสิทธิ์ การเข้าใช้งาน</span>
                        </a>
                    </li>
                    <li>
                        <a href="index_admin.php?p=report_product_cat" class="nav-link px-0 text-dark align-middle">
                        <i class="fa-solid fa-chart-pie"></i> <span class="ms-1 d-none d-sm-inline">รายงานข้อมูลสินค้า (ตามประเภท)</span>
                        </a>
                    </li>
                    <li>
                        <a href="index_admin.php?p=report_stock" class="nav-link px-0 text-dark align-middle">
                        <i class="fa-solid fa-chart-pie"></i> <span class="ms-1 d-none d-sm-inline">รายงานจำนวนสินค้าคงเหลือ</span>
                        </a>
                    </li>
                    <li>
                        <a href="index_admin.php?p=report_stock_all" class="nav-link px-0 text-dark align-middle">
                        <i class="fa-solid fa-chart-pie"></i> <span class="ms-1 d-none d-sm-inline">รายงานจำนวนสินค้าคงคลัง</span>
                        </a>
                    </li>
                    <li>
                        <a href="index_admin.php?p=report_top5" class="nav-link px-0 text-dark align-middle">
                        <i class="fa-solid fa-chart-pie"></i> <span class="ms-1 d-none d-sm-inline">รายงานข้อมูลสินค้าขายดี 5 อันดับ</span>
                        </a>
                    </li>
                    <li>
                        <a href="index_admin.php?p=sumreport" class="nav-link px-0 text-dark align-middle">
                        <i class="fa-solid fa-chart-pie"></i> <span class="ms-1 d-none d-sm-inline">รายงานยอดขายสินค้า วัน/เดือน/ปี</span>
                        </a>
                    </li>
                    <li>
                        <a href="index_admin.php?p=report_catagory" class="nav-link px-0 text-dark align-middle">
                        <i class="fa-solid fa-chart-pie"></i> <span class="ms-1 d-none d-sm-inline">รายงานแคตตาล็อคสินค้า</span>
                        </a>
                    </li>
                    <li>
                        <a href="index_admin.php?p=report_purchase" class="nav-link px-0 text-dark align-middle">
                        <i class="fa-solid fa-chart-pie"></i> <span class="ms-1 d-none d-sm-inline">รายงานรายงานข้อมูลการสั่งซื้อสินค้า วัน/เดือน/ปี</span>
                        </a>
                    </li>
                    <li>
                        <a href="index_admin.php?p=report_payment" class="nav-link px-0 text-dark align-middle">
                        <i class="fa-solid fa-chart-pie"></i> <span class="ms-1 d-none d-sm-inline">รายงานข้อมูลการแจ้งชำระเงิน วัน/เดือน/ปี</span>
                        </a>
                    </li>
                    <li>
                        <a href="index_admin.php?p=report_ship" class="nav-link px-0 text-dark align-middle">
                        <i class="fa-solid fa-chart-pie"></i> <span class="ms-1 d-none d-sm-inline">รายงานข้อมูลสถานะการจัดส่ง วัน/เดือน/ปี</span>
                        </a>
                    </li>

                </ul>
                <hr>

            </div>
        </div>

 