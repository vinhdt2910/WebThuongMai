<?php 
$id = Url::getParam('id');

if (!empty($id)) {
	
	$objCatalogue = new Catalogue();
	$category = $objCatalogue->getCategory($id);
	
	if (!empty($category)) {
	
		$objForm = new Form();
		$objValid = new Validation($objForm);
			
		if ($objForm->isPost('name')) {
			
			$objValid->_expected = array('name');			
			$objValid->_required = array('name');
			
			$name = $objForm->getPost('name');
			
			if ($objCatalogue->duplicateCategory($name, $id)) {
				$objValid->add2Errors('name_duplicate');
			}
			
			if ($objValid->isValid()) {
				
				if ($objCatalogue->updateCategory($name, $id)) {
					Helper::redirect('/admin'.Url::getCurrentUrl(array('action', 'id')).'&action=edited');
				} else {
					Helper::redirect('/admin'.Url::getCurrentUrl(array('action', 'id')).'&action=edited-failed');
				}
				
			}
			
		}
		
		require_once('template/_header.php'); 
?>
	
<div style="width: 60%; margin: auto">
	<form action="" method="post">
		<div style="background: #547C96; color: #FFF; border-bottom: 1px solid #8EAEC3; padding: 5px; font-size: 14px; font-weight: bold;">Chỉnh sửa danh mục sách</div>
		<div style="background: #FCFCFC; border: 1px solid #8EAEC3; padding: 10px; height: auto; margin-bottom: 30px">
			<table cellpadding="0" cellspacing="0" border="0" class="tbl_insert">
			
				<tr>
					<th><label for="name">Tên danh mục sách: *</label></th>
					<td>
						<?php 
							echo $objValid->validate('name'); 
							echo $objValid->validate('name_duplicate');
						?>
						<input type="text" name="name" id="name" 
							value="<?php echo $objForm->stickyText('name', $category['Tenloai']); ?>" class="fld" />
					</td>
				</tr>
				
				<tr>
					<th>&nbsp;</th>
					<td>
						<label for="btn" class="sbm sbm_blue fl_l">
							<input type="submit" id="btn" class="btn" value="Cập nhật" />
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