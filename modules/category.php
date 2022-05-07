<link rel="stylesheet" type="text/css" href="css/style.css">
<p class="bread" style="font-size:18px;"><span><a style="text-decoration: none;color:#000;" href="index.php?page=home">Home</a></span> / <span>
    <?php 
        if(isset($_GET["id"])){
            $cat_id = $_GET["id"];
            $sqlCat = "SELECT * FROM tbl_category WHERE cat_id = $cat_id";
            $resultCat = mysqli_query($conn,$sqlCat);
            if(mysqli_num_rows($resultCat)>0){
                $rowCat = mysqli_fetch_row($resultCat);
                echo $rowCat[1];
            } 
        }
    ?>
</span></p>
<div class="banner-category">
    <img src="img/Thiet-ke-logo-dien-thoai-apple-123-14.jpg" alt="">
</div>
<div class="list-market">
    <div class="list">
        <?php 
        if(isset($_GET["id"])){
            $cat_id = $_GET["id"];
            $item_page = 8;
            $current_page = !empty($_GET["trang"])?$_GET["trang"]:1;
            $offset = ($current_page - 1 ) * $item_page;
            $sqlSelect = "SELECT * FROM product WHERE cat_id = $cat_id ORDER BY id ASC LIMIT ".$item_page."  OFFSET ".$offset;
            $resultSelect = mysqli_query($conn,$sqlSelect);
            $totalRecords = mysqli_query($conn,"SELECT * FROM product WHERE cat_id = $cat_id");
            $totalRecords = $totalRecords->num_rows;
            $totalPage = ceil($totalRecords / $item_page);
            while($row = mysqli_fetch_assoc($resultSelect)){
        ?>
        <div class="item">
            <a href="index.php?page=product&id=<?php echo $row["id"]; ?>">
                <img src="<?php echo $row["image"]; ?>">
                <p>Tên Sản Phẩm  :   <?php echo $row["name"]; ?></p>
                <p>Giá : <?php echo number_format($row["price"],0,",","."); ?> VNĐ</p>
            </a>
        </div>
        <?php } ?>
        <div style="clear:left;"></div>
        <ul class="pagination modal-1">
            <?php for($i=1;$i<=$totalPage;$i++) { ?>
            <li><a href="index.php?page=category&id=<?php echo $cat_id; ?>&trang=<?php echo $i; ?>"><?php echo $i; ?></a></li>
            <?php } ?>
        </ul>
        <div style="clear:both;"></div>
        <?php } ?>
    </div>                 
</div>