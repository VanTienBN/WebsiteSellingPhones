<style>
.navd {
  list-style-type: none;
  text-align: center;
  margin: 0;
  padding: 0;
}

.navd li {
  display: inline-block;
  font-size: 20px;
  padding: 20px;
}
</style>
<div class="col-md-12 col-sm-12  ">
<div class="x_panel">
    <div class="x_title">
    <h2>Danh Sách Hàng Hóa</h2>
    <div class="clearfix"></div>
    </div>
    <div class="x_content">
    <?php
        //Kiểm tra id trên url trường hợp xóa
        if(isset($_GET["id"]) && isset($_GET["del"])){
            $sqlDelete = "DELETE FROM product WHERE id=".$_GET["id"];
            mysqli_query($conn,$sqlDelete) or die("Lỗi xóa bản ghi!!");
            header("location:index.php?page=list_product");
        }
    ?>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>#</th>
            <th>Tên Sản Phẩm</th>
            <th>Ảnh Sản Phẩm</th>
            <th>Giá Tiền</th>
            <th>Ngày tạo</th>
            <th>Mô tả</th>
        </tr>
        </thead>
        <tbody>
        <?php
            $item_page = 5;
            $current_page = !empty($_GET["trang"])?$_GET["trang"]:1;
            $offset = ($current_page - 1 ) * $item_page;
            $sqlSelectPro =" SELECT * FROM product LIMIT $offset,$item_page ";
            if(isset($_GET["id"])){
                 $sqlSelectPro =" SELECT * FROM product WHERE cat_id =".$_GET["id"];
                 $resultSelectPro = mysqli_query($conn, $sqlSelectPro) or die("Lỗi truy vấn select!!");

            }
            $totalRecords = mysqli_query($conn,"SELECT * FROM product ");
            $totalRecords = $totalRecords->num_rows;
            $totalPage = ceil($totalRecords / $item_page);
            $resultSelectPro = mysqli_query($conn, $sqlSelectPro) or die("Lỗi truy vấn select!!");
            if(mysqli_num_rows($resultSelectPro) > 0) {
                $i = 0;
                while($row = mysqli_fetch_assoc($resultSelectPro)) {
                    $i++;
        ?>
        <tr>
            <th scope="row"><?php echo $i; ?></th>
            <td><?php echo $row["name"]; ?></td>
            <td><img src="../<?php echo $row["image"]; ?>" alt="" width="80"></td>
            <td><?php echo $row["price"]; ?></td>
            <td><?php echo date("d-m-Y H:i:s",strtotime($row["date_create"]));?></td>
            <td><?php echo $row["description"]; ?></td>
            <td>
                <a href="index.php?page=editproduct&id=<?php echo $row["id"] ?>&edit=1"><i class="fa fa-pencil-square-o"></i> Sửa </a>
            </td>
            <td>
                <a href="index.php?page=list_product&id=<?php echo $row["id"] ?>&del=1" onclick="return confirm('Bạn có chắc muốn xóa sản phẩm  này?')"><i class="fa fa-trash-o"></i> Xóa</a>
            </td>
        </tr>
        <?php } } ?>
        </tbody>
    </table>
    </div>
    <ul class="navd">
            <?php for($i=1;$i<=$totalPage;$i++) { ?>
            <li><a href="index.php?page=list_product&trang=<?php echo $i; ?>"><?php echo $i; ?></a></li>
            <?php } ?>
    </ul>
</div>
</div>