<?php
  ob_start();
  session_start();
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
        if(isset($_POST["registerHome"])){
            $cusName = trim($_POST["cus_name"]);
            $userName = trim($_POST["cus_user"]);
            $password = md5(trim($_POST["password"]));
            $email = trim($_POST["email"]);
            $phone = trim($_POST["phone"]);
            $address = trim($_POST["address"]);
            $_POST["date_create"]=date("Y-m-d H:i:s");
            $date_create = $_POST["date_create"]; 
            $sqlRegister = "INSERT INTO tbl_customer (cus_name,cus_user,`password`,phone,email,`address`,date_create) VALUE ('$cusName','$userName','$password','$phone',' $email','$address','$date_create') ";
            $resultReg = mysqli_query($conn,$sqlRegister);
        }
        ?>
          <h1 class="header-login">Đăng Ký</h1>
          <div class="input-box">
              <input type="text" name="cus_name" placeholder="Nhập tên">
          </div>
          <div class="input-box">
              <input type="text" name="cus_user" placeholder="Nhập username">
          </div>
          <div class="input-box">
              <input type="password" name="password" placeholder="Nhập mật khẩu">
          </div>
          <div class="input-box">
              <input type="text" name="email" placeholder="Nhập email">
          </div>
          <div class="input-box">
              <input type="text" name="phone" placeholder="Nhập số điện thoại">
          </div>
          <div class="input-box">
              <input type="text" name="address" placeholder="Nhập địa chỉ">
          </div>
          <div class="btn-box">
              <button type="submit" name="registerHome">
                  Đăng ký
              </button>
          </div>
          <a style="text-decoration:none; color:black;" href="login.php">Đăng nhập</a>
        </form>
      </div>
    </div>
</body>
</html>
