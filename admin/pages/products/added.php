<?php
$url = '/admin'.Url::getCurrentUrl(array('action', 'id'));
require_once('template/_header.php');
?>
<h1>Thêm mới sản phẩm</h1>
<p>Sản phẩm mới đã được thêm thành công!!!<br />
<a href="<?php echo $url; ?>">Quay về trang quản lý sản phẩm</a></p>
<?php require_once('template/_footer.php'); ?>