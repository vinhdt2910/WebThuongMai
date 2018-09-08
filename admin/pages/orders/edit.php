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
		
		
			
			
		if ($objForm->isPost('Tinhtrang')) {
			
			$objValid->_expected = array('Tinhtrang');
			$objValid->_required = array('Tinhtrang');
			
			$vars = $objForm->getPostArray($objValid->_expected);
			
			if ($objValid->isValid()) {
				
				if ($objOrder->updateOrder($id, $objValid->_post)) {				
					Helper::redirect('/admin'.Url::getCurrentUrl(array('action', 'id')).'&action=edited');					
				} else {
					Helper::redirect('/admin'.Url::getCurrentUrl(array('action', 'id')).'&action=edited-failed');
				}
				
			}
			
		}
		
		require_once('template/_header.php'); 
?>
	
	<div style="width: 80%; margin: auto">
		<form action="" method="post">
			<div style="background: #547C96; color: #FFF; border-bottom: 1px solid #8EAEC3; padding: 5px; font-size: 14px; font-weight: bold;">Hiển thị chi tiết hóa đơn</div>
			<div style="background: #FCFCFC; border: 1px solid #8EAEC3; padding: 10px; height: auto; margin-bottom: 30px">
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
								<td class="ta_r"><?php echo number_format(($item['Giamua'] * $item['Soluong']), 2); ?> đ</td>						
							</tr>
						
						<?php } ?>
					
					<?php } ?>

					<tr>
						<td></td>
						<td></td>
						<td class="ta_r">Tổng tiền:</td>
						<td></td>
						<td class="ta_r"><?php echo number_format($objOrder->SumMoneyOrder($id)['Tongtien'], 2); ?> Đồng</td>						
					</tr>

					
					
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
						<td>
								<select name="Tinhtrang" id="Tinhtrang" class="sel">
									<option value="<?php  echo $order['Tinhtrang']; ?>"><?php  echo $order['Tinhtrang']; ?></option>
									<option value="Chờ xử lý">Chờ xử lý</option>
									<option value="Hủy">Hủy</option>
									<option value="Đang xử lý">Đang xử lý</option>
								</select>
						</td>
					</tr>
			
					
					<tr>
						<th>&nbsp;</th>
						<td colspan="4">
						
							<div class="sbm sbm_blue fl_r">
								<a href="<?php echo '/admin'.Url::getCurrentUrl(array('action')).'&action=invoice'; ?>" class="btn" target="_blank">In hóa đơn</a>
							</div>
							
							<div class="sbm sbm_blue fl_l mr_r4">
								<a href="<?php echo '/admin'.Url::getCurrentUrl(array('action', 'id')); ?>" class="btn">Quay lại</a>
							</div>
							
							<label for="btn_update" class="sbm sbm_blue fl_l">
								<input type="submit" id="btn_update" class="btn" value="Cập nhật" />
							</label>
							
						</td>
					</tr>
				
				</table>
			</div>
		</form>
	</div>
<?php 
		require_once('template/_footer.php'); 
	}
}
?>



