<?php 
$objForm = new Form();
$objValid = new Validation($objForm);
$objReport = new Report();

$objValid->_expected = array('fromDate', 'toDate');	
$objValid->_required = array('fromDate', 'toDate');

if ($objForm->isPost('fromDate')) {
	$fromDate = $objForm->getPost('fromDate');
	$toDate = $objForm->getPost('toDate');
	if ($objValid->isValid()) {
		$revenue = $objReport->revenueByDate($fromDate, $toDate);
		$numberOfOrderConfirm = $objReport->numberOfOrderConfirm($fromDate, $toDate);
		$numberOfOrderCancel = $objReport->numberOfOrderCancel($fromDate, $toDate);
		$numberOfOrderProcess = $objReport->numberOfOrderProcess($fromDate, $toDate);
		$numberOfClient = $objReport->numberOfClient($fromDate, $toDate);
	}
	else {
		$revenue['Doanhthu'] = 0;
		$numberOfOrderConfirm['numberOfOrder'] = 0;
		$numberOfOrderCancel['numberOfOrder'] = 0;
		$numberOfOrderProcess['numberOfOrder'] = 0;
		$numberOfClient['numberOfClient'] = 0;
	}
}
else {
	$revenue['Doanhthu'] = 0;
	$numberOfOrderConfirm['numberOfOrder'] = 0;
	$numberOfOrderCancel['numberOfOrder'] = 0;
	$numberOfOrderProcess['numberOfOrder'] = 0;
	$numberOfClient['numberOfClient'] = 0;
}


require_once('template/_header.php'); 
?>
<div class="box" style="margin: 10px;">
	<div class="left"></div>
  	<div class="right"></div>
	<div class="heading">
	    <h1 style="background-image: url('/images/home.png');">Báo cáo/Thống kê</h1>
	</div>
	<div class="content">
		<form action="" method="post">
			<div style="float: left; width: 49%;">
				<div style="background: #547C96; color: #FFF; border-bottom: 1px solid #8EAEC3; padding: 5px; font-size: 14px; font-weight: bold;">Chọn ngày xem báo cáo</div>
				<div style="background: #FCFCFC; border: 1px solid #8EAEC3; padding: 10px; height: 180px;">
					<table cellpadding="0" cellspacing="0" border="0" class="tbl_insert" style="margin-left: 20px !important; float: left;">
						<tr>
							<td><label>Từ ngày: </label></td>
							<td><input type="date" name="fromDate" id="fromDate" value="<?php echo $fromDate; ?>" class="fld"></td>
							<td>
								<?php 
									echo $objValid->validate('fromDate'); 
								?>
							</td>
						</tr>
								
						<tr>
							<td><label>Đến ngày: </label></td>
							<td><input type="date" name="toDate" id="toDate" value="<?php echo $toDate; ?>" class ="fld"></td>
							<td>
								<?php 
									echo $objValid->validate('toDate'); 
								?>
							</td>
						</tr>
						
						<tr>
							<td>
								<label for="btn" class="sbm sbm_blue fl_l">
									<input type="submit" id="btn" class="btn" value="Xem" />
								</label>
							</td>
						</tr>
					</table>
				</div>
			</div>
			
			<div style="float: right; width: 49%;">
				<div style="background: #547C96; color: #FFF; border-bottom: 1px solid #8EAEC3; padding: 5px; font-size: 14px; font-weight: bold;">Kết quả bán hàng</div>
				<div style="background: #FCFCFC; border: 1px solid #8EAEC3; padding: 10px; height: 180px;">
					<table cellpadding="0" cellspacing="0" border="0" class="tbl_insert" style="margin-left: 20px !important; float: left;">
						<tr>
							<td><label> Doanh thu bán hàng: </label></td>
							<td><?php echo number_format($revenue['Doanhthu'], 0); ?> đ</td>
						</tr>

						<tr>
							<td><label> Tổng số đơn hàng được duyệt: </label></td>
							<td><?php echo $numberOfOrderConfirm['numberOfOrder']; ?></td>
						</tr>

						<tr>
							<td><label> Tổng số đơn hàng chờ xử lý: </label></td>
							<td><?php echo $numberOfOrderProcess['numberOfOrder']; ?></td>
						</tr>

						<tr>
							<td><label> Tổng số đơn hàng hủy: </label></td>
							<td><?php echo $numberOfOrderCancel['numberOfOrder']; ?></td>
						</tr>

						<tr>
							<td><label> Tổng số khách hàng: </label></td>
							<td><?php echo $numberOfClient['numberOfClient']; ?></td>
						</tr>
					</table>
				</div>
			</div>
			
			
		<?php require_once('template/_footer.php'); ?>
		</form>
	</div>

</div>



