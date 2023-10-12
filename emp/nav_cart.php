<?php 
    session_start();
?>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
<style>
@import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100;200;500;600;900&family=Sarabun:wght@200&display=swap');
body {
  height: 200px;
  min-height: 100vh;
  overflow-x: hidden;
  font-family: 'Noto Sans Thai', sans-serif;
}
</style>
<like rel="stylesheet" type="text/css" href="print.css">
<nav class="navbar navbar-expand-lg navbar-light sticky-top" style="background-color: #f8bbd0;">
            <div class="container px-4">
            <?php
            include('../config/db.php');
            $teac = $conn->prepare('SELECT * From contact where id_con = 1');
            $teac->execute();
            $teacs = $teac->fetch();

            if (!$teacs) {
                
            }else{
            ?>
                <a class="navbar-brand text-dack" href="#!">
                <?php echo $teacs['name'];?>
                </a>
            <?php } ?>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4 justify-content-between">
                        <li class="nav-item"><a class="nav-link active text-dack" aria-current="page" href="../index.php">หน้าแรก</a></li>
                        <li class="nav-item"><a class="nav-link text-dack" href="../index.php">สินค้า</a></li>
                       
                            <?php if(!empty($_SESSION['Firstname'])) {?>
                            <li class="nav-item"><a class="nav-link" href="product_user_buy.php">รายการสั่งซื้อ</a></li>
                            <?php }?>
                          </li>
                        
                    </ul>
                    
                    <form class="form-inline">
                        <a class="btn text-white" type="submit" href="updatecart.php" style="background-color: #ad1457">
                            <i class="bi-cart-fill me-1"></i>
                            ตะกร้า
                            <?php if(isset($_SESSION['cart'])){ 
                              $i = 0;
                              foreach($_SESSION['cart'] as $qty){
                              $i += $qty;
                              }
                              ?>
                              <span class="badge bg-Success text-white ms-1 rounded-pill"><?php echo $i;?></span>
                            <?php }else{ $i = 0;?>
                            <span class="badge bg-Success text-white ms-1 rounded-pill"><?php echo $i;?></span>
                            <?php } ?>
                            </a>
                    </form>
                    <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                      <?php if(!empty($_SESSION['Firstname'])) {?>
                        <a class="nav-link" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-regular fa-user"></i> สวัสดี : คุณ <?php echo $_SESSION['Firstname']?> <?php echo $_SESSION['Lastname']?> <i class="fa-solid fa-chevron-down"></i></a>
                        <ul class="dropdown-menu bg-light" aria-labelledby="navbarDropdown">
                        <?php if($_SESSION['Userlevel']==1){?>
                          <li><a class="dropdown-item" href="../admin/index_admin.php" ><i class="fa-solid fa-store"></i> จัดการหลังร้าน</a></li>  
                        <?php } ?>
                        <li><a class="dropdown-item" href="EditUser.php?UserID=<?php echo $_SESSION['ID'];?>" ><i class="fa-solid fa-gears"></i> แก้ไขข้อมูลส่วนตัว</a></li>
                        <li><a class="dropdown-item" href="../logout.php" ><i class="fa-solid fa-right-from-bracket"></i> ออกจากระบบ</a></li>
                        </ul>
                      <?php }else{?>
                        <li><a class="nav-link text-dack" href="../login.php" ><i class="fa-solid fa-right-from-bracket"></i> เข้าสู่ระบบ</a></li>
                      <?php }?>
                    </li>
                    </ul>
                  </div>
                
            </div>  
        </nav>
