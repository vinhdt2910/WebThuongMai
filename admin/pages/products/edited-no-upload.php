<?php
$url = '/admin'.Url::getCurrentUrl(array('action', 'id'));
require_once('template/_header.php');
?>
<h1>Cập nhật sản phẩm</h1>
<p>Sản phẩm đã được cập nhật thành công mà không thay đổi hình ảnh đại diện!!!<br />
<a href="<?php echo $url; ?>">Quay lại trang quản lý sản phẩm!!!</a></p>
<?php require_once('template/_footer.php'); ?>