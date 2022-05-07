<?php
  ob_start();
  session_start();
  if(isset($_SESSION["loginHome"])){
    header("location:index.php");
  }
  date_default_timezone_set('Asia/Ho_Chi_Minh');
  require_once("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body >
  <div class="container-login">
    <div class="login-form">
        <form action="" method="post">
        <?php
        if(isset($_POST["loginHome"])){
            $userName = trim($_POST["cus_user"]);
            $password = md5(trim($_POST["password"]));
            $sqlLogin = "SELECT * FROM tbl_customer WHERE cus_user='$userName' AND `password` ='$password'";
            $resultLog = mysqli_query($conn,$sqlLogin);
            if(mysqli_num_rows($resultLog)){
                //tạo session
                $rowlogin = mysqli_fetch_row($resultLog);
                $_SESSION["loginHome"] = $rowlogin;
                header("location:index.php");
            }else{
                //header("location:login.php ");
                echo "Tài khoản hoặc mật khẩu không đúng!!";
            }
        }
        ?>
          <h1 class="header-login">Đăng nhập</h1>
          <div class="input-box">
              <i ></i>
              <input type="text" name="cus_user" placeholder="Nhập username">
          </div>
          <div class="input-box">
              <i ></i>
              <input type="password" name="password" placeholder="Nhập mật khẩu">
          </div>
          <div class="btn-box">
              <button type="submit" name="loginHome">
                  Đăng nhập
              </button>
          </div>
          <a style="text-decoration:none; color:black;" href="register.php">Đăng ký</a>
          <a style="text-decoration:none; color:black;margin-left: 20px;" href="index.php">Home</a>
        </form>
      </div>
    </div>
</body>
</html>
