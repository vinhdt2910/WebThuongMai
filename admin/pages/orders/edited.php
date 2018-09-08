<?php
$url = '/admin'.Url::getCurrentUrl(array('action', 'id'));
require_once('template/_header.php');
?>
<h1>Trang hóa đơn</h1>
<p>Cập nhật trạng thái hóa đơn thành công!!!<br />
<a href="<?php echo $url; ?>">Quay lại trang danh sách hóa đơn.</a></p>
<?php require_once('template/_footer.php'); ?>