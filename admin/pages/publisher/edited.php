<?php
$url = '/admin'.Url::getCurrentUrl(array('action', 'id'));
require_once('template/_header.php');
?>
<h1>Sửa thông tin nhà phát hành</h1>
<p>Bản ghi đã được chỉnh sửa thành công<br />
<a href="<?php echo $url; ?>">Trở lại danh sách nhà phát hành</a></p>
<?php require_once('template/_footer.php'); ?>