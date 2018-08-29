<?php 
$id = Url::getParam('id');

if (!empty($id)) {

	$objCatalogue = new Catalogue();
	$product = $objCatalogue->getProduct($id);
	
	if (!empty($product)) {
		
		$yes = '/admin'.Url::getCurrentUrl().'&amp;remove=1';
		$no = 'javascript:history.go(-1)';
		
		$remove = Url::getParam('remove');
		
		if (!empty($remove)) {
			
			$objCatalogue->removeProduct($id);
			
			Helper::redirect('/admin'.Url::getCurrentUrl(array('action', 'id', 'remove', 'srch', Paging::$_key)));
			
		}
		
		require_once('template/_header.php'); 
?>
<h1>Xóa sản phẩm</h1>
<p>Bạn có chắc chắn muốn xóa sản phẩm này không?<br />
There is no undo!<br />
<a href="<?php echo $yes; ?>">Có</a> | <a href="<?php echo $no; ?>">Không</a></p>
<?php 
		require_once('template/_footer.php'); 
	}	
}
?>