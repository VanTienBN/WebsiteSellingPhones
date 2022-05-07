<div class="col-md-5">
    <div class="x_panel">
        <div class="x_title">
            <h2>Thêm Mới Chức Vụ</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br>
            <?php
                if(isset($_POST["addNew"])){
                    $pos_name = $_POST["pos_name"];
                    $pos_status = isset($_POST["pos_status"])?1:0;
                    $pos_date_create = date("Y-m-d H:i:s");
                    if(isset($_GET["pos_id"]) && isset($_GET["edit"])){
                        $sqlUpdate = "UPDATE tbl_position SET pos_name='$pos_name',`pos_status`=' $pos_status',pos_date_update='$pos_date_create' WHERE cv_id=".$_GET["id"];
                        mysqli_query($conn,$sqlUpdate) or die("Lỗi câu lệnh truy vấn!");
                        header("location:index.php?page=position");
                    }else{
                        //Viết câu lệnh insert
                        //$sqlInsert = "INSERT INTO tbl_category(cat_name,`status`,date_create)";
                        //$sqlInsert .= " VALUES('$catName',' $status','$date_create')";
                        //Thực thi câu lệnh
                        //mysqli_query($conn,$sqlInsert) or die("Lỗi câu lệnh truy vấn!");
                        $table = "tbl_position";
                        $_POST["pos_status"]=$pos_status;
                        $_POST["pos_date_create"]=$pos_date_create;
                        $data = $_POST;
                        addNew($table,$data);
                    }
                }
                //Kiểm tra id trên url trường hợp sửa
               $pos_name = "";
                $pos_status = false;
                if(isset($_GET["id"]) && isset($_GET["edit"])){
                    $sqlEdit = "SELECT * FROM tbl_position WHERE cv_id=".$_GET["id"];
                    $resultEdit = mysqli_query($conn, $sqlEdit);
                    $rowEdit = mysqli_fetch_row($resultEdit);
                    //echo "<pre>";
                    //print_r($rowEdit);
                    $pos_name = $rowEdit[1];
                    $pos_status = ($rowEdit[2])?true:false;
                }

                //Kiểm tra id trên url trường hợp xóa
                if(isset($_GET["id"]) && isset($_GET["del"])){
                    $sqlDelete = "DELETE FROM tbl_position WHERE cv_id=".$_GET["id"];
                    mysqli_query($conn,$sqlDelete) or die("Lỗi xóa bản ghi!!");
                    header("location:index.php?page=position");
                }

            ?>
            <form class="form-label-left input_mask" method="post">
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 ">Tên chức vụ</label>
                    <div class="col-md-9 col-sm-9 ">
                        <input type="text" class="form-control" value="<?php echo $pos_name; ?>" name="pos_name" id="pos_name" placeholder="Tên chức vụ">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-sm-3  control-label">Trạng thái</label>
                    <div class="col-md-9 col-sm-9 ">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value="1" <?php echo ($pos_status)?"checked":"" ?> name="pos_status" id="pos_status"> Hiển thị
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
            <th>Tên chức vụ</th>
            <th>Trạng thái</th>
            <th>Ngày tạo</th>
            <th>#</th>
        </tr>
        </thead>
        <tbody>
        <?php
            //Câu lệnh Select
            $sqlSelect = "SELECT * FROM tbl_position";
            //Thực thi câu lệnh
            $result = mysqli_query($conn, $sqlSelect) or die("Lỗi truy vấn select!!");
            if(mysqli_num_rows($result) > 0) {
                $i = 0;
                while($row = mysqli_fetch_assoc($result)) {
                    $i++;
        ?>
        <tr>
            <th scope="row"><?php echo $i; ?></th>
            <td><?php echo $row["pos_name"]; ?></td>
            <td><?php echo ($row["pos_status"])?"Hiển thị":"Ẩn"; ?></td>
            <td><?php echo date("d-m-Y H:i:s",strtotime($row["pos_date_create"]));?></td>
            <td>
            <a href="index.php?page=position&id=<?php echo $row["cv_id"]; ?>&edit=1">
                <i class="fa fa-pencil-square-o"></i> Sửa</a>
            <a href="index.php?page=position&id=<?php echo $row["cv_id"]; ?>&del=1" onclick="return confirm('Bạn có chắc muốn xóa danh mục này?')"><i class="fa fa-trash-o"></i> Xóa</a>
            </td>
             <td>
            <a href="index.php?page=staff&id=<?php echo $row["cv_id"]; ?>">
                <i class="fa fa-list"></i> Danh Sách Nhân Viên</a>
            </td>
        </tr>
        <?php } } ?>
        </tbody>
    </table>
    </div>
</div>
</div> 