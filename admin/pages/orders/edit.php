<?php 
$id = Url::getParam('id');

if (!empty($id)) {
	
	$objOrder = new Order();
	$order = $objOrder->getOrder($id);
	
	if (!empty($order)) {
	
		$objForm = new Form();
		$objValid = new Validation($objForm);
				
		$objUser = new User();
		$user = $objUser->getUser($order['Makh']);
		
		$objCountry = new Country();
		
		$objCatalogue = new Catalogue();
		
		$items = $objOrder->getOrderItems($id);	
		
		
			
			
		if ($objForm->isPost('status')) {
			
			$objValid->_expected = array('status', 'notes');
			$objValid->_required = array('status');
			
			$vars = $objForm->getPostArray($objValid->_expected);
			
			if ($objValid->isValid()) {
				
				if ($objOrder->updateOrder($id, $vars)) {				
					Helper::redirect('/admin'.Url::getCurrentUrl(array('action', 'id')).'&action=edited');					
				} else {
					Helper::redirect('/admin'.Url::getCurrentUrl(array('action', 'id')).'&action=edited-failed');
				}
				
			}
			
		}
		
		require_once('template/_header.php'); 
?>
	
	<h1>Hiển thị chi tiết hóa đơn</h1>
	
	<form action="" method="post">
		
		<table cellpadding="0" cellspacing="0" border="0" class="tbl_insert">
			
			<tr>
				<th>Ngày lập hóa đơn:</th>
				<td colspan="4"><?php echo $order['Ngaydat']; ?></td>
			</tr>
			
			<tr>
				<th>Mã hóa đơn:</th>
				<td colspan="4"><?php echo $order['Mahd']; ?></td></td>
			</tr>
			
			<?php if (!empty($items)) { ?>
			
				<tr>
					<th rowspan="<?php echo count($items) + 1; ?>">Chi tiết hóa đơn:</th>
					<td class="col_5">Mã sản phẩm</td>
					<td>Tên sách</td>
					<td class="col_5 ta_r">Số lượng</td>
					<td class="col_15 ta_r">Số tiền</td>
				</tr>
				
				<?php 
					foreach($items as $item) { 
						$product = $objCatalogue->getProduct($item['Masach']);
				?>
				
					<tr>
						<td><?php echo $product['Masach']; ?></td>
						<td><?php echo Helper::encodeHtml($product['Tensach']); ?></td>
						<td class="ta_r"><?php echo $item['Soluong']; ?></td>
						<td class="ta_r">&pound;<?php echo number_format(($item['Giamua'] * $item['Soluong']), 2); ?></td>						
					</tr>
				
				<?php } ?>
			
			<?php } ?>
			

			
			
			<tr>				
				<th>Khách hàng:</th>

				<td colspan="4">
					<?php
						echo Helper::encodeHtml($user['Hoten']).'<br />';
						echo Helper::encodeHtml($user['Diachi']).'<br />';
						echo $user['Email'];
						echo $user['Sodt'];
						echo '</a>';
					?>
				</td>				
			</tr>
			

			<tr>
				<th><label for="status">Trạng thái hóa đơn:</label></th>
				<td colspan="4">
					<?php  echo $order['Tinhtrang']; ?>
				</td>
			</tr>
	
			
			<tr>
				<th>&nbsp;</th>
				<td colspan="4">
				
					<div class="sbm sbm_blue fl_r">
						<a href="<?php echo '/admin'.Url::getCurrentUrl(array('action')).'&action=invoice'; ?>" class="btn" target="_blank">Invoice</a>
					</div>
					
					<div class="sbm sbm_blue fl_l mr_r4">
						<a href="<?php echo '/admin'.Url::getCurrentUrl(array('action', 'id')); ?>" class="btn">Go back</a>
					</div>
					
					<label for="btn_update" class="sbm sbm_blue fl_l">
						<input type="submit" id="btn_update" class="btn" value="Update" />
					</label>
					
				</td>
			</tr>
			
		</table>
		
	</form>

<?php 
		require_once('template/_footer.php'); 
	}
}
?>



