<?php 
$objForm = new Form();
$objValid = new Validation($objForm);

if ($objForm->isPost('Tennhaphathanh')) {
	
	$objValid->_expected = array('Tennhaphathanh');	
	$objValid->_required = array('Tennhaphathanh');
	
	$objCatalogue = new Catalogue();
	
	$Tennhaphathanh = $objForm->getPost('Tennhaphathanh');
	
	if ($objCatalogue->duplicatePublisher($Tennhaphathanh)) {
		$objValid->add2Errors('name_duplicate');
	}
	
	if ($objValid->isValid()) {
		
		if ($objCatalogue->addPublisher($Tennhaphathanh)) {
		
			Helper::redirect('/admin'.Url::getCurrentUrl(array('action', 'id')).'&action=added');
			
		} else {
			Helper::redirect('/admin'.Url::getCurrentUrl(array('action', 'id')).'&action=added-failed');
		}
		
	}
	
}

require_once('template/_header.php'); 
?>

<div style="width: 60%; margin: auto">
	<form action="" method="post">
		<div style="background: #547C96; color: #FFF; border-bottom: 1px solid #8EAEC3; padding: 5px; font-size: 14px; font-weight: bold;">Thêm mới nhà phát hành</div>
		<div style="background: #FCFCFC; border: 1px solid #8EAEC3; padding: 10px; height: auto; margin-bottom: 30px">
			<table cellpadding="0" cellspacing="0" border="0" class="tbl_insert">
				<tr>
					<th><label for="name">Tên nhà phát hành: *</label></th>
					<td>
						<?php 
							echo $objValid->validate('Tennhaphathanh'); 
							echo $objValid->validate('name_duplicate'); 
						?>
						<input type="text" name="Tennhaphathanh" id="Tennhaphathanh" 
							value="<?php echo $objForm->stickyText('Tennhaphathanh'); ?>" 
							class="fld" />
					</td>
				</tr>
						
				<tr>
					<th>&nbsp;</th>
					<td>
						<label for="btn" class="sbm sbm_blue fl_l">
							<input type="submit" id="btn" class="btn" value="Thêm" />
						</label>
					</td>
				</tr>
			</table>
		</div>
	</form>
</div>


<?php require_once('template/_footer.php'); ?>



