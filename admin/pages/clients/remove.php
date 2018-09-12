<?php 
$id = Url::getParam('id');

if (!empty($id)) {

	$objUser = new User();
	$user = $objUser->getUser($id);
	
	if (!empty($user)) {
		
		$objOrder = new Order();
		$orders = $objOrder->getClientOrders($id);
		
		if (empty($orders)) {
		
			$yes = '/admin'.Url::getCurrentUrl().'&amp;remove=1';
			$no = 'javascript:history.go(-1)';
			
			$remove = Url::getParam('remove');
			
			if (!empty($remove)) {
				
				$objUser->removeUser($id);
				
				Helper::redirect('/admin'.Url::getCurrentUrl(array('action', 'id', 'remove', 'srch', Paging::$_key)));
				
			}
			
			require_once('template/_header.php'); 
?>
<h1>Xóa khách hàng</h1>
<p>Bạn có chắc chắn muốn xóa khách hàng (<?php echo $user['Hoten']; ?>) khỏi hệ thống không?<br />
Thông tin về khách hàng sẽ mất khỏi hệ thống!!!<br />
<a href="<?php echo $yes; ?>">Có</a> | <a href="<?php echo $no; ?>">Không</a></p>
<?php 
			require_once('template/_footer.php'); 
		}
	}	
}
?>