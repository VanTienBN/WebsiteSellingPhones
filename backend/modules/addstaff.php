<div class="row">
    <div class="col-md-7 col-md-offset-2">
        <div class="x_panel">
            <div class="x_title">
                <h2>Thêm mới nhân viên <small></small></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br>
                <?php
                   if(isset($_POST["addNew"])){
                        $table="tbl_staff";
                        $data = $_POST;
                        $date_create = date("Y-m-d H:i:s");
                         $_POST["ngay_tao"] = $date_create;
                         $data = $_POST;
                        addNew($table,$data);
                    }
                ?>
                <form class="form-label-left input_mask" method="post" enctype="multipart/form-data">
                    <div class="col-md-6 col-sm-6  form-group has-feedback">
                        <input type="text" class="form-control" id="ten_nv" name="ten_nv" placeholder="Tên nhân viên">
                    </div>

                    <div class="col-md-6 col-sm-6  form-group has-feedback">
                        <?php
                            $sqlSelectCat = "SELECT * FROM tbl_position WHERE `pos_status` = 1";
                            $resultCat = mysqli_query($conn, $sqlSelectCat) or die("Lỗi truy vấn select!!");
                        ?>
                        <select class="form-control" id="cv_id" name="cv_id">
                            <option value="">--Chọn danh mục--</option>
                            <?php
                                if(mysqli_num_rows($resultCat) > 0) {
                                    while($rowCat = mysqli_fetch_assoc($resultCat)) {
                            ?>
                                <option value="<?php echo $rowCat["cv_id"]; ?>"><?php echo $rowCat["pos_name"]; ?></option>
                            <?php } } ?>
                        </select>
                    </div>
                        <div class="col-md-6 col-sm-6  form-group has-feedback">
                        <input type="text" class="form-control" id="gioi_tinh" name="gioi_tinh" placeholder="Nhập giới tính" >
                    </div>

                    <div class="col-md-6 col-sm-6  form-group has-feedback">
                        <input type="text" class="form-control" id="ngay_sinh" name="ngay_sinh" placeholder="Nhập ngày sinh" >
                    </div>
                     <div class="col-md-6 col-sm-6  form-group has-feedback">
                        <input type="text" class="form-control" id="dia_chi" name="dia_chi" placeholder="Nhập địa chỉ" >
                    </div>
                    <div class="col-md-6 col-sm-6  form-group has-feedback">
                        <input type="text" class="form-control" id="sdt" name="sdt" placeholder="Nhập số điện thoại " >
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-md-9 col-sm-9  offset-md-3">
                            <button type="button" class="btn btn-primary">Quay lại</button>
                            <button class="btn btn-primary" type="reset">Làm mới</button>
                            <button type="submit" class="btn btn-success" name="addNew">Thêm mới</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>