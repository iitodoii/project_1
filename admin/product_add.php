<style>
@import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100;200;500;600;900&family=Sarabun:wght@200&display=swap');
body {
  min-height: 100vh;
  overflow-x: hidden;
  font-family: 'Noto Sans Thai', sans-serif;
}
</style>

<head>

</head>

<body>
<?php include('../config/server.php');?>
    <center>
    <div class="card">
    <div class="card-header py-3 d-flex flex-row align-items-center">   
        <h4><a href="index_admin.php?p=pro">รายการสินค้า</a>/เพิ่มรายการสินค้า</h4>
    </div>

            <!--เริ่มฟอร์มของหน้าเพิ่มรายการอาหาร-->
            <div class="container p-3">
                <form method="POST" action="product_seve.php" enctype="multipart/form-data">

                    <div class="form-group mb-3">
                        <div class="row">
                            <div class="col-md-3" style="margin-right:0px;">
                                <label class="control-label">ชื่อรายการ:</label>
                            </div>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="product_name" required>
                            </div>
                        </div>
                    </div>
                   
                    <div class="form-group mb-3">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="control-label">ราคา:</label>
                            </div>
                            <div class="col-md-7">
                                <input type="number" class="form-control" name="price" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="control-label">จำนวน:</label>
                            </div>
                            <div class="col-md-7">
                                <input type="number" class="form-control" name="num" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="control-label">ภาพด้านหน้า:</label>
                            </div>
                            <div class="col-md-7">
                                <input type="file" class="form-control" name="photo" id="imgInput">
                                <img loading="lazy" width="50%" id="previewImg" alt="">
                            </div>
                        </div>
                    </div>
                    
                    <button type="button" onclick="history.back()" class="btn btn-primary">ย้อนกลับ</button>
        <button type="submit" class="btn btn-success custom_1" name="save" id="save" value="save" >บันทึก</button>
        </div>
        <!--จบฟอร์มของหน้าเพิ่มรายการอาหาร-->
      
        </form>
        </th>
        </table>
        </div>
        </div>
        <!--จบ <div style="margin-top:10px;"> -->
    </center>
</body>

</html>
<script>
        let imgInput = document.getElementById('imgInput');
        let previewImg = document.getElementById('previewImg');

        let imgInput1 = document.getElementById('imgInput1');
        let previewImg1 = document.getElementById('previewImg1');

        imgInput.onchange = evt => {
            const [file] = imgInput.files;
                if (file) {
                    previewImg.src = URL.createObjectURL(file)
            }
        }

        imgInput1.onchange = evt => {
            const [file] = imgInput1.files;
                if (file) {
                    previewImg1.src = URL.createObjectURL(file)
            }
        }

    </script>
