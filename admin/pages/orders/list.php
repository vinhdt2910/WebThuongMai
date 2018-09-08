<?php 
$objOrder = new Order();
$objUser = new User();

$srch = Url::getParam('srch');

if (!empty($srch)) {
	$orders = $objOrder->getOrders($srch);
	$empty = 'Không tìm được hóa đơn nào có mã hóa đơn như vậy!!!';
} else {
	$orders = $objOrder->getOrders();
	$empty = 'Hiện tại cơ sở dữ liệu không có bản ghi nào!!!';
}

$objPaging = new Paging($orders, 5);
$rows = $objPaging->getRecords();

$objPaging->_url = '/admin'.$objPaging->_url;

require_once('template/_header.php'); 
?>

<form action="" method="get">
	<?php echo Url::getParams4Search(array('srch', Paging::$_key)); ?>
	<center>
		<table cellpadding="0" cellspacing="0" border="0" class="tbl_insert">
	
			<tr>
				<th><label for="srch">Mã hóa đơn:</label></th>
				<td>
					<input type="text" name="srch" id="srch" 
						value="<?php echo stripslashes($srch); ?>" class="fld" />
				</td>
				<td>
					<label for="btn_add" class="sbm sbm_blue fl_l">
						<input type="submit" id="btn_add" class="btn" value="Search" />
					</label>
				</td>
			</tr>
	
		</table>
	</center>	
</form>

<?php if (!empty($rows)) { ?>

<div class="box" style="margin: 10px;">
	<div class="left"></div>
	<div class="right"></div>
	<div class="heading">
	    <h1 style="background-image: url('/images/user.png');">Hóa đơn bán hàng</h1>
	</div>
	<div class="content">
		<table cellpadding="0" cellspacing="0" border="0" class="tbl_repeat list">
			<thead>
				<tr>
					<th class="col_5">Mã</th>
					<th class = "col_15 ta_r">Tên khách hàng</th>
					<th>Ngày lập hóa đơn</th>
					<th class="col_15 ta_r">Tình trạng</th>
					<th class="col_15 ta_r">Xóa</th>
					<th class="col_5 ta_r">Hiển thị</th>
				</tr>
			</thead>
			
			<?php foreach($rows as $order) { ?>
			
			<tr>
				<td><?php echo $order['Mahd']; ?></td>
				<td><?php echo $objUser->getUser($order['Makh'])['Hoten']; ?></td>
				<td><?php echo $order['Ngaydat']; ?></td>
				<td><?php echo $order['Tinhtrang']; ?></td>

				<td class="ta_r">
				<?php if ($order['Tinhtrang'] == 'Hủy') { ?>
					<a href="/admin/?page=orders&amp;action=remove&amp;id=<?php echo $order['Mahd']; ?>">Xóa</a>
				<?php } else { ?>
					<span class="inactive">Xóa</span>
				<?php } ?>
				</td>	

				<td class="ta_r">
					<a href="/admin/?page=orders&amp;action=edit&amp;id=<?php echo $order['Mahd']; ?>">Hiển thị</a>
				</td>
			</tr>
			
			<?php } ?>
	
		</table>
	</div>
</div>

<?php echo $objPaging->getPaging(); ?>

<?php 
	} else {
		echo '<p>'.$empty.'</p>';
	} 
?>

<?php require_once('template/_footer.php'); ?>





