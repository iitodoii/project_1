<?php include('config/server.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
<style>
@import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100;200;500;600;900&family=Sarabun:wght@200&display=swap');
body {
  min-height: 100vh;
  overflow-x: hidden;
  font-family: 'Noto Sans Thai', sans-serif;
  
}
#bg{
	height: 100%;
  background-color: #ad1457; 
	background-size: cover;		
}
a:link {
text-decoration:none;
}
.x {
  max-width: 100%;
  padding: 1rem 2rem;
  -webkit-backdrop-filter: blur(10px);
  backdrop-filter: blur(10px);
  background-color: rgba(255, 255, 255, 0.4); 
  border-radius: 0.25rem;
}
</style>
<title>Beauteous Shop</title>
</head><br><br><br>
<body id="bg">
        <?php include('errors.php'); ?>
        <div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-4">
            <div class="card px-5 py-5 x">
			<div class="card-body">
            <div class="wrap-input100 validate-input" data-validate = "">
					<div class="alert alert-primary" role="alert">
					<h1 class="text-center"><i class="fa-solid fa-lock"></i></h1> <h4 class="text-center">เข้าสู่ระบบ</h4>
					</div>
					</div>
    </div>
    <form action="login_db.php" method="post">
    <div class="wrap-input100 validate-input" data-validate = "Enter UserID">
        <label for="email">Email</label>
        <input type="text" class="form-control" name="email">
        </div>
        <div class="wrap-input100 validate-input" data-validate="Enter password">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password">
        </div><br>
        <div class ="input-group"><br>
        <button type="submit" name="login_user" class="btn btn-primary">Login</button>
        </div><br>
        <p>หากยังไม่เป็นสมาชิก <a href="new_user.php" class="text-success bg-white"> สมัครสมาชิก </a></p>
    </form>
    </div>

</div>
</div>
</div>
</div>
</div>
</body>
</html>