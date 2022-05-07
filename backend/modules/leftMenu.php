<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
    <div class="clearfix"></div>
    <!-- menu profile quick info -->
    <div class="profile clearfix">
        <div class="profile_info">
        <span> Welcome @ <?php
            if(isset($_SESSION["login"])){
                echo $_SESSION["login"][1];
            }
        ?> </span>
        </div>
        <div class="navbar nav_title" style="border: 0;">
        <a href="../index.php" class="site_title">Home</a>
        </div>
    </div>
    <!-- /menu profile quick info -->
<br />
<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
    <ul class="nav side-menu">
            <li><a href="index.php?page=category">Danh Mục Hàng Hóa</a></li>
            <li><a href="index.php?page=addproduct">Thêm Mới Hàng Hóa</a></li>
            <li><a href="index.php?page=list_product">Danh Sách Tất Cả Hàng Hóa</a></li>
             <li><a href="index.php?page=list_oder">Quản Lý Đơn Hàng</a></li>
             <li><a href="index.php?page=position">Danh Mục Chức Vụ</a></li>
             <li><a href="index.php?page=addstaff">Thêm Mới Nhân Viên</a></li>
            <li><a href="index.php?page=staff">Danh Sách Nhân Viên</a></li>
            <li><a href="index.php?page=logout">Log out</a></li>
    </ul>
    </div>
</div>
<!-- /sidebar menu -->
    </div>
</div>