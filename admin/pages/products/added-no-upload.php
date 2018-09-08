<?php
$url = '/admin'.Url::getCurrentUrl(array('action', 'id'));
require_once('template/_header.php');
?>
<h1>Thêm mới sản phẩm</h1>
<p>Sản phẩm được thêm mới thành công mà chưa chọn hình ảnh !!!<br />
<a href="<?php echo $url; ?>">Quay lại trang quản lý sản phẩm!!!</a></p>
<?php require_once('template/_footer.php'); ?>