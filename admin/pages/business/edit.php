<?php 
$objBusiness = new Business();
$business = $objBusiness->getBusiness();

if (!empty($business)) {

	$objForm = new Form();
	$objValid = new Validation($objForm);
	
	if ($objForm->isPost('name')) {
	
		$objValid->_expected = array(
			'name',
			'address',
			'telephone',
			'email',
			'website',
			'vat_rate'
		);
		
		$objValid->_required = array(
			'name',
			'address',
			'telephone',
			'email',
			'vat_rate'
		);
		
		$objValid->_special = array(
			'email' => 'email'
		);
		
		$vars = $objForm->getPostArray($objValid->_expected);
		
		if ($objValid->isValid()) {
			if ($objBusiness->updateBusiness($vars)) {
				Helper::redirect('/admin'.Url::getCurrentUrl(array('action', 'id')).'&action=edited');
			} else {
				Helper::redirect('/admin'.Url::getCurrentUrl(array('action', 'id')).'&action=edited-failed');
			}
		}
		
	}
		
	require_once('template/_header.php'); 
?>
	
<div  style="width: 60%; margin: auto">
	<form action="" method="post">
		<div style="background: #547C96; color: #FFF; border-bottom: 1px solid #8EAEC3; padding: 5px; font-size: 14px; font-weight: bold;">Thông tin về doanh nghiệp</div>
		<div style="background: #FCFCFC; border: 1px solid #8EAEC3; padding: 10px; height: auto; margin-bottom: 30px">
			<table cellpadding="0" cellspacing="0" border="0" class="tbl_insert">
				<tr>
					<th><label for="name">Tên doanh nghiệp: *</label></th>
					<td>
						<?php echo $objValid->validate('name'); ?>
						<input type="text" name="name"
							id="name" class="fld" 
							value="<?php echo $objForm->stickyText('name', $business['name']); ?>" />
					</td>
				</tr>
				
				<tr>
					<th><label for="address">Địa chỉ: *</label></th>
					<td>
						<?php echo $objValid->validate('address'); ?>
						<textarea name="address" id="address" class="tar" 
							cols="" rows=""><?php echo $objForm->stickyText('address', $business['address']); ?></textarea>
					</td>
				</tr>
				
				<tr>
					<th><label for="telephone">Số điện thoại: *</label></th>
					<td>
						<?php echo $objValid->validate('telephone'); ?>
						<input type="text" name="telephone"
							id="telephone" class="fld" 
							value="<?php echo $objForm->stickyText('telephone', $business['telephone']); ?>" />
					</td>
				</tr>
				
				<tr>
					<th><label for="email">Email: *</label></th>
					<td>
						<?php echo $objValid->validate('email'); ?>
						<input type="text" name="email"
							id="email" class="fld" 
							value="<?php echo $objForm->stickyText('email', $business['email']); ?>" />
					</td>
				</tr>
				
				<tr>
					<th><label for="website">Website:</label></th>
					<td>
						<?php echo $objValid->validate('website'); ?>
						<input type="text" name="website"
							id="website" class="fld" 
							value="<?php echo $objForm->stickyText('website', $business['website']); ?>" />
					</td>
				</tr>
				
				<tr>
					<th><label for="vat_rate">VAT Rate: *</label></th>
					<td>
						<?php echo $objValid->validate('vat_rate'); ?>
						<input type="text" name="vat_rate"
							id="vat_rate" class="fld" 
							value="<?php echo $objForm->stickyText('vat_rate', $business['vat_rate']); ?>" />
					</td>
				</tr>
				
				<tr>
					<th>&nbsp;</th>
					<td>
						<label for="btn" class="sbm sbm_blue fl_l">
						<input type="submit"
							id="btn" class="btn" value="Cập nhật" />
						</label>
					</td>
				</tr>
			</table>
		</div>
	</form>
</div>

<?php require_once('template/_footer.php'); } ?>