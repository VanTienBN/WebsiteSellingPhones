<div class="col-md-12 col-sm-12  ">
<div class="x_panel">
    <div class="x_title">
    <h2>Danh Sách Nhân Viên</h2>
    <div class="clearfix"></div>
    </div>
    <div class="x_content">
    <?php
        //Kiểm tra id trên url trường hợp xóa
        if(isset($_GET["id"]) && isset($_GET["del"])){
            $sqlDelete = "DELETE FROM tbl_staff WHERE staff_id=".$_GET["id"];
            mysqli_query($conn,$sqlDelete) or die("Lỗi xóa bản ghi!!");
            header("location:index.php?page=staff");
        }
    ?>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>#</th>
            <th>Tên Nhân Viên</th>  
            <th>Giới Tính</th>
            <th>Ngày Sinh</th>
            <th>Địa Chỉ</th>
            <th>Số Điện Thoại</th>
            <th>Ngày Tạo</th>
        </tr>
        </thead>
        <tbody>
        <?php
            if(isset($_GET["id"])){
                $sqlSelectPro =" SELECT * FROM tbl_staff WHERE cv_id =".$_GET["id"];            
           }
           else{
            $sqlSelectPro = " SELECT * FROM tbl_staff";
           }
            $resultSelectPro = mysqli_query($conn, $sqlSelectPro) or die("Lỗi truy vấn select!!");
            if(mysqli_num_rows($resultSelectPro) > 0) {
                $i = 0;
                while($row = mysqli_fetch_assoc($resultSelectPro)) {
                    $i++;
        ?>
        <tr>
            <th scope="row"><?php echo $i; ?></th>
            <td><?php echo $row["ten_nv"]; ?></td>
            <td><?php echo $row["gioi_tinh"]; ?></td>
             <td><?php echo $row["ngay_sinh"]; ?></td>
             <td><?php echo $row["dia_chi"]; ?></td>
             <td><?php echo $row["sdt"]; ?></td>
              <td><?php echo date("d-m-Y H:i:s",strtotime($row["ngay_tao"]));?></td>
            <td>
                <a href="index.php?page=editstaff&id=<?php echo $row["staff_id"] ?>&edit=1"><i class="fa fa-pencil-square-o"></i> Sửa </a>
    
                <a href="index.php?page=staff&id=<?php echo $row["staff_id"] ?>&del=1" onclick="return confirm('Bạn có chắc muốn xóa sản phẩm  này?')"><i class="fa fa-trash-o"></i> Xóa</a>
            </td>
        </tr>
        <?php } } ?>
        </div>
        </tbody>
    </table>
    
    </div>

</div>
</div>