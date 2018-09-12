<?php 
$objCatalogue = new Catalogue();

$srch = Url::getParam('srch');

if (!empty($srch)) {
	$products = $objCatalogue->getAllProducts($srch);
	$empty = 'There are no results matching your searching criteria.';
} else {
	$products = $objCatalogue->getAllProducts();
	$empty = 'There are currently no records.';
}

$objPaging = new Paging($products, 5);
$rows = $objPaging->getRecords();

$objPaging->_url = '/admin'.$objPaging->_url;

require_once('template/_header.php'); 
?>

<form action="" method="get">
<center>
		<?php echo Url::getParams4Search(array('srch', Paging::$_key)); ?>
	<table cellpadding="0" cellspacing="0" border="0" class="tbl_insert">
	
		<tr>
			<th><label for="srch">Sản phẩm:</label></th>
			<td>
				<input type="text" name="srch" id="srch" 
					value="<?php echo stripslashes($srch); ?>" class="fld" />
			</td>
			<td>
				<label for="btn_add" class="sbm sbm_blue fl_l">
					<input type="submit" id="btn_add" class="btn" value="Tìm kiếm" />
				</label>
			</td>
		</tr>
	
	</table>	
</center>

	
</form>

<p><a href="/admin/?page=products&amp;action=add">Thêm mới sách</a></p>

<?php if (!empty($rows)) { ?>


<div class="box" style="margin: 10px;">
	<div class="left"></div>
  	<div class="right"></div>
	<div class="heading">
	    <h1 style="background-image: url('/images/product.png');">Sản phẩm</h1>
	</div>

	<div class="content">
		<table cellpadding="0" cellspacing="0" border="0" class="tbl_repeat list">
			<thead>
				<tr>
					<th class="col_5">Id</th>
					<th>Ảnh</th>
					<th>Sản phẩm</th>
					<th>Ngày xuất bản</th>
					<th>Trạng thái</th>
					<th class="col_15 ta_r">Xóa</th>
					<th class="col_5 ta_r">Sửa</th>
				</tr>
			</thead>
			
			
			<?php foreach($rows as $product) { ?>
			
			<tr>
				<td><?php echo $product['Masach']; ?></td>
				<td><img src="/image/<?php echo $product['anh']; ?>" width="50"></td>

				<td><?php echo Helper::encodeHtml($product['Tensach']); ?></td>
				<td align="center"><?php echo $product['Ngayxuatban']; ?></td>

				<?php 
					if($product['Trangthai'] == 1){
				?>
					<td align="center">Hiển thị</td>
				<?php } else {?>
					<td align="center">Ẩn</td>
				<?php } ?>

				<td class="ta_r">
					<?php 
						if($product['Trangthai'] == 1){
					?>
						<a href="/admin/?page=products&amp;action=remove&amp;id=<?php echo $product['Masach']; ?>">Xóa</a>
					<?php } else { ?>
						<span class="inactive">Xóa</span>
					<?php } ?>
				</td>
				<td class="ta_r">
					<a href="/admin/?page=products&amp;action=edit&amp;id=<?php echo $product['Masach']; ?>">Sửa</a>
				</td>
			</tr>
			
			<?php } ?>
			
		</table>
	</div>
	<div>
	<div>
	<?php echo $objPaging->getPaging(); ?>
		<?php 
		} else {
			echo '<p>'.$empty.'</p>';
		} 
		?>
	</div>
	
</div>

<?php require_once('template/_footer.php'); ?>







