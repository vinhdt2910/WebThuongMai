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
		 		'Nhaphathanh',
		 		'Chietkhau',
 				'Thoigianck'
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
		 		'Nhaphathanh',
		 		'Chietkhau',
 				'Thoigianck'
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
	<div style="width: 60%; margin: auto">
		<form action="" method="post" enctype="multipart/form-data">
			<div style="background: #547C96; color: #FFF; border-bottom: 1px solid #8EAEC3; padding: 5px; font-size: 14px; font-weight: bold;">Sửa sản phẩm</div>
			<div style="background: #FCFCFC; border: 1px solid #8EAEC3; padding: 10px; height: auto; margin-bottom: 30px">
			<table cellpadding="0" cellspacing="0" border="0" class="tbl_insert">
			
				<tr>
					<th><label for="category">Danh mục sách *</label></th>
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
					<th><label for="name">Tên sách: *</label></th>
					<td>
						<?php echo $objValid->validate('Tensach'); ?>
						<input type="text" name="Tensach" id="Tensach" 
							value="<?php echo $objForm->stickyText('Tensach', $product['Tensach']); ?>" class="fld" />
					</td>
				</tr>

				<tr>
					<th><label for="page">Số trang: *</label></th>
					<td>
						<?php echo $objValid->validate('Sotrang'); ?>
						<input type="text" name="Sotrang" id="Sotrang" 
							value="<?php echo $objForm->stickyText('Sotrang', $product['Sotrang']); ?>" class="fld" />
					</td>
				</tr>

				<tr>
					<th><label for="quatity">Số lượng sách: *</label></th>
					<td>
						<?php echo $objValid->validate('Soluong'); ?>
						<input type="text" name="Soluong" id="Soluong" 
							value="<?php echo $objForm->stickyText('Soluong', $product['Soluong']); ?>" class="fld" />
					</td>
				</tr>

				<tr>
					<th><label for="date">Ngày xuất bản: *</label></th>
					<td>
						<?php echo $objValid->validate('Ngayxuatban'); ?>
						<input type="date" name="Ngayxuatban" id="Ngayxuatban" 
							value="<?php echo $objForm->stickyText('Ngayxuatban', $product['Ngayxuatban']); ?>" class="fld" />
					</td>
				</tr>
				
				<tr>
					<th><label for="description">Mô tả: *</label></th>
					<td>
						<?php echo $objValid->validate('Mota'); ?>
						<textarea name="Mota" id="Mota" cols="" rows=""
							class="tar_fixed"><?php echo $objForm->stickyText('Mota', $product['Mota']); ?></textarea>
					</td>
				</tr>
				
				<tr>
					<th><label for="price">Giá: *</label></th>
					<td>
						<?php echo $objValid->validate('Gia'); ?>
						<input type="text" name="Gia" id="Gia" 
							value="<?php echo $objForm->stickyText('Gia', $product['Gia']); ?>" class="fld_price" />
					</td>
				</tr>

				<tr>
					<th><label for="Chietkhau">Chiết khấu: *</label></th>
					<td>
						<?php echo $objValid->validate('Chietkhau'); ?>
						<input type="text" name="Chietkhau" id="Chietkhau" 
							value="<?php echo $objForm->stickyText('Chietkhau', $product['Chietkhau']); ?>" class="fld" />
					</td>
				</tr>

				<tr>
					<th><label for="Thoigianck">Thời gian chiết khấu: *</label></th>
					<td>
						<?php echo $objValid->validate('Thoigianck'); ?>
						<input type="date" name="Thoigianck" id="Thoigianck" 
							value="<?php echo $objForm->stickyText('Thoigianck', $product['Thoigianck']); ?>" class="fld" />
					</td>
				</tr>

				<tr>
					<td>
						<input type="hidden" name="Trangthai" id="Trangthai" 
							value="1"/>
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


<script>
  var loadImage = function(event) {
    var preview = document.getElementById('preview');
	preview.src = URL.createObjectURL(event.target.files[0]);
  };
</script>

<?php 
		require_once('template/_footer.php'); 
	}
}
?>