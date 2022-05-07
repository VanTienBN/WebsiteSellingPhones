<div class="col-md-5">
    <div class="x_panel">
        <div class="x_title">
            <h2>Thêm mới danh mục</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br>
            <?php
                if(isset($_POST["addNew"])){
                   $catName = $_POST["cat_name"];
                    $status = isset($_POST["status"])?1:0;
                    $date_create = date("Y-m-d H:i:s");
                    if(isset($_GET["id"]) && isset($_GET["edit"])){
                        $sqlUpdate = "UPDATE tbl_category SET cat_name='$catName',`status`=' $status',date_update='$date_create' WHERE cat_id=".$_GET["id"];
                        mysqli_query($conn,$sqlUpdate) or die("Lỗi câu lệnh truy vấn!");
                        header("location:index.php?page=category");
                    }else{
                        //Viết câu lệnh insert
                        //$sqlInsert = "INSERT INTO tbl_category(cat_name,`status`,date_create)";
                        //$sqlInsert .= " VALUES('$catName',' $status','$date_create')";
                        //Thực thi câu lệnh
                        //mysqli_query($conn,$sqlInsert) or die("Lỗi câu lệnh truy vấn!");
                        $table = "tbl_category";
                        $_POST["status"]=$status;
                        $_POST["date_create"]=$date_create;
                        $data = $_POST;
                        addNew($table,$data);
                    }
                }
                //Kiểm tra id trên url trường hợp sửa
                 $cat_name = "";
                $status = false;
                if(isset($_GET["id"]) && isset($_GET["edit"])){
                    $sqlEdit = "SELECT * FROM tbl_category WHERE cat_id=".$_GET["id"];
                    $resultEdit = mysqli_query($conn, $sqlEdit);
                    $rowEdit = mysqli_fetch_row($resultEdit);
                    //echo "<pre>";
                    //print_r($rowEdit);
                    $cat_name = $rowEdit[1];
                    $status = ($rowEdit[2])?true:false;
                }
                

                //Kiểm tra id trên url trường hợp xóa
                if(isset($_GET["id"]) && isset($_GET["del"])){
                    $sqlDelete = "DELETE FROM tbl_category WHERE cat_id=".$_GET["id"];
                    mysqli_query($conn,$sqlDelete) or die("Lỗi xóa bản ghi!!");
                    header("location:index.php?page=category");
                }

            ?>
            <form class="form-label-left input_mask" method="post">
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 ">Tên danh mục</label>
                    <div class="col-md-9 col-sm-9 ">
                        <input type="text" class="form-control" value="<?php echo $cat_name; ?>" name="cat_name" id="cat_name" placeholder="Tên danh mục">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-sm-3  control-label">Trạng thái</label>
                    <div class="col-md-9 col-sm-9 ">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value="1" <?php echo ($status)?"checked":"" ?> name="status" id="status"> Hiển thị
                            </label>
                        </div>
                    </div>
                </div>
                <div class="ln_solid"></div>
                <div class="form-group row">
                    <div class="col-md-9 col-sm-9  offset-md-3">
                        <button type="button" class="btn btn-primary">Quay Lại</button>
                        <button class="btn btn-primary" type="reset">Làm mới</button>
                        <button type="submit" class="btn btn-success" name="addNew">Thêm</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="col-md-7">
<div class="x_panel">
    <div class="x_content">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>#</th>
            <th>Tên danh mục</th>
            <th>Trạng thái</th>
            <th>Ngày tạo</th>
            <th>#</th>
        </tr>
        </thead>
        <tbody>
        <?php
            //Câu lệnh Select
            $sqlSelect = "SELECT * FROM tbl_category";
            //Thực thi câu lệnh
            $result = mysqli_query($conn, $sqlSelect) or die("Lỗi truy vấn select!!");
            if(mysqli_num_rows($result) > 0) {
                $i = 0;
                while($row = mysqli_fetch_assoc($result)) {
                    $i++;
        ?>
        <tr>
            <th scope="row"><?php echo $i; ?></th>
            <td><?php echo $row["cat_name"]; ?></td>
            <td><?php echo ($row["status"])?"Hiển thị":"Ẩn"; ?></td>
            <td><?php echo date("d-m-Y H:i:s",strtotime($row["date_create"]));?></td>
            <td>
            <a href="index.php?page=category&id=<?php echo $row["cat_id"]; ?>&edit=1">
                <i class="fa fa-pencil-square-o"></i> Sửa</a>
            <a href="index.php?page=category&id=<?php echo $row["cat_id"]; ?>&del=1" onclick="return confirm('Bạn có chắc muốn xóa danh mục này?')"><i class="fa fa-trash-o"></i> Xóa</a>
            </td>
             <td>
            <a href="index.php?page=list_product&id=<?php echo $row["cat_id"]; ?>">
                <i class="fa fa-list"></i> Danh Sách Hàng Hóa</a>
            </td>
        </tr>
        <?php } } ?>
        </tbody>
    </table>
    </div>
</div>
</div> 