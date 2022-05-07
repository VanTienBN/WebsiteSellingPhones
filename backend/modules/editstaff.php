<div class="row">
    <div class="col-md-7 col-md-offset-2">
        <div class="x_panel">
            <div class="x_title">
                <h2>Sửa Nhân Viên <small></small></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br>
                <?php
                    if(isset($_POST["edit"])){
                        $ten_nv = $_POST["ten_nv"];
                        $cv_id = $_POST["cv_id"];
                        $gioi_tinh=$_POST["gioi_tinh"];
                        $ngay_sinh=$_POST["ngay_sinh"];
                        $_POST["ngay_sinh"]=date("Y-m-d");
                        $dia_chi=$_POST["dia_chi"];
                        $sdt=$_POST["sdt"];
                        $ngay_tao=$_POST["ngay_tao"];
                        $_POST["ngay_tao"]=date("Y-m-d H:i:s");

                        $sqlUpdate = "UPDATE tbl_staff SET ten_nv = '$ten_nv', cv_id = '$cv_id', gioi_tinh = '$gioi_tinh',ngay_sinh = '$ngay_sinh',dia_chi = '$dia_chi',sdt = '$sdt',ngay_tao = '$ngay_tao' WHERE 
                        staff_id = ".$_GET["id"];
                        $query = mysqli_query($conn,$sqlUpdate);
                        if($query){
                            header("location:index.php?page=staff");
                        }else{
                            echo "error";
                        }
                    }
                    if(isset($_GET["id"])){
                        $sqlSelect = "SELECT * FROM tbl_staff WHERE staff_id =".$_GET["id"];
                        $result = mysqli_query($conn,$sqlSelect);
                        $rowPro = mysqli_fetch_assoc($result);

                    }
                ?>
                <form class="form-label-left input_mask" method="post" enctype="multipart/form-data">
                    <div class="col-md-6 col-sm-6  form-group has-feedback">
                        <input type="text" class="form-control" id="ten_nv" name="ten_nv" placeholder="Tên Nhân viên" value="<?php echo $rowPro["ten_nv"];?>">
                    </div>

                    <div class="col-md-6 col-sm-6  form-group has-feedback">
                        <?php
                            $sqlSelectCat = "SELECT * FROM tbl_position WHERE `pos_status` = 1";
                            $resultCat = mysqli_query($conn, $sqlSelectCat) or die("Lỗi truy vấn select!!");
                        ?>
                        <select class="form-control" id="cv_id" name="cv_id">
                            <option value="">--Chọn chức vụ--</option>
                            <?php
                                if(mysqli_num_rows($resultCat) > 0) {
                                    while($rowCat = mysqli_fetch_assoc($resultCat)) {
                            ?>
                                <option value="<?php echo $rowCat["cv_id"]; ?>"<?php echo ($rowCat["cv_id"]== $rowPro["cv_id"])?'selected':'' ?>><?php echo $rowCat["pos_name"]; ?></option>
                            <?php } } ?>
                        </select>
                    </div>
                    <div class="col-md-6 col-sm-6  form-group has-feedback">
                        <input type="text" class="form-control" id="gioi_tinh" name="gioi_tinh" placeholder="Nhập giới tính"  value="<?php echo $rowPro["gioi_tinh"]; ?>">
                    </div>

                    <div class="col-md-6 col-sm-6  form-group has-feedback">
                        <input type="text" class="form-control" id="ngay_sinh" name="ngay_sinh" placeholder="Nhập ngày sinh"  value="<?php echo $rowPro["ngay_sinh"]; ?>">
                    </div>
                    <div class="col-md-6 col-sm-6  form-group has-feedback">
                        <input type="text" class="form-control" id="dia_chi" name="dia_chi" placeholder="Nhập địa chỉ"  value="<?php echo $rowPro["dia_chi"]; ?>">
                    </div>
                    <div class="col-md-6 col-sm-6  form-group has-feedback">
                        <input type="text" class="form-control" id="sdt" name="sdt" placeholder="Nhập số điện thoại"  value="<?php echo $rowPro["sdt"]; ?>">
                    </div>
                    

                        <div class="form-group row">
                        <div class="col-md-9 col-sm-9  offset-md-3">
                            <button type="button" class="btn btn-primary">Quay lại</button>
                            <button class="btn btn-primary" type="reset">Làm mới</button>
                            <button type="submit" class="btn btn-success" name="edit">Sửa</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
</div>