<?php 
$objUser = new User();
$objOrder = new Order();

$srch = Url::getParam('srch');

if (!empty($srch)) {
	$users = $objUser->getUsers($srch);
	$empty = 'There are no results matching your searching criteria.';
} else {
	$users = $objUser->getUsers();
	$empty = 'There are currently no records.';
}

$objPaging = new Paging($users, 5);
$rows = $objPaging->getRecords();

$objPaging->_url = '/admin'.$objPaging->_url;

require_once('template/_header.php'); 
?>

<form action="" method="get">
	<?php echo Url::getParams4Search(array('srch', Paging::$_key)); ?>
	<center>
			<table cellpadding="0" cellspacing="0" border="0" class="tbl_insert">
	
		<tr>
			<th><label for="srch">Tên khách hàng:</label></th>
			<td>
				<input type="text" name="srch" id="srch" 
					value="<?php echo stripslashes($srch); ?>" class="fld" />
			</td>
			<td>
				<label for="btn_add" class="sbm sbm_blue fl_l">
					<input type="submit" id="btn_add" class="btn" value="Search" />
				</label>
			</td>
		</tr>
	
	</table>
	</center>	
</form>

<?php if (!empty($rows)) { ?>

<div class="box" style="margin: 10px;">
	<div class="left"></div>
  	<div class="right"></div>
	<div class="heading">
	    <h1 style="background-image: url('/images/user.png');">Khách hàng</h1>
	</div>
	<div class="content">
		<table cellpadding="0" cellspacing="0" border="0" class="tbl_repeat list">
			<thead>
				<tr>
					<th>Tên khách hàng</th>
					<th class="col_15 ta_r">Xóa</th>
					<th class="col_5 ta_r">Hiển thị</th>
				</tr>
			</thead>
				
			<?php foreach($rows as $user) { ?>
			
			<tr>
				<td><?php echo Helper::encodeHtml($user['first_name']." ".$user['last_name']); ?></td>
				<td class="ta_r">
				<?php 
					$orders = $objOrder->getClientOrders($user['id']);
									
					if (empty($orders)) { 
				?>
					<a href="/admin/?page=clients&amp;action=remove&amp;id=<?php echo $user['id']; ?>">Xóa</a>
				<?php } else { ?>
					<span class="inactive">Xóa</span>
				<?php } ?>
				</td>		
				<td class="ta_r">
					<a href="/admin/?page=clients&amp;action=edit&amp;id=<?php echo $user['id']; ?>">Sửa</a>
				</td>
			</tr>
			
			<?php } ?>
	
		</table>	
	</div>
</div>

<?php echo $objPaging->getPaging(); ?>

<?php 
	} else {
		echo '<p>'.$empty.'</p>';
	} 
?>

<?php require_once('template/_footer.php'); ?>





