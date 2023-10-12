<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />



    <?php
    include('config/db.php');
    $story = $conn->prepare("SELECT * FROM contact where id_con=1");
    $story->execute();
    $sto = $story->fetch();
    ?>
    <title><?php echo $sto['name']; ?></title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100;200;500;600;900&family=Sarabun:wght@200&display=swap');

        body {
            min-height: 100vh;
            overflow-x: hidden;
            font-family: 'Noto Sans Thai', sans-serif;
        }

        .swiper {
            width: 100%;
            height: 100%;
        }

        .swiper-slide {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2.5rem 0;
        }

        .swiper-slide img {
            object-fit: cover;
            height: 196px;
        }

        .swiper-slide .card {
            border-color: var(--bs-primary-border-subtle);
        }

        .swiper-button-next,
        .swiper-button-prev {
            background-color: #ffffff;
            border-radius: 50%;
            width: var(--swiper-navigation-size);
            height: var(--swiper-navigation-size);
        }

        .swiper-button-next:after,
        .swiper-button-prev:after {
            font-size: 1.5rem;
        }
    </style>
</head>

<body style="background-color: #fce4ec">
    <!-- Navigation-->
    <?php include('nav.php') ?>

    <!-- Section-->
    <div class="p-5 m-0">


        <p class="text-muted fs-4"><a href="index.php">สินค้า</a>/สินค้าทั้งหมด</p>
        <div class="input-group">
            <form action="" method="get">
                <div class="mb-9 row">
                    <div class="col-12 col-sm-8">
                        <input type="text" name="q" class="form-control" placeholder="ค้นหาข้อมูล" value="<?php if (isset($_GET['q'])) {
                                                                                                                echo $_GET['q'];
                                                                                                            } ?>">
                        *กรุณารุบะชื่อสินค้า
                    </div>
                    <div class="col-6 col-sm-1">
                        <button type="submit" class="btn btn-primary">ค้นหา</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="row">
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

                    $where = " WHERE product_name LIKE '%" . $q . "%' AND product_status ='เปิดการใช้งาน'";
                    $sql1 = "select * from product ";
                    $where = " order by product_name asc limit {$start} , {$perpage}";
                    $query1 = $conn->query($sql1);

                    while ($row1 = $query1->fetch_array()) {
                    ?>


                        <div class="col-12 col-sm-4 col-md-3" style="margin-top: 1rem;">
                            <div class="card text-center" style="width: 100%; height: 450px;">
                                <!-- Product image-->
                                <img class="card-img-top" src="admin/upload/<?php echo $row1['photo'] ?>" height="300px" class="img-fluid" />
                                <!-- Product details-->
                                <div class="card-body">
                                    <!-- Product name-->
                                    <?php echo $row1['product_name'] ?>
                                    <!-- Product price--><br>
                                    <?php echo "฿" .  $row1['price'] ?>
                                </div>
                                <div class="card-footer p-1 pt-0 border-top-0 bg-transparent">
                                    <?php if (empty($_SESSION['ID'])) { ?>
                                        <div class="text-center"> <a class="btn mt-auto text-white" href="login.php" style="background-color: #ec407a;"><i class="bi-cart-fill me-1"></i> สั่งซื้อ</a></div>
                                    <?php } else { ?>
                                        <div class="text-center"> <a class="btn mt-auto text-white" href="emp/addcart.php?ID=<?php echo $row1['product_id']; ?>" style="background-color: #ec407a;"><i class="bi-cart-fill me-1"></i> สั่งซื้อ</a></div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>

                    <?php } ?>

                </div>
            </div>
        </div>
        <br>
        <!-- Inner -->
        <?php
        $sql2 = "select * from product ";
        $query2 = mysqli_query($conn, $sql2);
        $total_record = mysqli_num_rows($query2);
        $total_page = ceil($total_record / $perpage);
        ?>

        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-end">
                <li class="page-item disabled">
                    <a class="page-link" href="fullproduct.php?page=1" aria-label="Previous">Previous</a>
                </li>
                <?php for ($i = 1; $i <= $total_page; $i++) { ?>
                    <li><a class="page-link" href="fullproduct.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                <?php } ?>

                <li class="page-item">
                    <a class="page-link" href="fullproduct.php?page=<?php echo $total_page; ?>" aria-label="Next">Next</a>
                </li>

            </ul>
        </nav>
        <hr>
    </div>
    </div>
    </div>
    <?php include('footer.php') ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 1,
            spaceBetween: 20,
            pagination: {
                el: ".swiper-pagination",
                dynamicBullets: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                768: {
                    slidesPerView: 2
                },
                1024: {
                    slidesPerView: 4
                },
            },
        });
    </script>

</body>

</html>