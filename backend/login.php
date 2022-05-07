
<?php
  ob_start();
  session_start();
  if(isset($_SESSION["login"])){
    header("location:index.php");
  }
  date_default_timezone_set('Asia/Ho_Chi_Minh');
  require_once("../connection.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Đăng nhập </title>

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
    <link href="login.css" rel="stylesheet">
  </head>

  <body> 

      <div class="login">
      <div class="login_wrapper">
        <div class="animate form login_form">

          <section class="login_content">
            <form method="post">
                <?php
                    if(isset($_POST["login"])){
                        $userName = trim($_POST["user_name"]);
                        $password = md5(trim($_POST["password"]));
                        $sqlLogin = "SELECT * FROM tbl_user WHERE user_name='$userName' and `password` ='$password'";
                        $resultLog = mysqli_query($conn,$sqlLogin);
                        if(mysqli_num_rows($resultLog)){
                            //tạo session
                            $rowlogin = mysqli_fetch_row($resultLog);
                            $_SESSION["login"] = $rowlogin;
                            header("location:index.php");
                        }else{
                            header("location:login.php ");
                        }
                    }
                ?>
              <h1>From Đăng Nhập</h1>
              <div>
                <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Tài khoản" required="" />
              </div>
              <div>
                <input type="password" class="form-control" id="password" name="password" placeholder="Mật khẩu" required="" />
              </div>
              <div>
                  <button type="submit" name="login">Đăng nhập</button>
                <!--<a class="btn btn-default submit" href="index.html">Log in</a>-->
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                  <a href="register.php" class="to_register"> Tạo tài khoản </a>
                  <a href="../index.php" class="to_register"> Home </a>
              </div>
          </section>
        </div>
      </div>
    </div>
  </body>

</html>
