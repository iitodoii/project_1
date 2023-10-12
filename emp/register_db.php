<?php
    
    include('config/server.php');
    $errors = array();

    if(isset($_POST['reg_user'])){
        $username = mysqli_real_escape_string($conn,$_POST['username']);
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $password_1 = mysqli_real_escape_string($conn,$_POST['password_1']);
        $password_2 = mysqli_real_escape_string($conn,$_POST['password_2']);

        if(empty($username)){
            array_push($errors,"กรุณากรอกชื่อผู้ใช้");
        }
        if(empty($email)){
            array_push($errors,"กรุณากรอกอีเมล์");
        }
        if(empty($password_1)){
            array_push($errors,"กรุณากรอกรหัสผ่าน");
        }
        if(empty($password_1 != $password_2)){
            array_push($errors,"รหัสผ่านทั้งสองไม่ตรงกัน");
        }

        $user_check_query = "SELECT * FROM user WHERE username = '$username' OR email = '$email'";
        $query = mysqli_query($conn,$user_check_query);
        $result = mysqli_fetch_assoc($query);

        if($result){ // if user exists
            if($result['username']==$username){
                array_push($errors,"มีชื่อผู้ใช้อยู่แล้ว");
            }
            if($result['email']==$email){
                array_push($errors,"มีอีเมล์อยู่แล้ว");
            }
        }
        if(count($errors)==0){
            $password = md5($password_1);

            $sql = "INSERT INTO user (username,email,password) VALUES ('$username','$email','$password')";
            mysqli_query($conn,$sql);

            $_SESSION['username'] = $username;
            $_SESSION['success'] = "คุณกำลังเข้าสู่ระบบ";
            header('location : index.php');

        }else{
            array_push($errors,"มีชื่อผู้ใช้/อีเมล์อยู่แล้ว");
                $_SESSION['errors'] = "มีชื่อผู้ใช้/อีเมล์อยู่แล้ว";
                header("location : register.php");
        }
    }
?>