<?php 
$id = Url::getParam('id');

if (!empty($id)) {
	
	$objCatalogue = new Catalogue();
	$product = $objCatalogue->getProduct($id);
	
	if (!empty($product)) {
	
		$objForm = new Form();
		$objValid = new Validation($objForm);
		$categories = $objCatalogue->getCategories();
		$publishers = $objCatalogue->getPublishers();

		if ($objForm->isPost('Tensach')) {
			
			$objValid->_expected = array(
		 		'Loaisach',    
		 		'Tensach',   
		 		'Gia',               
		 		'Sotrang',     
		 		'Ngayxuatban', 
		 		'Mota',        
		 		'Soluong',     
		 		'Trangthai',   
		 		'Nhaphathanh'
			);
			
			$objValid->_required = array(
		 		'Loaisach',    
		 		'Tensach',   
		 		'Gia',               
		 		'Sotrang',     
		 		'Ngayxuatban', 
		 		'Mota',        
		 		'Soluong',     
		 		'Trangthai',   
		 		'Nhaphathanh'
			);
			
			if ($objValid->isValid()) {
				
				if ($objCatalogue->updateProduct($objValid->_post, $id)) {
				
					$objUpload = new Upload();
					
					if ($objUpload->upload(CATALOGUE_PATH)) {
					
						if (is_file(CATALOGUE_PATH.DS.$product['anh'])) {
							unlink(CATALOGUE_PATH.DS.$product['anh']);
						}
					
						$objCatalogue->updateProduct(array('anh' => $objUpload->_names[0]), $id);
						Helper::redirect('/admin'.Url::getCurrentUrl(array('action', 'id')).'&action=edited');
					} else {
						Helper::redirect('/admin'.Url::getCurrentUrl(array('action', 'id')).'&action=edited-no-upload');
					}
					
				} else {
					Helper::redirect('/admin'.Url::getCurrentUrl(array('action', 'id')).'&action=edited-failed');
				}
				
			}
			
		}
		
		require_once('template/_header.php'); 
?>
	
	<h1>Chỉnh sửa sản phẩm</h1>
	
	<form action="" method="post" enctype="multipart/form-data">
		
		<table cellpadding="0" cellspacing="0" border="0" class="tbl_insert">
			
			<tr>
				<th><label for="category">Category: *</label></th>
				<td>
					<?php echo $objValid->validate('Loaisach'); ?>
					<select name="Loaisach" id="Loaisach" class="sel">
						<option value="">Select one&hellip;</option>
						<?php if (!empty($categories)) { ?>
							<?php foreach($categories as $cat) { ?>
							<option value="<?php echo $cat['Maloaisach']; ?>"
							<?php echo $objForm->stickySelect('Loaisach', $cat['Maloaisach'], $product['Loaisach']); ?>>
							<?php echo Helper::encodeHtml($cat['Tenloai']); ?>
							</option>
							<?php } ?>
						<?php } ?>
					</select>
				</td>
			</tr>
			
			<tr>
				<th><label for="name">Name: *</label></th>
				<td>
					<?php echo $objValid->validate('Tensach'); ?>
					<input type="text" name="Tensach" id="Tensach" 
						value="<?php echo $objForm->stickyText('Tensach', $product['Tensach']); ?>" class="fld" />
				</td>
			</tr>
			
			<tr>
				<th><label for="description">Description: *</label></th>
				<td>
					<?php echo $objValid->validate('Mota'); ?>
					<textarea name="Mota" id="Mota" cols="" rows=""
						class="tar_fixed"><?php echo $objForm->stickyText('Mota', $product['Mota']); ?></textarea>
				</td>
			</tr>
			
			<tr>
				<th><label for="price">Price: *</label></th>
				<td>
					<?php echo $objValid->validate('Gia'); ?>
					<input type="text" name="Gia" id="Gia" 
						value="<?php echo $objForm->stickyText('Gia', $product['Gia']); ?>" class="fld_price" />
				</td>
			</tr>

			<tr>
				<th><label for="publisher">Nhà phát hành: *</label></th>
				<td>
					<?php echo $objValid->validate('Nhaphathanh'); ?>
					<select name="Nhaphathanh" id="Nhaphathanh" class="sel">
						<option value="">Chọn một nhà phát hành&hellip;</option>
						<?php if (!empty($publishers)) { ?>
							<?php foreach($publishers as $cat) { ?>
							<option value="<?php echo $cat['Manhaphathanh']; ?>"
							<?php echo $objForm->stickySelect('Nhaphathanh', $cat['Manhaphathanh'], $product['Nhaphathanh']); ?>>
							<?php echo Helper::encodeHtml($cat['Tennhaphathanh']); ?>
							</option>
							<?php } ?>
						<?php } ?>
					</select>
				</td>
			</tr>
			
			<tr>
				<th><label for="image">Image:</label></th>
				<td>
					<?php echo $objValid->validate('anh'); ?>
					<input type="file" name="anh" id="anh" size="30" onchange="loadImage(event)"/>
				<img src="/image/<?php echo $product['anh'];?>" width="100" id="preview" alt="">
<script>
  var loadImage = function(event) {
    var preview = document.getElementById('preview');
	preview.src = URL.createObjectURL(event.target.files[0]);
  };
</script>
				</td>
			</tr>
			
			<tr>
				<th>&nbsp;</th>
				<td>
					<label for="btn" class="sbm sbm_blue fl_l">
						<input type="submit" id="btn" class="btn" value="Update" />
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