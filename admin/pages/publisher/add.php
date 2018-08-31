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

<h1>Thêm mới nhà phát hành</h1>

<form action="" method="post">
	
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
					<input type="submit" id="btn" class="btn" value="Add" />
				</label>
			</td>
		</tr>
		
		
	</table>
	
</form>

<?php require_once('template/_footer.php'); ?>



