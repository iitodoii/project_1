<?php 
    session_start();
    include('config/server.php');

    $errors = array();

    if (isset($_POST['login_user'])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']); 
        $password = mysqli_real_escape_string($conn, $_POST['password']);


        
        if (empty($email)) {
            array_push($errors, "email ไม่ถูกต้อง");
        }

        if (empty($password)) {
            array_push($errors, "รหัสผ่านไม่ถูกต้อง");
        }

        if (count($errors) == 0) { 

            $query = "SELECT * FROM user WHERE Username = '$email' AND Password = '$password' ";
            $result = mysqli_query($conn, $query);

                  if(mysqli_num_rows($result)==1){
                      $row = mysqli_fetch_array($result);
                      
                      $_SESSION['ID'] = $row['ID'];
                      $_SESSION['Username'] = $row['Username'];
                      $_SESSION['Firstname'] = $row['Firstname'];
                      $_SESSION["Lastname"] = $row["Lastname"];
                      $_SESSION["Tel"] = $row["Tel"];
                      $_SESSION["Userlevel"] = $row["Userlevel"];

                      if($_SESSION['Userlevel']==2){ 
                        echo "<script>
                        alert('เข้าสู่ระบบ  ');
                        window.location.replace('index.php');
                        </script>";
                        }
                      elseif($_SESSION['Userlevel']==1){
                        echo "<script>
                        alert('เข้าสู่ระบบ  ');
                        window.location.replace('admin/index_admin.php');
                        </script>";
                        }
                    }
        else {
            array_push($errors, "Wrong Username or Password");
            $_SESSION['error'] = "ไม่พบ Username นี้ในระบบ";
            header("location: login.php");
          }
        }
    else {
        array_push($errors, "Username & Password is required");
        $_SESSION['error'] = "Username หรือ Password ไม่ถูกต้อง";
        header("location: login.php");
      }
      
    }
    
?>

