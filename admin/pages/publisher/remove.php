<?php 
$id = Url::getParam('id');

if (!empty($id)) {

	$objCatalogue = new Catalogue();
	$category = $objCatalogue->getPublisher($id);
	
	if (!empty($category)) {
		
		$yes = '/admin'.Url::getCurrentUrl().'&amp;remove=1';
		$no = 'javascript:history.go(-1)';
		
		$remove = Url::getParam('remove');
		
		if (!empty($remove)) {
			
			$objCatalogue->removePublisher($id);
			
			Helper::redirect('/admin'.Url::getCurrentUrl(array('action', 'id', 'remove', 'srch', Paging::$_key)));
			
		}
		
		require_once('template/_header.php'); 
?>
<h1>Xóa danh mục nhà phát hành</h1>
<p>Bạn có chắc chắn muốn xóa danh mục nhà phát hành này không?<br />
Bản ghi sẽ mất hẳn trong hệ thống!!!<br />
<a href="<?php echo $yes; ?>">Có</a> | <a href="<?php echo $no; ?>">Không</a></p>
<?php 
		require_once('template/_footer.php'); 
	}	
}
?>