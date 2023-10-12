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
        <h4>เพิ่มรูปแบบการตกแต่ง</h4>
        <div>
            <!--เริ่มฟอร์มของหน้าเพิ่มรายการอาหาร-->
            <div class="container">
                <form method="POST" action="product_seve_design.php" enctype="multipart/form-data">
                    <div class="form-group mb-3">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="control-label">รูปภาพ:</label>
                            </div>
                            <div class="col-md-7">
                                <input type="file" class="form-control" name="img_design" id="imgInput">
                                <img loading="lazy" width="50%" id="previewImg" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="control-label">ประเภท:</label>
                            </div>
                            <div class="col-md-7">
                            <select class="form-select"  name="tye">
                                <option value="">--กรุณาเลือก--</option>
                                <option value="1">กระดุม</option>
                                <option value="2">ลูกปัด</option>
                                <option value="3">เพชรพลอย</option>
                                <option value="4">กากเพชร</option>
                                <option value="5">สกรีน</option>
                                <option value="6">เพ้นท์</option>
                                <option value="7">ปัก</option>
                                <option value="8">ขนมิ้งค์</option>
                            </select>
                            </div>
                        </div>
                    </div>
        </div>
        <!--จบฟอร์มของหน้าเพิ่มรายการอาหาร-->
        <br><br><br>
        <button type="button" onclick="history.back()" class="btn btn-primary">ย้อนกลับ</button>
        &nbsp;&nbsp;
        <button type="submit" class="btn btn-success custom_1" name="save" id="save" value="save" >บันทึก</button>
        </form>
        </th>
        </table>
        </div>
        <!--จบ <div style="margin-top:10px;"> -->
    </center>
</body>

</html>
<script>
        let imgInput = document.getElementById('imgInput');
        let previewImg = document.getElementById('previewImg');

        imgInput.onchange = evt => {
            const [file] = imgInput.files;
                if (file) {
                    previewImg.src = URL.createObjectURL(file)
            }
        }

    </script>
