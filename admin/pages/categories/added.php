<?php
$url = '/admin'.Url::getCurrentUrl(array('action', 'id'));
require_once('template/_header.php');
?>
<h1>Thêm mới danh mục sản phẩm</h1>
<p>Danh mục sản phẩm đã được thêm mới thành công!!!<br />
<a href="<?php echo $url; ?>">Quay trở lại trang quản lý danh mục sản phẩm!!!</a></p>
<?php require_once('template/_footer.php'); ?>