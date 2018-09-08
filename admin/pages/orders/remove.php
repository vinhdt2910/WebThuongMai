<?php 
$id = Url::getParam('id');

if (!empty($id)) {

	$objOrder = new Order();
	$order = $objOrder->getOrder($id);
	
	if (!empty($order)) {
		
		$yes = '/admin'.Url::getCurrentUrl().'&amp;remove=1';
		$no = 'javascript:history.go(-1)';
		
		$remove = Url::getParam('remove');
		//die("ABCD:$remove");	
		if (!empty($remove)) {
			
			$objOrder->removeOrder($id);
			
			Helper::redirect('/admin'.Url::getCurrentUrl(array('action', 'id', 'remove', 'srch', Paging::$_key)));
			
		}
		require_once('template/_header.php');
		
?>
<h1>Xóa hóa đơn</h1>
<p>Bạn có chắc chắn muốn xóa hóa đơn này không?<br />
Dữ liệu hóa đơn sẽ mất hẳn trong hệ thống<br />
<a href="<?php echo $yes; ?>">Có</a> | <a href="<?php echo $no; ?>">Không</a></p>
<?php 

		require_once('template/_footer.php'); 
		//die;

		

	}	
}
?>