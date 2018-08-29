<?php
$id = Url::getParam('id');
if (!empty($id)) {
	
	$objOrder = new Order();
	$order = $objOrder->getOrder($id);
	
	if (!empty($order)) {
		
		$items = $objOrder->getOrderItems($id);
		
		$objCatalogue = new Catalogue();
		
		$objUser = new User();
		$user = $objUser->getUser($order['Makh']);
		
		$objCountry = new Country();
		
		$objBusiness = new Business();
		$business = $objBusiness->getBusiness();
		
		$objBasket = new Basket();
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Invoice</title>
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta http-equiv="imagetoolbar" content="no" />
<link href="/css/invoice.css" rel="stylesheet" type="text/css" />
</head>
<body>

<div id="wrapper">
	
	<h1>Hóa đơn</h1>
	
	<div style="width:50%;float:left">		
		<p><strong>To:</strong>
		<?php echo $user['Hoten']; ?><br />
		<?php echo $user['Diachi']; ?><br />
		<?php echo $user['Email']; ?><br />
		<?php echo $user['Sodt']; ?><br />
		</p>		
	</div>
	<div style="width:50%;float:right;text-align:right;">
		<p><strong><?php echo $business['name']; ?></strong><br />
		<?php echo nl2br($business['address']); ?><br />
		<?php echo $business['telephone']; ?><br />
		<?php echo $business['email']; ?><br />
		<?php echo $business['website']; ?>
		</p>
	</div>
	
	<div class="dev">&#160;</div>
	
	<h3>Mã hóa đơn: <?php echo $id; ?></h3>
	
	<table cellpadding="0" cellspacing="0" border="0" class="tbl_repeat">
		
		<tr>
			<th>Sản phẩm</th>
			<th class="ta_r">Số lượng</th>
			<th class="ta_r col_15">Đơn giá</th>
		</tr>
		
		<?php foreach($items as $item) { ?>
		
			<tr>
				<td>
					<?php
						$product = $objCatalogue->getProduct($item['Masach']);
						echo $product['Tensach'];
					?>
				</td>
				<td class="ta_r"><?php echo $item['Soluong']; ?></td>
				<td class="ta_r">
					&pound;<?php echo number_format($objBasket->itemTotal($item['Soluong'], $item['Giamua']), 2); ?>
				</td>
			</tr>
		
		<?php } ?>
		
	</table>
	
	<div class="dev br_td">&nbps;</div>
	
	<p><a href="#" onclick="window.print(); return false;">Print this invoice</a></p>
	
</div>

</body>
</html>

<?php } } ?>