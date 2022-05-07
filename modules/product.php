<div class="product">
    <?php
        if(isset($_GET["id"])){
            $id = $_GET["id"];
            $sqlDetailPro = "SELECT * FROM product  WHERE id= $id";
            $resultDetailPro = mysqli_query($conn,$sqlDetailPro);
            $rowDetaiPro = mysqli_fetch_assoc($resultDetailPro);
            //echo "<pre>";
            //print_r($rowDetaiPro);
    ?>
        <div class="container">
            <div class="product-top row">
            <p class="bread"><span><a style="color:#000;text-decoration:none;" href="index.php?page=home">Home</a></span> / <span>
            <?php 
                if(isset($_GET["id"])){
                    echo $rowDetaiPro["name"];
                }
            ?>
            </span></p>
            </div>
            <div class="product-content row">
                <div class="product-content-left row">
                    <div class="product-content-left-big-img">
                    <img src="<?php echo !empty($rowDetaiPro)?$rowDetaiPro["image"]:""; ?> ">
                    </div>
                </div>
                <div class="product-content-right">
                    <div class="product-content-right-product-name">
                        <h1><?php echo $rowDetaiPro["name"]; ?></h1>
                    </div>
                    <div class="product-content-right-product-name">
                        <h1>Mã sản phẩm : <?php echo $rowDetaiPro["id"]; ?></h1>
                    </div>
                    <div class="product-content-right-product-name">
                        <h1>Cấu Hình: <?php echo $rowDetaiPro["description"]; ?></h1>
                    </div>

                    <div class="product-content-right-product-price">
                    <p>Giá:<?php echo number_format($rowDetaiPro["price"],0,",","."); ?><sup>đ</sup></p>
                    </div>
                    <?php
                        if(isset($_SESSION["loginHome"])){
                    ?>
                    <form action="index.php?page=cart&action=add" method="post">
                    <div class="quantity">
                        <p style="font-weight: bold;">Số lượng:</p>
                        <input type="text" value="1" name="quantity[<?php echo $rowDetaiPro["id"]?>]" />
                    </div>
                    <div class="product-content-right-product-button">
                        <button><i class="fas fa-shopping-cart"></i> <p>MUA HÀNG</p></button>
                    </div>
                    </form>
                    <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
    <div style="clear:both;"></div>
    <?php } ?>