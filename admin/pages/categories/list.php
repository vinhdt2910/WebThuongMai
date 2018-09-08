<?php 
$objCatalogue = new Catalogue();
$categories = $objCatalogue->getCategories();

$objPaging = new Paging($categories, 10);
$rows = $objPaging->getRecords();

$objPaging->_url = '/admin'.$objPaging->_url;

require_once('template/_header.php'); 
?>
<p><a href="/admin/?page=categories&amp;action=add">Thêm mới danh mục sách</a></p>

<?php if (!empty($rows)) { ?>
<div class="box" style="margin: 10px;">
	<div class="left"></div>
  	<div class="right"></div>
  	<div class="heading">
	    <h1 style="background-image: url('/images/category.png');">Danh mục sản phẩm</h1>
	</div>
	<div class="content">
		<table cellpadding="0" cellspacing="0" border="0" class="tbl_repeat list">
			<thead>
				<tr>
					<th>Loại sách</th>
					<th class="col_15 ta_r">Xóa</th>
					<th class="col_5 ta_r">sửa</th>
				</tr>
			</thead>
				
				<?php foreach($rows as $category) { ?>
				
				<tr>
					<td><?php echo Helper::encodeHtml($category['Tenloai']); ?></td>
					<td class="ta_r">
						<?php if ($objCatalogue->getProducts($category['Maloaisach']) == null) { 
						?>
							<a href="/admin/?page=categories&amp;action=remove&amp;id=<?php echo $category['Maloaisach']; ?>">Xóa</a>
						<?php } else {?>
							<span class="inactive">Xóa</span>
						<?php } ?>
					</td>
					<td class="ta_r">
						<a href="/admin/?page=categories&amp;action=edit&amp;id=<?php echo $category['Maloaisach']; ?>">Sửa</a>
					</td>
				</tr>
				
				<?php } ?>
	
		</table>
	</div>
</div>


<?php echo $objPaging->getPaging(); ?>

<?php } else { ?>

	<p>There are currently no categories created.</p>

<?php } ?>

<?php require_once('template/_footer.php'); ?>





