<?php session_start(); ?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100;200;500;600;900&family=Sarabun:wght@200&display=swap');

    body {
        min-height: 100vh;
        overflow-x: hidden;
        font-family: 'Noto Sans Thai', sans-serif;
    }
</style>

<head>
    <link rel="icon" href="img/Shop.ico" type="image/x-icon">
    <link rel="shortcut icon" href="img/Shop.ico" type="image/x-icon">
    <?php
    include('../config/db.php');
    $story = $conn->prepare("SELECT * FROM contact");
    $story->execute();
    $sto = $story->fetch();
    ?>
    <title><?php echo $sto['name']; ?></title>
</head>
<?php
if (empty($_SESSION["ID"]) || $_SESSION["Userlevel"] != 1) {
    echo "<script>
    alert('คุณไม่มีสิทธิ์เข้าหน้านี้  ');
    window.location.replace('../login.php');
    </script>";
} else { ?>

    <body>
        <div class="container-fluid">
            <div class="row flex-nowrap">
                <?php include('nav_menu.php') ?>
                <div class="col py-3">
                    <div class="dropdown pb-4" id="hid">
                        <a href="#" class="d-flex align-items-center text-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <h3><i class="fa-sharp fa-solid fa-circle-user"></i></h3>
                            <span class="d-none d-sm-inline mx-1"><?php echo $_SESSION['Username'] ?></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                            <li><a class="dropdown-item" href="index_admin.php?p=editu&UserID=<?php echo $_SESSION['ID']; ?>"><i class="fa-sharp fa-solid fa-user-gear"></i> แก้ไขข้อมูลส่วนตัว</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="../logout.php"><i class="fa-sharp fa-solid fa-right-from-bracket"></i> ออกจากระบบ</a></li>
                        </ul>
                    </div>

                    <ul class="list-unstyled">
                        <?php
                        if (isset($_GET['p'])) {

                            $page = $_GET['p'];
                            if ($page == 'home') { //หน้าแรก
                                require_once('home.php');
                            } elseif ($page == 'list') { //รายการสั่งซื้อ
                                require_once('manage_user.php');
                            } elseif ($page == 'pro') { //จัดการสินค้า
                                require_once('product.php');
                            } elseif ($page == 'cate') {
                                require_once('category.php');
                            } elseif ($page == 'user') {
                                require_once('ManageAdmin.php');
                            } elseif ($page == 'cateadd') {
                                require_once('category_add.php');
                            } elseif ($page == 'new') {
                                require_once('new_user.php');
                            } elseif ($page == 'proadd') {
                                require_once('product_add.php');
                            } elseif ($page == 'proadd2') {
                                require_once('product2.php');
                            } elseif ($page == 'proadd3') {
                                require_once('product3.php');
                            } elseif ($page == 'uppro') {
                                require_once('product_update.php');
                            } elseif ($page == 'sell') {
                                require_once('menu_list.php');
                            } elseif ($page == 'bill') {
                                require_once('report_sell_form.php');
                            } elseif ($page == 'sell_form') {
                                require_once('report_sell_form.php');
                            } elseif ($page == 'sell_back') {
                                require_once('menu_list.php');
                            } elseif ($page == 'up') {
                                require_once('up.php');
                            } elseif ($page == 're') {
                                require_once('report_sell.php');
                            } elseif ($page == 'edituser') {
                                require_once('EditAdmin.php');
                            } elseif ($page == 'editu') {
                                require_once('EditUser.php');
                            } elseif ($page == 're01') {
                                require_once('report_sell_form01.php');
                            } elseif ($page == 'print') {
                                require_once('bill001.php');
                            } elseif ($page == 'slide') {
                                require_once('slide.php');
                            } elseif ($page == 'in_slide') {
                                require_once('in_slide.php');
                            } elseif ($page == 'del_slide') {
                                require_once('del_slide.php');
                            } elseif ($page == 'del_pro') {
                                require_once('del_pro.php');
                            } elseif ($page == 'cate_up') {
                                require_once('category_update.php');
                            } elseif ($page == 'deadd') {
                                require_once('product_add_design.php');
                            } elseif ($page == 'connect') {
                                require_once('addcantect.php');
                            } elseif ($page == 'del_de') {
                                require_once('del_de.php');
                            } elseif ($page == 'sumreport') {
                                require_once('sumreport.php');
                            } elseif ($page == 'report_member') {
                                require_once('report_member.php');
                            } elseif ($page == 'report_perm') {
                                require_once('report_perm.php');
                            } elseif ($page == 'report_product_cat') {
                                require_once('report_product_cat.php');
                            } elseif ($page == 'report_stock') {
                                require_once('report_stock.php');
                            } elseif ($page == 'report_stock_all') {
                                require_once('report_stock_all.php');
                            } elseif ($page == 'report_top5') {
                                require_once('report_top5.php');
                            } elseif ($page == 'report_catagory') {
                                require_once('report_catagory.php');
                            } elseif ($page == 'report_purchase') {
                                require_once('report_purchase.php');
                            } elseif ($page == 'report_payment') {
                                require_once('report_payment.php');
                            } elseif ($page == 'report_ship') {
                                require_once('report_ship.php');
                            } else {
                                require_once('home.php');
                            }
                        } else {
                            require_once('home.php');
                        }
                        ?>

                    </ul>
                </div>
            </div>
        </div>

    </body>
<?php } ?>