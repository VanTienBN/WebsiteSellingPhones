<?php
	include("connection.php");
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Trang chủ</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="header">
		<ul class="menu-top">
				<li><a href="index.php?page=home">Home</a></li>
				<?php
                $sqlSelect = "SELECT * FROM tbl_category WHERE `status` = '1'";
                $resultSelect = mysqli_query($conn,$sqlSelect);
                while($row = mysqli_fetch_assoc($resultSelect)){
                ?>
                <li><a href="index.php?page=category&id=<?php echo $row["cat_id"]; ?>"><?php echo $row["cat_name"]; ?></a></li>
                <?php } ?>
                 <li><a href="backend/index.php?page=category">Admin</a></li>
                <li>
                    <?php if(isset($_SESSION["loginHome"])){ ?>
                    <a  href="index.php?page=logout">Đăng xuất</a>
                <?php }else { ?>
                    <a  href="login.php">Đăng nhập</a>  
                <?php } ?>            
                </li>
                <form method="post" class="home_cart">
                    <input type="submit" name="cart" value="Giỏ hàng">
                </form>
                <?php
                    if(isset($_POST["cart"])){
                        if($_SESSION["loginHome"]){
                            header("location:index.php?page=cart");
                        }else {
                            header("location:login.php");
                        }
                    }
                ?>

		</ul>		
	</div> 
	<div class="main">
		<?php
			 if(isset($_GET["page"])){
                $page = $_GET["page"];
                $file = "modules/".$page.".php";
                include($file);
            }else{
                include("modules/home.php");
            }
		?>
	</div>
	<div class="footer">
        <div class="clearfix">
		</div>
        <div class="Lienhe">
            <div class="left">
                    <h4 style="margin-left: 40px;">Tiến Linh Apple </h4>
                    <ul>
                        <li><a href="#">Đơn Vị Chủ Sở Hữu:Khoa CNTT Đại Học Điện Lực </a></li>
                        <li><a href="#">Địa Chỉ Shop:Nghĩa Đồng Nghĩa Hưng Nam Định</a></li>
                        <li><a href="#">SĐT:0969000625</a></li>
                        <li><a href="#">Emai:Tien1223bn@gmail.com</a></li>
                    </ul>
        </div>
            <div class="right">
                    <h4>Chính sách</h4>
                    <ul>
                        <li><a href="#">Giới Thiệu</a></li>
                        <li><a href="#">Điều khoản sử dụng</a></li>
                        <li><a href="#">Chính sách bảo hành</a></li>
                        <li><a href="#">Chính sách đổi trả hàng</a></li>
                        <li><a href="#">Vận chuyển và thanh toán</a></li>
                        <li><a href="#">Quy chế hoạt động Apple</a></li>
                    </ul>
    		</div>
		</div>    
	</div>
</body>
</html>