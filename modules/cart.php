<?php
    if (!isset($_SESSION["cart"])) {
        $_SESSION["cart"] = array();
    }
    $error = false;
    $success = false;
    if(isset($_GET["action"])){
        function update_cart($add = false) {
            foreach ($_POST['quantity'] as $id => $quantity) {
                if($quantity == 0){
                    unset($_SESSION["cart"][$id]); 
                }else{
                    if($add){
                        $_SESSION["cart"][$id] += $quantity;
                    }else{
                        $_SESSION["cart"][$id] = $quantity;
                    }
                } 
            }
        }

        switch($_GET["action"]){
            case "add":
                update_cart(true);
                header("location:index.php?page=cart");
                break;  
            case "delete" :
                if(isset($_GET["id"])){
                    unset($_SESSION["cart"][$_GET["id"]]);
                }
                header("location:index.php?page=cart");
                break;
            case "submit" :
                if(isset($_POST["update-click"])){
                    update_cart();
                }elseif(isset($_POST["order-click"])){
                    if(empty($_POST["name"])){
                        $error = "Bạn chưa nhập tên người nhận !!";
                    }elseif(empty($_POST["phone"])){
                        $error = "Bạn chưa nhập số điện thoại !!";
                    }elseif(empty($_POST["address"])){
                        $error = "Bạn chưa nhập địa chỉ !!";
                    }elseif(empty($_POST["quantity"])){
                        $error = "Giỏ hàng rỗng !!";
                    }
                    if($error == false && !empty($_POST["quantity"])){
                        $date_create = date("Y-m-d H:i:s");
                        $sqlCart = "SELECT * FROM `product` WHERE `id` IN (".implode(",", array_keys($_POST["quantity"])).")";
                        $resultCart = mysqli_query($conn,$sqlCart);
                        $total = 0;
                        $orderPro = array();
                        while ($rowCart = mysqli_fetch_array($resultCart)) { 
                            $orderPro[] = $rowCart;
                             $total += $rowCart["price"] * $_POST["quantity"][$rowCart["id"]];
                        }
                        $sqlOrder = "INSERT INTO `orders` (`id`, `name`, `phone`, `address`, `note`, `total`, `date_create`)
                        VALUES (NULL, '".$_POST["name"]."', '".$_POST["phone"]."', '".$_POST["address"]."', '".$_POST["note"]."', '".$total."', '".$date_create."');";
                        $resultOrder = mysqli_query($conn,$sqlOrder);
                        $oderID = $conn->insert_id;
                        $string = "";
                        foreach($orderPro as $key => $resultCart){
                            $string .= "(NULL, '".$oderID."', '".$resultCart["id"]."', '".$_POST["quantity"][$resultCart["id"]]."', '".$resultCart["price"]."', '".$date_create."')";
                            
                            if($key != count($orderPro) - 1){
                                $string .= ",";
                            }
                        }
                        $sqlOrderDetail="INSERT INTO `order_detail` (`id`, `order_id`, `product_id`, `quantity`, `price`, `date_create`) VALUES ".$string.";";
                        $resultOrderDetail = mysqli_query($conn,$sqlOrderDetail);
                        $success = "Đặt hàng thành công";
                        unset($_SESSION["cart"]);
                        
                    }
                }
                break;
        }
    }
    if (!empty($_SESSION["cart"])) {
        $sqlCart = "SELECT * FROM `product` WHERE `id` IN (".implode(",", array_keys($_SESSION["cart"])).")";
        $resultCart = mysqli_query($conn,$sqlCart);
    }
?>
<div class="category-oder">
    <?php if(!empty($error)) { ?>
        <div style="margin-top:50px;" id="notify-msg"><?php echo $error ?>. <a href="javascript:history.back()">Quay lại</a></div>
    <?php } elseif (!empty($success)) {?>
        <div style="margin-top:50px;" id="notify-msg"><?php echo $success ?>. <a href="index.php">Tiếp tục mua hàng</a></div>
    <?php } else { ?>
        <form id="cart-form" action="index.php?page=cart&action=submit" method="post">
            <table>
                <thead>
                    <tr>
                        <th class="product-number">STT</th>
                        <th class="product-name">Tên sản phẩm</th>
                        <th class="product-img">Ảnh sản phẩm</th>
                        <th class="product-price">Đơn giá</th>
                        <th class="product-quantity">Số lượng</th>
                        <th class="total-money">Thành tiền</th>
                        <th class="product-delete">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if(!empty($resultCart)){
                        $total = 0;
                        $num = 0;
                        while ($row = mysqli_fetch_array($resultCart)) { 
                            $num++; 
                    ?>
                    <tr>
                        <td class="product-number"><?php echo $num ; ?></td>
                        <td class="product-name"><?php echo $row["name"]; ?></td>
                        <td class="product-img"><img src="<?php echo $row["image"] ?>" alt="" width="80" style="margin:5px;"></td>
                        <td class="product-price"><?php echo number_format($row["price"],0,",","."); ?></td>
                        <td class="product-quantity"><div class="quantity-input"><input type="text" value="<?php echo $_SESSION["cart"][$row["id"]]; ?>" name="quantity[<?php echo $row["id"]; ?>]" /></div></td>
                        <td class="total-money"><?php echo number_format($row["price"] * $_SESSION["cart"][$row["id"]],0,",","."); ?></td>
                        <td class="product-delete"><a style="color:#000;text-decoration:none;" href="index.php?page=cart&action=delete&id=<?php echo $row["id"]; ?>">Xóa</a></td>
                    </tr>
                    <?php
                        $total += $row["price"] * $_SESSION["cart"][$row["id"]];
                        }
                    ?>
                        <tr>
                            <th>&nbsp</th>
                            <td>Tổng tiền</td>
                            <td>&nbsp</td>
                            <td>&nbsp</td>
                            <td>&nbsp</td>
                            <td><?php echo number_format($total,0,",","."); ?></td>
                            <td>&nbsp</td>
                        </tr>
                    <?php    
                    } 
                    ?>
                    
                </tbody>
            </table>
            <div class="button_cart">
                <input type="submit" name="update-click" value="Cập nhật"/>
            </div>
            <div style="clear:right;"></div>
            <hr>
            <div><label>Người nhận : </label><input type="text" value="" name="name"></div>
            <div><label>Điện thoại : </label><input type="text" value="" name="phone"></div>
            <div><label>Địa chỉ : </label><input type="text" value="" name="address"></div>
            <div><label>Ghi chú : </label><textarea name="note" cols="50" rows="7"></textarea></div>
            <input style="margin-top:30px;" type="submit" name="order-click" value="Đặt hàng">
        </form>
    <?php } ?>
</div>
