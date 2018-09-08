<?php
$url = '/admin'.Url::getCurrentUrl(array('action', 'id'));
require_once('template/_header.php');
?>
<h1>Sửa danh mục sản phẩm</h1>
<p>Danh mục sản phẩm đã được cập nhật thành công!!!<br />
<a href="<?php echo $url; ?>">Quay lại trang quản lý danh mục!!!</a></p>
<?php require_once('template/_footer.php'); ?>