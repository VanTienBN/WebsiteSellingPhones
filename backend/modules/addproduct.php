<div class="row">
    <div class="col-md-7 col-md-offset-2">
        <div class="x_panel">
            <div class="x_title">
                <h2>Thêm Mới Hàng Hóa <small></small></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br>
                <?php
                    if(isset($_POST["addNew"])){
                        $table="product";
                        $_POST["status"]=1;
                        $_POST["date_create"]=date("Y-m-d H:i:s");
                        // Xử lý upload file ảnh
                        $path="../uploads";
                        if(isset($_FILES["image"])){
                            if(isset($_FILES["image"]["name"])){
                                if($_FILES["image"]["type"]=="image/jpeg" || $_FILES["image"]["type"]=="image/png" || $_FILES["image"]["type"]=="image/gif"){
                                    if($_FILES["image"]["size"]<=24000000){
                                        if($_FILES["image"]["error"]==0){
                                            //Di chuyển file vào uploads
                                            move_uploaded_file($_FILES["image"]["tmp_name"],$path."/".$_FILES["image"]["name"]);
                                             $fileName ="uploads/".$_FILES["image"]["name"];
                                        }else{
                                            echo "Lỗi file";
                                        }
                                    }else{
                                        echo "file quá lớn";
                                    }
                                }else{
                                    echo "file ko phải là ảnh";
                                }
                            }else{
                                echo "Chưa chọn file";
                            }
                        }
                        $_POST["image"]=$fileName;
                        $data = $_POST;
                        addNew($table,$data);
                    }
                ?>
                <form class="form-label-left input_mask" method="post" enctype="multipart/form-data">
                    <div class="col-md-6 col-sm-6  form-group has-feedback">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Tên sản phẩm">
                    </div>

                    <div class="col-md-6 col-sm-6  form-group has-feedback">
                        <?php
                            $sqlSelectCat = "SELECT * FROM tbl_category WHERE `status` = 1";
                            $resultCat = mysqli_query($conn, $sqlSelectCat) or die("Lỗi truy vấn select!!");
                        ?>
                        <select class="form-control" id="cat_id" name="cat_id">
                            <option value="">--Chọn danh mục--</option>
                            <?php
                                if(mysqli_num_rows($resultCat) > 0) {
                                    while($rowCat = mysqli_fetch_assoc($resultCat)) {
                            ?>
                                <option value="<?php echo $rowCat["cat_id"]; ?>"><?php echo $rowCat["cat_name"]; ?></option>
                            <?php } } ?>
                        </select>
                    </div>
                    <div class="col-md-6 col-sm-6  form-group has-feedback">
                    <input type="file" id="image" name="image" >
                    </div>

                    <div class="col-md-6 col-sm-6  form-group has-feedback">
                        <input type="text" class="form-control" id="price" name="price" placeholder="Nhập giá" >
                    </div>

                    <div class="col-md-12 col-sm-12  x_content">
                    <textarea class="form-control" name="description" id="description" ></textarea>

                    <div class="ln_solid"></div>
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