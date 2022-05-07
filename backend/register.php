<?php
  ob_start();
  date_default_timezone_set('Asia/Ho_Chi_Minh');
  require_once("../connection.php");
  include("../common.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Đăng ký </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <link href="register.css" rel="stylesheet">
    <link href="login.css" rel="stylesheet">
  </head>

  <body>
    <div class="login">
      <div class="login_wrapper">
        <div class="animate form login_form">
        <section class="login_content">
            <form method="post">
            <?php
            if(isset($_POST["addNew"])){
                $userName = trim($_POST["user_name"]);
                $email = trim($_POST["email"]);
                $password = md5(trim($_POST["password"]));

                $sqlRegister = "INSERT INTO tbl_user(`user_name`,email,`password`)";
                $sqlRegister .= " VALUES('$userName',' $email','$password')";
                        //Thực thi câu lệnh
                mysqli_query($conn,$sqlRegister) or die("Lỗi câu lệnh truy vấn!");
            }
            ?>
            <h1>Đăng ký tài khoản</h1>
            <div>
            <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Tài khoản" required="" />
            </div>
            <div>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required="" />
            </div>
            <div>
            <input type="password" class="form-control" id="password" name="password" placeholder="Mật khẩu" required="" />
            </div>
            <div>
                <button type="submit" name="addNew">Đăng ký</button>
            </div>

            <div class="clearfix"></div>

            <div class="separator">
            <p class="change_link">Bạn đã có tài khoản ?
                <a href="login.php" class="to_register"> Đăng nhập </a>
            </p>
            </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
