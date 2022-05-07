<?php
    //Kiểm tra id trên url trường hợp xóa
    if(isset($_GET["id"]) && isset($_GET["del"])){
        $sqlDelete = "DELETE FROM orders WHERE id=".$_GET["id"];
        mysqli_query($conn,$sqlDelete) or die("Lỗi xóa bản ghi!!");
        header("location:index.php?page=category");
    }

?>  
<div class="col-md-12">
<div class="x_panel">
    <div class="x_content">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Tên người nhận</th>
            <th>Địa chỉ</th>
            <th>SĐT</th>
            <th>Ngày tạo</th>
            <th>#</th>
        </tr>
        </thead>
        <tbody>
        <?php
            //Câu lệnh Select
            $sqlSelect = "SELECT * FROM orders";
            //Thực thi câu lệnh
            $result = mysqli_query($conn, $sqlSelect) or die("Lỗi truy vấn select!!");
            if(mysqli_num_rows($result) > 0) {
                $i = 0;
                while($row = mysqli_fetch_assoc($result)) {
                    $i++;
        ?>
        <tr>
            <td><?php echo $row["id"]; ?></td>
            <td><?php echo $row["name"]; ?></td>
            <td><?php echo $row["address"]; ?></td>
            <td><?php echo $row["phone"]; ?></td>
            <td><?php echo date("d-m-Y H:i:s",strtotime($row["date_create"]));?></td>
            <td>
            <a href="index.php?page=list_oder&id=<?php echo $row["id"]; ?>&del=1" onclick="return confirm('Bạn có chắc muốn xóa đơn hàng này?')"><i class="fa fa-trash-o"></i> Xóa</a>
            </td>
             <td>
            <a href="index.php?page=order_printing&id=<?php echo $row["id"]; ?>">
                <i class="fa fa-list"></i> In đơn hàng</a>
            </td>
        </tr>
        <?php } } ?>
        </tbody>
    </table>
    </div>
</div>
</div> 