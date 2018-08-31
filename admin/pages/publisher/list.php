<?php 
$objCatalogue = new Catalogue();
$publishers = $objCatalogue->getPublishers();

$objPaging = new Paging($publishers, 10);
$rows = $objPaging->getRecords();

$objPaging->_url = '/admin'.$objPaging->_url;

require_once('template/_header.php'); 
?>
<p><a href="/admin/?page=publisher&amp;action=add">Thêm mới nhà phát hành sách</a></p>

<?php if (!empty($rows)) { ?>
<div class="box" style="margin: 10px;">
	<div class="left"></div>
  	<div class="right"></div>
  	<div class="heading">
	    <h1 style="background-image: url('/images/category.png');">Danh sách nhà phát hành</h1>
	</div>
	<div class="content">
		<table cellpadding="0" cellspacing="0" border="0" class="tbl_repeat list">
			<thead>
				<tr>
					<th>Tên nhà phát hành</th>
					<th class="col_15 ta_r">Xóa</th>
					<th class="col_5 ta_r">sửa</th>
				</tr>
			</thead>
				
				<?php foreach($rows as $category) { ?>
				
				<tr>
					<td><?php echo Helper::encodeHtml($category['Tennhaphathanh']); ?></td>
					<td class="ta_r">
						<a href="/admin/?page=publisher&amp;action=remove&amp;id=<?php echo $category['Manhaphathanh']; ?>">Xóa</a>
					</td>
					<td class="ta_r">
						<a href="/admin/?page=publisher&amp;action=edit&amp;id=<?php echo $category['Manhaphathanh']; ?>">Sửa</a>
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





