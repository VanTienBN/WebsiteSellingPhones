
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Danh sách đơn hàng</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<?php
			$orders= mysqli_query($conn, "SELECT orders.name, orders.address, orders.phone, orders.note, order_detail.*, product.name as product_name
			FROM orders
			INNER JOIN order_detail ON orders.id=order_detail.order_id
			INNER JOIN product ON product.id=order_detail.product_id
			WHERE orders.id=". $_GET['id']);
			 $orders=mysqli_fetch_all($orders,MYSQLI_ASSOC);
	?>
	    <div id="order-detail-wrapper">
    		<div id="order-detail">
    		<h1>Chi Tiết Đơn Hàng</h1>
	    		<label>Tên người nhận: </label><span><?= $orders[0]['name']?></span><br/>
	    		<label>Địa chỉ: </label><span><?= $orders[0]['address']?></span><br/>
	    		<label>SĐT: </label><span><?= $orders[0]['phone']?></span><br/>
	    		<hr/>
	    		<h3>Danh sách sản phẩm</h3>
	    		<ul>
	    			<?php
	    				$totalQuantity=0;
	    				$totalMoney=0;
	    				foreach($orders as $row){
	    					?>
	    					<li>
	    						<span class="item-name"><?= $row['product_name']?></span>
	    						<span class="item-quantity"> - SL:<?= $row['quantity']?> sản phẩm</span>
	    					</li>
	    					<?php
	    					$totalMoney += ($row['price'] * $row['quantity']);
	    					$totalQuantity += $row['quantity'];
	    				}
	    			?>
	    		</ul>
	    		<hr/>
	    		<label>Tổng SL:</label> <?= $totalQuantity?>-<label>Tổng tiền:</label> <?= number_format($totalMoney,0,",",".") ?>.đ
	    	</div>
	    	</div>
</body>
</html>
