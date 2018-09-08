<?php
$url = '/admin'.Url::getCurrentUrl(array('action', 'id'));
require_once('template/_header.php');
?>
<h1>Thêm mới nhà phát hành</h1>
<p>Thêm mới thành công!!!<br />
<a href="<?php echo $url; ?>">Quay lại trang quản lý nhà phát hành</a></p>
<?php require_once('template/_footer.php'); ?>